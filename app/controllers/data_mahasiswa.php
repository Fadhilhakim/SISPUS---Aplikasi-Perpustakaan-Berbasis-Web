<?php

require_once '../app/models/DataMahasiswa.php';

class data_mahasiswa extends Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        requireAuth();
    }
    public function index()
    {
        $dataMahasiswaModel = new DataMahasiswa();
        $mahasiswa = $dataMahasiswaModel->getAllMahasiswa();
        $prodi = $dataMahasiswaModel->loadProdi();
        $agamaa = $dataMahasiswaModel->loadAgama();
        $propinsi = $dataMahasiswaModel->loadProv();
        $userName = isLoggedIn();
        $this->render('data_mahasiswa', [
            'user' => $userName, 
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi, 
            'agamaa' => $agamaa, 
            'propinsi' => $propinsi
        ], 'Data Mahasiswa');
    }

    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['name'])) {
            $name = $_GET['name'];
            if($name != '') {
                $dataMahasiswaModel = new DataMahasiswa();
                $mahasiswa = $dataMahasiswaModel->searchByName($name);
                $prodi = $dataMahasiswaModel->loadProdi();
                $agamaa = $dataMahasiswaModel->loadAgama();
                $propinsi = $dataMahasiswaModel->loadProv();
                $userName = isLoggedIn();
                $this->render('data_mahasiswa', [
                    'user' => $userName, 
                    'mahasiswa' => $mahasiswa, 
                    'prodi' => $prodi, 
                    'agamaa' => $agamaa, 
                    'propinsi' => $propinsi,
                    'old' => $name
                ], 'Data Mahasiswa');
            } else {
                header('Location: /data_mahasiswa');
            }
        } else {
            $this->index();
        }
    }
    public function detail($id)
    {
        $dataMahasiswaModel = new DataMahasiswa();
        $mahasiswa = $dataMahasiswaModel->getMahasiswaById($id);
        $prodi = $dataMahasiswaModel->loadProdi();
        $agamaa = $dataMahasiswaModel->loadAgama();
        $propinsi = $dataMahasiswaModel->loadProv();
        $userName = isLoggedIn();
        $this->render('data_mahasiswa', [
            'user' => $userName, 
            'mahasiswa' => $mahasiswa, 
            'prodi' => $prodi, 
            'id' => $id, 
            'agamaa' => $agamaa, 
            'propinsi' => $propinsi
        ], 'Data Mahasiswa');
    }
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataMahasiswaModel = new DataMahasiswa();
            $prodi = $dataMahasiswaModel->loadProdi();
            $agamaa = $dataMahasiswaModel->loadAgama();
            $propinsi = $dataMahasiswaModel->loadProv();
            $success = true;
            $userName = isLoggedIn();
            $data = [
                'nim' => $_POST['nim'],
                'nama' => $_POST['nama'],
                'kode_program_studi' => $_POST['kode_program_studi'],
                'kode_agama' => $_POST['kode_agama'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tanggal_lahir' => $_POST['tanggal_lahir'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'alamat' => $_POST['alamat'],
                'kota' => $_POST['kota'],
                'kode_propinsi' => $_POST['kode_propinsi'],
                'kode_pos' => $_POST['kode_pos'],
                'telpon' => $_POST['telpon'],
                'handphone' => $_POST['handphone'],
                'hobi' => $_POST['hobi'],
                'wali' => $_POST['wali'],
                'alamat_wali' => $_POST['alamat_wali'],
                'telpon_wali' => $_POST['telpon_wali'],
                'tahun_masuk' => $_POST['tahun_masuk'],
                'userid' => $userName['username'] 
            ];
            
            $insertResult = $dataMahasiswaModel->updateMahasiswa($id, $data);
            $mahasiswa = $dataMahasiswaModel->getMahasiswaById($id);

            if ($insertResult) {
                $this->render('data_mahasiswa', [
                    'success' => $success,
                    'user' => $userName, 
                    'mahasiswa' => $mahasiswa, 
                    'prodi' => $prodi, 
                    'id' => $id, 
                    'agamaa' => $agamaa, 
                    'propinsi' => $propinsi
                ], 'Data Mahasiswa');
            } else {
                $this->index();
            }
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];

            $dataMahasiswaModel = new DataMahasiswa();
            $dataMahasiswaModel->deleteMahasiswa($id);
        } else {
            $this->index();
        }

        $dataMahasiswaModel = new DataMahasiswa();
        $mahasiswa = $dataMahasiswaModel->getAllMahasiswa();
        $prodi = $dataMahasiswaModel->loadProdi();
        $agamaa = $dataMahasiswaModel->loadAgama();
        $propinsi = $dataMahasiswaModel->loadProv();
        $userName = isLoggedIn();
        $success = true;
        $this->render('data_mahasiswa', [
            'backTo' => 'buku',
            'user' => $userName, 
            'mahasiswa' => $mahasiswa, 
            'prodi' => $prodi, 
            'agamaa' => $agamaa, 
            'propinsi' => $propinsi, 
            'error' => $success
        ], 'Data Mahasiswa');
    }

    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataMahasiswaModel = new DataMahasiswa();
            $prodi = $dataMahasiswaModel->loadProdi();
            $agamaa = $dataMahasiswaModel->loadAgama();
            $propinsi = $dataMahasiswaModel->loadProv();
            $success = true;
            $userName = isLoggedIn();
            $data = [
                'nim' => $_POST['nim'],
                'nama' => $_POST['nama'],
                'kode_program_studi' => $_POST['kode_program_studi'],
                'kode_agama' => $_POST['kode_agama'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tanggal_lahir' => $_POST['tanggal_lahir'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'alamat' => $_POST['alamat'],
                'kota' => $_POST['kota'],
                'kode_propinsi' => $_POST['kode_propinsi'],
                'kode_pos' => $_POST['kode_pos'],
                'telpon' => $_POST['telpon'],
                'handphone' => $_POST['handphone'],
                'hobi' => $_POST['hobi'],
                'wali' => $_POST['wali'],
                'alamat_wali' => $_POST['alamat_wali'],
                'telpon_wali' => $_POST['telpon_wali'],
                'tahun_masuk' => $_POST['tahun_masuk'],
                'userid' => $userName['username'] 
            ];

            $insertResult = $dataMahasiswaModel->insertData($data);

            if ($insertResult) {
                $this->render('input_mahasiswa', [
                    'success' => $success, 
                    'user' => $userName, 
                    'prodi' => $prodi, 
                    'agamaa' => $agamaa, 
                    'propinsi' => $propinsi
                ], 'Data Mahasiswa');
            } else {
                $this->index();
            }
            
        } else {
            $this->index();
        }
    }
    
    public function input() {
        $dataMahasiswaModel = new DataMahasiswa();
        $prodi = $dataMahasiswaModel->loadProdi();
        $agamaa = $dataMahasiswaModel->loadAgama();
        $propinsi = $dataMahasiswaModel->loadProv();
        $userName = isLoggedIn();
        $this->render('input_mahasiswa', [
            'user' => $userName, 
            'prodi' => $prodi, 
            'agamaa' => $agamaa, 
            'propinsi' => $propinsi
        ], 'Data Mahasiswa');
    }
}
