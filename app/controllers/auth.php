<?php

class auth extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = $this->model('admins');
            $user = $userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: /home/index");
                exit;
            } else {
                $this->render('login', ['error' => 'Invalid username or password'], 'Halaman Login Sispus');
            }
        } else {
            $this->render('login', [], 'Halaman Login Sispus');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /auth/login");
        exit;
    }
}
