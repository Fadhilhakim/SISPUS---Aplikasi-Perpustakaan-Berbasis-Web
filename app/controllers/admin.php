<?php 

require_once '../app/models/admins.php';

class admin extends Controller {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        requireAuth(); 
    }

    public function index() {
        $userName = isLoggedIn(); 

        
        if ($userName) {
            $admins = new admins();
            $userName = $admins->getUserByUsername($userName['username']);
            $allAdmins = $admins->getAllAdmins();
    
            $success = null;
            if (isset($_GET['status']) && $_GET['status'] === 'success') {
                $success = true;
            }
            if (isset($_GET['detail'])) {
                $username = $_GET['detail'];
                $user = $admins->getUserByUsername($username);
                $this->render('admin', ['user' => $userName, 'detail' => $user, 'admins' => $allAdmins], 'Admin Sispus');
            } else { 
                $this->render('admin', ['user' => $userName, 'admins' => $allAdmins], 'Admin Sispus');
            }
        } else {
            // Jika tidak ada user, redirect ke login
            header('Location: /login');
            exit();
        }
    }

    public function update(){
        $userName = isLoggedIn(); 
        $admins = new admins();
        $allAdmins = $admins->getAllAdmins();
        $userName = $admins->getUserByUsername($userName['username']);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username']; 
            $new_username = $_POST['new_username']; 
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $foto = $_POST['foto'];
        
            $user = $admins->getUserByUsername($username);

            if ($user) {
                // Cek apakah password lama benar
                if ($user && password_verify($old_password, $user['password'])) {
                    // Hash password baru
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
                    // Update username, password & foto di database
                    $update_query = "UPDATE admins SET username = :username, password = :password, foto = :foto WHERE username = :old_username";
                    $db = Database::getConnection();
                    $stmt = $db->prepare($update_query);
                    $stmt->bindParam(':old_username', $username);
                    $stmt->bindParam(':password', $hashed_password);
                    $stmt->bindParam(':foto', $foto);
                    $stmt->bindParam(':username', $new_username);
        
                    if ($stmt->execute()) {
                        $success =  "Data Berhasil Disimpan";   
                        
                        if($username == $userName['username']) {
                            session_destroy();
                            session_start();
                            $user = $admins->getUserByUsername($new_username);
                            $_SESSION['user'] = $user;
                        }
                            header('Location: /admin?status=success&detail='.$new_username);
                        
                    } else {
                        $error =  "Ada Kesalahan Saat Memperbarui Akun!.";
                        $this->render('admin', ['user' => $userName, 'error' => $error, 'admins' => $allAdmins], 'Admin Sispus');
                    }
                } else {
                    $error =  "Password Lama Salah!.";
                    $this->render('admin', ['user' => $userName, 'error' => $error, 'admins' => $allAdmins], 'Admin Sispus');
                }
            } else {                
                $error =  "Username Tidak Ditemukan";
                $this->render('admin', ['user' => $userName, 'error' => $error, 'admins' => $allAdmins], 'Admin Sispus');
        
            }
        }
    }

    public function delete(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $admins = new admins();
            $admins->deleteAdmin($id);
        }

        header('Location: /admin?status=success');
    }

}