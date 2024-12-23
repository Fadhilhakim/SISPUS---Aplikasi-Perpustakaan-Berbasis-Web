<?php

require_once '../app/models/DataHome.php';

class home extends Controller {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        requireAuth(); 
    }

    public function index() {
        $userName = isLoggedIn(); 
        $data_home = new DataHome;
        $total_mahasiswa = $data_home->getTotalMahasiswa();
        $total_buku = $data_home->getTotalBuku();
        $total_anggota = $data_home->getTotalAnggota();
        $total_jumlah = $data_home->getTotalJumlahBuku();
        $total_stock = $data_home->getTotalStockBuku();

        $buku_dipinjam = $total_jumlah - $total_stock;

        if ($userName) {
            // Kirim username ke view
            $this->render('home', [
                'user' => $userName,
                'mahasiswa' => $total_mahasiswa,
                'buku' => $total_buku,
                'total_buku' => $total_jumlah,
                'anggota' => $total_anggota,
                'buku_dipinjam' => $buku_dipinjam
            ], 'Dashboard SISPUS');
        } else {
            // Jika tidak ada user, redirect ke login
            header('Location: /login');
            exit();
        }
    }
}