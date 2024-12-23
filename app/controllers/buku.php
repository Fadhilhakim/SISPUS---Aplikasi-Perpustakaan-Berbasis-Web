<?php

require_once '../app/models/DataBuku.php'; 

class buku extends Controller {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        requireAuth(); 
    }
    public function index() {
        $dataBuku = new DataBuku(); 
        $data_buku = $dataBuku->getAllBuku();
        $kategori_buku = $dataBuku->loadKategoriBuku();
        $userName = isLoggedIn(); 
        $this->render('buku', [
            'user' => $userName,
            'kategori' => $kategori_buku, 
            'data_buku' => $data_buku
        ], 'Data Buku');
    }
    public function input() {
        $dataBuku = new DataBuku(); 
        $kategori_buku = $dataBuku->loadKategoriBuku();
        $lastkode = $dataBuku->getLastKodeBuku();

        if ($lastkode) {
            $prefix = substr($lastkode['kode'], 0, 1); 
            $number = substr($lastkode['kode'], 1); 
            
            $newNumber = str_pad((int)$number + 1, strlen($number), '0', STR_PAD_LEFT);
            
            $newKode = $prefix . $newNumber;
        } else {
            $newKode = 'B001';
        }

        $userName = isLoggedIn(); 
        $this->render('data_buku', [
            'user' => $userName,
            'kategori' => $kategori_buku,
            'last_code' => $newKode,
        ], 'Data Buku');
    }

    public function detail($id) {
        $dataBuku = new DataBuku(); 
        $data_buku = $dataBuku->getBukuByid($id);
        $kategori_buku = $dataBuku->loadKategoriBuku();
        $userName = isLoggedIn(); 
        $this->render('buku', [
            'id' => $id,
            'user' => $userName,
            'kategori' => $kategori_buku, 
            'data_buku' => $data_buku
        ], 'Data Buku');
    }

    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataBuku = new DataBuku();
            $success = true;
            $userName = isLoggedIn();
            $data = [
                'kode' => $_POST['kode'],
                'kode_kategori' => $_POST['kode_kategori'],
                'judul' => $_POST['judul'],
                'jumlah' => $_POST['jumlah'],
                'stock' => $_POST['stock'],
                'pengarang' => $_POST['pengarang'],
                'penerbit' => $_POST['penerbit'],
                'tahun_terbit' => $_POST['tahun_terbit'],
                'tahun_pengadaaan' => $_POST['tahun_pengadaaan'],
                'sumber' => $_POST['sumber'],
                'rak' => $_POST['rak'],
                'ISBN' => $_POST['ISBN'],
                'foto_buku' => $_POST['foto_buku'],
                'userid' => $userName['username']
            ];

            $insertResult = $dataBuku->insertData($data);

            $data_buku = $dataBuku->getAllBuku();
            $kategori_buku = $dataBuku->loadKategoriBuku();
            $this->render('buku', [
                'success' => $success,
                'user' => $userName,
                'kategori' => $kategori_buku, 
                'data_buku' => $data_buku
            ], 'Data Buku');
            
        } else {
            $this->index();
        }
    }

    public function update($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataBuku = new DataBuku();
            $kategoriBuku = $dataBuku->loadKategoriBuku();
            $success = true;
            $userName = isLoggedIn();

            $data = [
                'kode' => $_POST['kode'],
                'kode_kategori' => $_POST['kode_kategori'],
                'judul' => $_POST['judul'],
                'jumlah' => $_POST['jumlah'],
                'stock' => $_POST['stock'],
                'pengarang' => $_POST['pengarang'],
                'penerbit' => $_POST['penerbit'],
                'tahun_terbit' => $_POST['tahun_terbit'],
                'tahun_pengadaaan' => $_POST['tahun_pengadaaan'],
                'sumber' => $_POST['sumber'],
                'rak' => $_POST['rak'],
                'ISBN' => $_POST['ISBN'],
                'foto_buku' => $_POST['foto_buku'],
                'userid' => $userName['username']
            ];

            $updateResult = $dataBuku->updateBuku($id, $data);
            $buku = $dataBuku->getBukuById($id);

            if ($updateResult) {
                $this->render(
                    'buku',
                    [
                        'success' => $success,
                        'user' => $userName,
                        'data_buku' => $buku,
                        'kategori' => $kategoriBuku,
                        'id' => $id
                    ],
                    'Data Buku'
                );
                
            } else {
                $this->index();
            }
        }

        
    }

    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['judul'])) {
            $judul = $_GET['judul'];
            if($judul != '') {
                $dataBuku = new DataBuku(); 
                $userName = isLoggedIn(); 
                $kategori_buku = $dataBuku->loadKategoriBuku();
                $data_buku = $dataBuku->searchByJudul($judul);
                $this->render('buku', [
                    'user' => $userName,
                    'kategori' => $kategori_buku, 
                    'data_buku' => $data_buku,
                    'old' => $judul
                ], 'Data Buku');
            } else {
                header('Location: /buku');
            }
        } else {
            $this->index();
        }
    }

    public function delete() {
        $dataBuku = new DataBuku(); 
        $data_buku = $dataBuku->getAllBuku();
        $kategori_buku = $dataBuku->loadKategoriBuku();
        $userName = isLoggedIn(); 
        $success = true;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $dataBuku->deleteBuku($id);
            $this->render('buku', [
                'backTo' => 'buku',
                'error' => $success,
                'user' => $userName,
                'kategori' => $kategori_buku, 
                'data_buku' => $data_buku
            ], 'Data Buku');
        } else {
            $this->index();
        }
    }
}