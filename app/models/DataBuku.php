<?php 

class DataBuku {
    public function getAllBuku() {
        $db = Database::getConnection();
        $query = "SELECT " .
                    "buku.id, buku.kode, buku.kode_kategori, kategori_buku.nama AS nama_kategori, " .
                    "buku.judul, buku.jumlah, buku.stock, buku.pengarang, buku.penerbit, " .
                    "buku.tahun_terbit, buku.tahun_pengadaaan, buku.sumber, buku.rak, buku.isbn " .
                    "FROM buku " .
                    "LEFT JOIN kategori_buku ON buku.kode_kategori = kategori_buku.kode";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBukuByid($id) {
        $db = Database::getConnection();
        $query = "SELECT * FROM buku WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function loadKategoriBuku() {
        $db = Database::getConnection();
        $query = "SELECT * FROM kategori_buku";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertData($data) {
        $db = Database::getConnection();
        $query = "INSERT INTO buku 
            (kode, kode_kategori, judul, jumlah, stock, pengarang, penerbit, tahun_terbit, tahun_pengadaaan, sumber, rak, ISBN, foto_buku, userid)
            VALUES 
            (:kode, :kode_kategori, :judul, :jumlah, :stock, :pengarang, :penerbit, :tahun_terbit, :tahun_pengadaaan, :sumber, :rak, :ISBN, :foto_buku, :userid)";
        
        $stmt = $db->prepare($query);
    
        $stmt->bindParam(':kode', $data['kode']);
        $stmt->bindParam(':kode_kategori', $data['kode_kategori']);
        $stmt->bindParam(':judul', $data['judul']);
        $stmt->bindParam(':jumlah', $data['jumlah'], PDO::PARAM_INT);
        $stmt->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $stmt->bindParam(':pengarang', $data['pengarang']);
        $stmt->bindParam(':penerbit', $data['penerbit']);
        $stmt->bindParam(':tahun_terbit', $data['tahun_terbit']);
        $stmt->bindParam(':tahun_pengadaaan', $data['tahun_pengadaaan']);
        $stmt->bindParam(':sumber', $data['sumber']);
        $stmt->bindParam(':rak', $data['rak']);
        $stmt->bindParam(':ISBN', $data['ISBN']);
        $stmt->bindParam(':foto_buku', $data['foto_buku']);
        $stmt->bindParam(':userid', $data['userid']);
    
        return $stmt->execute();
    }
    

    public function updateBuku($id, $data) {
        $db = Database::getConnection();
        $query = "UPDATE buku 
                  SET kode = :kode, 
                      kode_kategori = :kode_kategori, 
                      judul = :judul, 
                      jumlah = :jumlah, 
                      stock = :stock, 
                      pengarang = :pengarang, 
                      penerbit = :penerbit, 
                      tahun_terbit = :tahun_terbit, 
                      tahun_pengadaaan = :tahun_pengadaaan, 
                      sumber = :sumber, 
                      rak = :rak, 
                      ISBN = :ISBN, 
                      foto_buku = :foto_buku, 
                      userid = :userid 
                  WHERE id = :id";
        $stmt = $db->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }

    public function deleteBuku($id) {
        $db = Database::getConnection();
        $query = "DELETE FROM buku WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getLastKodeBuku() { 
        $db = Database::getConnection();
        $query = "SELECT kode FROM buku ORDER BY id DESC LIMIT 1";  
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }


    public function searchByJudul($judul) {
        $db = Database::getConnection();
        $query = "SELECT buku.id, buku.kode, buku.kode_kategori, kategori_buku.nama AS nama_kategori, " .
             "buku.judul, buku.jumlah, buku.stock, buku.pengarang, buku.penerbit, " .
             "buku.tahun_terbit, buku.tahun_pengadaaan, buku.sumber, buku.rak, buku.isbn " .
             "FROM buku " .
             "LEFT JOIN kategori_buku ON buku.kode_kategori = kategori_buku.kode " .
             "WHERE buku.judul LIKE :judul";
             
        $stmt = $db->prepare($query);
        $searchTerm = "%" . $judul . "%";
        $stmt->bindParam(':judul', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}