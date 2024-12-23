<?php 

class DataPinjam {

    public function getAllAnggota() {
        $db = Database::getConnection();
        $query = "SELECT 
                        anggota_perpustakaan.id, 
                        anggota_perpustakaan.nomor, 
                        anggota_perpustakaan.tanggal_masuk, 
                        biodata_mahasiswa.nama, 
                        program_studi.nama AS jurusan,
                        COALESCE(peminjaman.jumlah_peminjaman, 0) AS jumlah_peminjaman
                    FROM 
                        anggota_perpustakaan
                    LEFT JOIN 
                        biodata_mahasiswa ON anggota_perpustakaan.nomor = biodata_mahasiswa.nim
                    LEFT JOIN
                        program_studi ON biodata_mahasiswa.kode_program_studi = program_studi.kode_jurusan
                    LEFT JOIN
                        (
                            SELECT nomor_anggota, COUNT(*) AS jumlah_peminjaman
                            FROM peminjaman_buku
                            WHERE tanggal_pengembalian IS NULL
                            GROUP BY nomor_anggota
                        ) AS peminjaman ON anggota_perpustakaan.nomor = peminjaman.nomor_anggota
                    WHERE 
                        (peminjaman.jumlah_peminjaman IS NULL OR peminjaman.jumlah_peminjaman <= 3)
                ";
    
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function Datapeminjam($page, $limit) {
        $db = Database::getConnection();
    
        // Hitung offset berdasarkan halaman yang diminta
        $offset = ($page - 1) * $limit;
    
        // Query untuk mengambil data peminjaman dengan pagination
        $query = "SELECT 
                    peminjaman_buku.id,
                    peminjaman_buku.nomor_anggota,
                    biodata_mahasiswa.nama AS nama_anggota,
                    buku.kode AS kode_buku,
                    buku.judul AS judul_buku,
                    peminjaman_buku.tanggal_peminjaman
                  FROM 
                    peminjaman_buku
                  INNER JOIN 
                    anggota_perpustakaan ON peminjaman_buku.nomor_anggota = anggota_perpustakaan.nomor
                  INNER JOIN 
                    biodata_mahasiswa ON anggota_perpustakaan.nomor = biodata_mahasiswa.nim
                  INNER JOIN 
                    buku ON peminjaman_buku.kode_buku = buku.kode
                  WHERE 
                    peminjaman_buku.tanggal_pengembalian IS NULL
                  ORDER BY 
                    peminjaman_buku.tanggal_peminjaman ASC
                  LIMIT :limit OFFSET :offset";
    
        $stmt = $db->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPeminjaman() {
        $db = Database::getConnection();
        $query = "SELECT 
                    peminjaman_buku.id,
                    peminjaman_buku.nomor_anggota,
                    biodata_mahasiswa.nama AS nama_anggota,
                    buku.kode AS kode_buku,
                    buku.judul AS judul_buku,
                    peminjaman_buku.tanggal_peminjaman,
                    peminjaman_buku.tanggal_pengembalian,
                    peminjaman_buku.denda
                  FROM 
                    peminjaman_buku
                  INNER JOIN 
                    anggota_perpustakaan ON peminjaman_buku.nomor_anggota = anggota_perpustakaan.nomor
                  INNER JOIN 
                    biodata_mahasiswa ON anggota_perpustakaan.nomor = biodata_mahasiswa.nim
                  INNER JOIN 
                    buku ON peminjaman_buku.kode_buku = buku.kode
                  ORDER BY 
                    peminjaman_buku.tanggal_pengembalian ASC";
    
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalPeminjaman() {
        $db = Database::getConnection();
    
        // Query untuk menghitung total peminjaman yang belum dikembalikan
        $query = "SELECT COUNT(*) AS total
                  FROM peminjaman_buku
                  WHERE tanggal_pengembalian IS NULL";
    
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getTotalPegembalian() {
        $db = Database::getConnection();
    
        // Query untuk menghitung total peminjaman yang belum dikembalikan
        $query = "SELECT COUNT(*) AS total
                  FROM peminjaman_buku
                  WHERE tanggal_pengembalian IS NOT NULL";
    
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    
    

    public function getAvailableBooks() {
        $db = Database::getConnection();
        $query = " SELECT 
                        buku.kode, 
                        buku.judul,
                        buku.stock
                    FROM 
                        buku 
                    WHERE 
                        buku.stock > 0
                ";
                $stmt = $db->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function validateAnggota($nomor_anggota) {
        $db = Database::getConnection();
        $query = "SELECT COUNT(*) FROM anggota_perpustakaan WHERE nomor = :nomor_anggota";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nomor_anggota', $nomor_anggota, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0; // Return true jika anggota ditemukan
    }
    
    public function insert($data) {
        if (!$this->validateAnggota($data['nomor_anggota'])) {
            throw new Exception("Anggota dengan nomor {$data['nomor_anggota']} tidak ditemukan.");
        }
        
        $db = Database::getConnection();
        $query = "
            INSERT INTO peminjaman_buku 
            (nomor_anggota, kode_buku, tanggal_peminjaman, tanggal_pengembalian, denda, userid)
            VALUES 
            (:nomor_anggota, :kode_buku, :tanggal_peminjaman, NULL, NULL, :userid)
        ";
        $stmt = $db->prepare($query);
    
        $stmt->bindParam(':nomor_anggota', $data['nomor_anggota'], PDO::PARAM_STR);
        $stmt->bindParam(':kode_buku', $data['kode_buku'], PDO::PARAM_STR);
        $stmt->bindParam(':tanggal_peminjaman', $data['tanggal_peminjaman'], PDO::PARAM_STR);
        $stmt->bindParam(':userid', $data['userid'], PDO::PARAM_STR);
    
        return $stmt->execute();
    }
    
    public function updateBookStock($kode_buku) {
        $db = Database::getConnection();
        $query = "UPDATE buku
                  SET stock = stock - 1
                  WHERE kode = :kode_buku AND stock > 0";  // Pastikan stok lebih dari 0
    
        // Persiapkan query
        $stmt = $db->prepare($query);
        $stmt->bindParam(':kode_buku', $kode_buku, PDO::PARAM_STR);
    
        // Eksekusi query dan cek apakah berhasil
        if ($stmt->execute()) {
            return true;
        }
        return false;  // Jika gagal mengupdate stok
    }
    
    public function getPeminjam() {
        $db = Database::getConnection();
        $query = "SELECT 
                    peminjaman_buku.nomor_anggota,
                    biodata_mahasiswa.nama AS nama_anggota
                FROM 
                    peminjaman_buku
                INNER JOIN 
                    anggota_perpustakaan ON peminjaman_buku.nomor_anggota = anggota_perpustakaan.nomor
                INNER JOIN 
                    biodata_mahasiswa ON anggota_perpustakaan.nomor = biodata_mahasiswa.nim
                WHERE 
                    peminjaman_buku.tanggal_pengembalian IS NULL
                GROUP BY 
                    peminjaman_buku.nomor_anggota, biodata_mahasiswa.nama";
    
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DataPengembalian($page, $limit) {
        $db = Database::getConnection();
    
        $offset = ($page - 1) * $limit;
    
        $query = "SELECT 
                    peminjaman_buku.id,
                    peminjaman_buku.nomor_anggota,
                    biodata_mahasiswa.nama AS nama_anggota,
                    buku.kode AS kode_buku,
                    buku.judul AS judul_buku,
                    peminjaman_buku.tanggal_peminjaman,
                    peminjaman_buku.tanggal_pengembalian,
                    peminjaman_buku.denda
                  FROM 
                    peminjaman_buku
                  INNER JOIN 
                    anggota_perpustakaan ON peminjaman_buku.nomor_anggota = anggota_perpustakaan.nomor
                  INNER JOIN 
                    biodata_mahasiswa ON anggota_perpustakaan.nomor = biodata_mahasiswa.nim
                  INNER JOIN 
                    buku ON peminjaman_buku.kode_buku = buku.kode
                  WHERE 
                    peminjaman_buku.tanggal_pengembalian IS NOT NULL
                  ORDER BY 
                    peminjaman_buku.tanggal_peminjaman DESC
                  LIMIT :limit OFFSET :offset";
    
        $stmt = $db->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getBukuByAnggota($nomor_anggota) {
        $db = Database::getConnection();
        
        $query = "SELECT 
                    buku.kode, 
                    buku.judul, 
                    COUNT(peminjaman_buku.id) AS total,
                    peminjaman_buku.tanggal_peminjaman,
                    biodata_mahasiswa.nama AS nama_anggota
                  FROM 
                    peminjaman_buku
                  INNER JOIN 
                    buku ON peminjaman_buku.kode_buku = buku.kode
                  INNER JOIN 
                    anggota_perpustakaan ON peminjaman_buku.nomor_anggota = anggota_perpustakaan.nomor
                  INNER JOIN 
                    biodata_mahasiswa ON anggota_perpustakaan.nomor = biodata_mahasiswa.nim
                  WHERE 
                    peminjaman_buku.nomor_anggota = :nomor_anggota
                  AND 
                    peminjaman_buku.tanggal_pengembalian IS NULL
                  GROUP BY 
                    buku.kode, 
                    buku.judul, 
                    peminjaman_buku.tanggal_peminjaman, 
                    biodata_mahasiswa.nama";
    
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nomor_anggota', $nomor_anggota, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getNama($nomor_anggota) {
        $db = Database::getConnection();
        $query = "SELECT nama FROM biodata_mahasiswa WHERE nim = :nomor_anggota";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nomor_anggota', $nomor_anggota, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updatePengembalian($nomor_anggota, $kode_buku, $tanggal_peminjaman, $tanggal_pengembalian, $denda) {
        $db = Database::getConnection();
    
        try {
            $db->beginTransaction();
    
            // Update tanggal_pengembalian dan denda pada tabel peminjaman_buku
            $queryUpdate = "UPDATE peminjaman_buku 
                            SET tanggal_pengembalian = :tanggal_pengembalian, denda = :denda 
                            WHERE nomor_anggota = :nomor_anggota 
                            AND kode_buku = :kode_buku 
                            AND tanggal_peminjaman = :tanggal_peminjaman
                            LIMIT 1";
            $stmtUpdate = $db->prepare($queryUpdate);
            $stmtUpdate->bindParam(':tanggal_pengembalian', $tanggal_pengembalian);
            $stmtUpdate->bindParam(':denda', $denda, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':nomor_anggota', $nomor_anggota, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':kode_buku', $kode_buku);
            $stmtUpdate->bindParam(':tanggal_peminjaman', $tanggal_peminjaman);
            $stmtUpdate->execute();
    
            $queryStock = "UPDATE buku 
                           SET stock = stock + 1 
                           WHERE kode = :kode_buku";
            $stmtStock = $db->prepare($queryStock);
            $stmtStock->bindParam(':kode_buku', $kode_buku);
            $stmtStock->execute();
    
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $db->rollBack();
            throw $e; // Lemparkan exception jika ada error
        }
    }
    
}