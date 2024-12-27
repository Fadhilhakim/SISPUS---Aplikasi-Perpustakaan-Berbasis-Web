<?php

require_once '../app/models/DataAnggota.php'; 

class anggota_perpustakaan extends Controller {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        requireAuth(); 
    }

    public function index(){
        $dataAnggotaModel = new DataAnggota();
        $data_anggota = $dataAnggotaModel->getAllAnggota();
        $mahasiswa = $dataAnggotaModel->getAllMahasiswa();
        $userName = isLoggedIn();
        $this->render('anggota', [
            'user' => $userName, 
            'data_anggota' => $data_anggota,
            'mahasiswa' => $mahasiswa
        ], 'Data Anggota');
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];

            $dataAnggotaModel = new DataAnggota();
            $dataAnggotaModel->deleteAnggota($id);
        } else {
            $this->index();
        }

        $dataAnggotaModel = new DataAnggota();
        $data_anggota = $dataAnggotaModel->getAllAnggota();
        $mahasiswa = $dataAnggotaModel->getAllMahasiswa();
        $userName = isLoggedIn();
        $success = true;
        $this->render('anggota', [
            'user' => $userName, 
            'data_anggota' => $data_anggota,
            'mahasiswa' => $mahasiswa,
            'error' => $success
        ], 'Data Anggota');
    }

    public function insert() {
        $dataAnggotaModel = new DataAnggota();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nomor' => $_POST['nomor'],
                'tanggal_masuk' => $_POST['tanggal_masuk'] ?: date('Y-m-d'),
                'userid' => isLoggedIn()['username'] // Mengambil username dari session login
            ];

            $insertResult = $dataAnggotaModel->insertAnggota($data);

            if ($insertResult) {
                $data_anggota = $dataAnggotaModel->getAllAnggota();
                $mahasiswa = $dataAnggotaModel->getAllMahasiswa();
                $userName = isLoggedIn();
                $success = true;
                $this->render('anggota', [
                    'user' => $userName, 
                    'data_anggota' => $data_anggota,
                    'mahasiswa' => $mahasiswa,
                    'success' => $success
                ], 'Data Anggota');
            } else {
                echo "Gagal menambahkan data anggota.";
            }
        } else {
            $this->render('form_anggota'); // Tampilkan form input anggota
        }
    }

    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nama'])) {
            $nama = $_GET['nama'];
            if($nama != '') {
                $dataAnggotaModel = new DataAnggota();
                $data_anggota = $dataAnggotaModel->searchByName($nama);
                $mahasiswa = $dataAnggotaModel->getAllMahasiswa();
                $userName = isLoggedIn();
                $this->render('anggota', [
                    'user' => $userName, 
                    'data_anggota' => $data_anggota,
                    'mahasiswa' => $mahasiswa,
                    'old' => $nama
                ], 'Data Anggota');
            } else {
                header("Location: /anggota_perpustakaan");
            }
        } else {
            header("Location: /anggota_perpustakaan");
        }
    }

}