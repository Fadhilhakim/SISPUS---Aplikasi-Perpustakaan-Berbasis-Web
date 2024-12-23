<?php
class DataMahasiswa {
    public function getAllMahasiswa() {
        $db = Database::getConnection();
        $query = "SELECT * FROM biodata_mahasiswa";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMahasiswaById($id) {
        $db = Database::getConnection();
        $query = "SELECT * FROM biodata_mahasiswa WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchByName($name) {
        $db = Database::getConnection();
        $query = "SELECT * FROM biodata_mahasiswa WHERE nama LIKE :name";
        $stmt = $db->prepare($query);
        $searchTerm = "%" . $name . "%";
        $stmt->bindParam(':name', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertData($data) {
        $db = Database::getConnection();
        $query = "INSERT INTO biodata_mahasiswa 
            (nim, nama, kode_program_studi, kode_agama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, kota, kode_propinsi, kode_pos, telpon, handphone, hobi, wali, alamat_wali, telpon_wali, tahun_masuk, userid)
            VALUES 
            (:nim, :nama, :kode_program_studi, :kode_agama, :tempat_lahir, :tanggal_lahir, :jenis_kelamin, :alamat, :kota, :kode_propinsi, :kode_pos, :telpon, :handphone, :hobi, :wali, :alamat_wali, :telpon_wali, :tahun_masuk, :userid)";
        
        $stmt = $db->prepare($query);
    
        $stmt->bindParam(':nim', $data['nim']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':kode_program_studi', $data['kode_program_studi']);
        $stmt->bindParam(':kode_agama', $data['kode_agama']);
        $stmt->bindParam(':tempat_lahir', $data['tempat_lahir']);
        $stmt->bindParam(':tanggal_lahir', $data['tanggal_lahir']);
        $stmt->bindParam(':jenis_kelamin', $data['jenis_kelamin']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':kota', $data['kota']);
        $stmt->bindParam(':kode_propinsi', $data['kode_propinsi']);
        $stmt->bindParam(':kode_pos', $data['kode_pos']);
        $stmt->bindParam(':telpon', $data['telpon']);
        $stmt->bindParam(':handphone', $data['handphone']);
        $stmt->bindParam(':hobi', $data['hobi']);
        $stmt->bindParam(':wali', $data['wali']);
        $stmt->bindParam(':alamat_wali', $data['alamat_wali']);
        $stmt->bindParam(':telpon_wali', $data['telpon_wali']);
        $stmt->bindParam(':tahun_masuk', $data['tahun_masuk']);
        $stmt->bindParam(':userid', $data['userid']);
    
        return $stmt->execute();
    }
    

    public function updateMahasiswa($id, $data) {
        $db = Database::getConnection();
        $query = "UPDATE biodata_mahasiswa 
                  SET nim = :nim, 
                      nama = :nama, 
                      kode_program_studi = :kode_program_studi, 
                      kode_agama = :kode_agama, 
                      tempat_lahir = :tempat_lahir, 
                      tanggal_lahir = :tanggal_lahir, 
                      jenis_kelamin = :jenis_kelamin, 
                      alamat = :alamat, 
                      kota = :kota, 
                      kode_propinsi = :kode_propinsi, 
                      kode_pos = :kode_pos, 
                      telpon = :telpon, 
                      handphone = :handphone, 
                      hobi = :hobi, 
                      wali = :wali, 
                      alamat_wali = :alamat_wali, 
                      telpon_wali = :telpon_wali, 
                      tahun_masuk = :tahun_masuk, 
                      userid = :userid 
                  WHERE id = :id";
        $stmt = $db->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
    
    
    public function deleteMahasiswa($id) {
        $db = Database::getConnection();
        $query = "DELETE FROM biodata_mahasiswa WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function loadProdi() {
        $db = Database::getConnection();
        $query = "SELECT * FROM program_studi";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function loadAgama() {
        $db = Database::getConnection();
        $query = "SELECT * FROM agama";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function loadProv() {
        $db = Database::getConnection();
        $query = "SELECT * FROM propinsi";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}