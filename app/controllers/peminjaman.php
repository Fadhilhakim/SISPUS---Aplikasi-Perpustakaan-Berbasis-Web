<?php

require_once '../app/models/DataPinjam.php';

class peminjaman extends Controller {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        requireAuth(); 
    }

    public function index() {
        $userName = isLoggedIn(); 
        $dataPeminjam = new DataPinjam();

        $success = null;
        if (isset($_GET['status']) && $_GET['status'] === 'success') {
            $success = true;
        }
    
        // Tentukan jumlah data per halaman
        $limit = 10;
    
        // Ambil nomor halaman dari query parameter, default halaman 1
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
    
        // Ambil data peminjaman berdasarkan halaman yang dipilih
        $peminjam = $dataPeminjam->Datapeminjam($page, $limit);
    
        // Hitung total peminjaman untuk pagination
        $totalPeminjaman = $dataPeminjam->getTotalPeminjaman();
    
        // Hitung total halaman
        $totalPages = ceil($totalPeminjaman / $limit);

        $anggota = $dataPeminjam->getAllAnggota();
        $buku_tersedia = $dataPeminjam->getAvailableBooks();
    
        if ($userName) {
            $this->render('peminjaman', [
                'user' => $userName, 
                'peminjam' => $peminjam,
                'totalPages' => $totalPages,
                'anggota' => $anggota,
                'buku_tersedia' => $buku_tersedia,
                'currentPage' => $page,
                'totalPeminjaman' => $totalPeminjaman,
                'success' => $success
            ], 'Peminjaman Buku');
        } else {
            // Jika tidak ada user, redirect ke login
            header('Location: /login');
            exit();
        }
    }
    
    
    public function insert() {
        $dataPeminjam = new DataPinjam();
        $userName = isLoggedIn(); 
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['nomor_anggota'] != '' && $_POST['kode_buku'] != '') {
                // Menyiapkan data untuk peminjaman
                $data = [
                    'nomor_anggota' => $_POST['nomor_anggota'],
                    'kode_buku' => $_POST['kode_buku'],
                    'tanggal_peminjaman' => $_POST['tanggal_peminjaman'], 
                    'userid' => $userName['username']
                ];
    
                // Menyimpan data peminjaman
                $result = $dataPeminjam->insert($data);
    
                // Jika peminjaman berhasil, update stok buku
                if ($result) {
                    $updateResult = $dataPeminjam->updateBookStock($_POST['kode_buku']);
                    
                    // Jika berhasil mengurangi stok, redirect dengan status success
                    if ($updateResult) {
                        header('Location: /peminjaman?status=success');
                    } else {
                        // Jika gagal update stok, tampilkan pesan error atau lakukan tindakan lain
                        header('Location: /peminjaman?status=error');
                    }
                } else {
                    // Jika peminjaman gagal
                    $this->index();
                }
            } else {
                // Jika data tidak lengkap
                $this->index();
            }
        } else {
            header('Location: /peminjaman');
        }
    }
   
    
}