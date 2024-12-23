<?php 

require_once "../app/models/DataPinjam.php";

class Pengembalian extends Controller {
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

        $limit = 10;

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $peminjam = $dataPeminjam->DataPengembalian($page, $limit);
        $totalPeminjaman = $dataPeminjam->getTotalPegembalian();
        $totalPages = ceil($totalPeminjaman / $limit);
        $anggota = $dataPeminjam->getPeminjam();
    
        if ($userName) {
            $this->render('pengembalian', [
                'user' => $userName, 
                'peminjam' => $peminjam,
                'totalPages' => $totalPages,
                'anggota' => $anggota,
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
    public function cek() {
        $userName = isLoggedIn(); 
        $dataPeminjam = new DataPinjam();

        $limit = 10;

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $peminjam = $dataPeminjam->DataPengembalian($page, $limit);
        $totalPeminjaman = $dataPeminjam->getTotalPeminjaman();
        $totalPages = ceil($totalPeminjaman / $limit);
        $anggota = $dataPeminjam->getPeminjam();

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nomor_anggota'])) {
            $nomor_anggota = $_POST['nomor_anggota'];
            $buku_dipinjam = $dataPeminjam->getBukuByAnggota($nomor_anggota);
            $nama_anggota = $dataPeminjam->getNama($nomor_anggota);
    
            if ($userName) {
                $this->render('pengembalian', [
                    'user' => $userName, 
                    'peminjam' => $peminjam,
                    'totalPages' => $totalPages,
                    'anggota' => $anggota,
                    'currentPage' => $page,
                    'totalPeminjaman' => $totalPeminjaman,
                    'buku_dipinjam' => $buku_dipinjam,
                    'nama_anggota' => $nama_anggota,
                    'nomor_anggota' => $nomor_anggota,
                    'success' => false
                ], 'Peminjaman Buku');
            } else {
                // Jika tidak ada user, redirect ke login
                header('Location: /login');
                exit();
            }

        } else {
            $this->index();
        }
    }

    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataPinjam = new DataPinjam();

            $nomor_anggota = $_POST['nomor_anggota'];
            $kode_buku = $_POST['kode_buku'];
            $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
            $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
            $denda = $_POST['denda'];

            try {
                $result = $dataPinjam->updatePengembalian($nomor_anggota, $kode_buku, $tanggal_peminjaman, $tanggal_pengembalian, $denda);

                if ($result) {
                    header('Location: /pengembalian?status=success');
                }
            } catch (Exception $e) {
                header('Location: /pengembalian?status=success');
            }

        }
    }
}