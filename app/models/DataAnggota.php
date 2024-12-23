<?php 

class DataAnggota  {

    public function getAllAnggota() {
        $db = Database::getConnection();
        $query = "SELECT 
                    anggota_perpustakaan.id, 
                    anggota_perpustakaan.nomor, 
                    anggota_perpustakaan.tanggal_masuk, 
                    biodata_mahasiswa.nama, 
                    program_studi.nama AS jurusan
                  FROM 
                    anggota_perpustakaan
                  LEFT JOIN 
                    biodata_mahasiswa ON anggota_perpustakaan.nomor = biodata_mahasiswa.nim
                  LEFT JOIN
                    program_studi ON biodata_mahasiswa.kode_program_studi = program_studi.kode_jurusan";
    
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllMahasiswa() {
        $db = Database::getConnection();
        $query = "
            SELECT nim, nama 
            FROM biodata_mahasiswa 
            WHERE nim NOT IN (SELECT nomor FROM anggota_perpustakaan)
        ";
        $stmt = $db->prepare($query);
        $stmt->execute();    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function deleteAnggota($id) {
        $db = Database::getConnection();
        $query = "DELETE FROM anggota_perpustakaan WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    public function insertAnggota($data) {
        $db = Database::getConnection();
        $query = "INSERT INTO anggota_perpustakaan (nomor, tanggal_masuk, userid) 
                  VALUES (:nomor, :tanggal_masuk, :userid)";
        $stmt = $db->prepare($query);

        $stmt->bindParam(':nomor', $data['nomor']);
        $stmt->bindParam(':tanggal_masuk', $data['tanggal_masuk']);
        $stmt->bindParam(':userid', $data['userid']);

        return $stmt->execute();
    }

    public function searchByName($name) {
        $db = Database::getConnection();
        $query = "SELECT anggota_perpustakaan.*, 
                    biodata_mahasiswa.nama, 
                    biodata_mahasiswa.kode_program_studi AS jurusan 
                FROM anggota_perpustakaan
                INNER JOIN biodata_mahasiswa 
                ON anggota_perpustakaan.nomor = biodata_mahasiswa.nim
                WHERE biodata_mahasiswa.nama LIKE :name";

        $stmt = $db->prepare($query);
        $searchTerm = "%" . $name . "%";
        $stmt->bindParam(':name', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}