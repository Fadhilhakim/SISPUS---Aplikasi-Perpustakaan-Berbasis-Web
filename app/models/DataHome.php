<?php 

class DataHome {
    public function getTotalMahasiswa() {
        $db = Database::getConnection();
    
        $query = "SELECT COUNT(*) AS total_mahasiswa FROM biodata_mahasiswa";
    
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['total_mahasiswa'];
    }
    public function getTotalBuku() {
        $db = Database::getConnection();
    
        $query = "SELECT COUNT(*) AS total_buku FROM buku";
    
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['total_buku'];
    }

    public function getTotalAnggota() {
        $db = Database::getConnection();
    
        $query = "SELECT COUNT(*) AS total_anggota FROM anggota_perpustakaan";
    
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['total_anggota'];
    }

    public function getTotalJumlahBuku() {
        $db = Database::getConnection();
    
        $query = "SELECT SUM(jumlah) AS total_jumlah FROM buku";
    
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['total_jumlah'];
    }

    public function getTotalStockBuku() {
        $db = Database::getConnection();
    
        $query = "SELECT SUM(stock) AS total_stock FROM buku";
    
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['total_stock'];
    }
    
    
    
}