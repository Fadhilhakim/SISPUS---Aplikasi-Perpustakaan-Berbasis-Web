<?php

class register extends Controller {
    public function index() {
        $this->render("register", [], 'Registrasi Admin');
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);

            // Validasi input
            $error = $this->validateInput($username, $password, $confirm_password);
            if ($error) {
                $this->render("register", ['error' => $error], 'Registrasi Admin');
                exit;
            }

            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Simpan ke database
            $db = Database::getConnection();
            if ($this->isUsernameExists($db, $username)) {
                $error = "Username sudah terdaftar!";
            } else {
                $this->insertUser($db, $username, $hashed_password);
                $success = "Registrasi berhasil! Silakan login.";
                // header("location: /auth/login");
                $this->render('login', ['success' => $success], 'Halaman Login Sispus');
                exit;
            }
        }
    }

    private function validateInput($username, $password, $confirm_password) {
        if (empty($username) || empty($password) || empty($confirm_password)) {
            return "Semua field harus diisi!";
        }
        if ($password !== $confirm_password) {
            return "Password dan konfirmasi password tidak cocok!";
        }
        if (strlen($password) < 3) {
            return "Password harus memiliki minimal 3 karakter!";
        }
        return null;
    }

    private function isUsernameExists($db, $username) {
        $query = "SELECT 1 FROM admins WHERE username = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch() !== false;
    }

    private function insertUser($db, $username, $hashed_password) {
        $query = "INSERT INTO admins (username, password) VALUES (:username, :password)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
