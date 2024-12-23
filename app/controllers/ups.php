<?php


class ups extends Controller {

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        requireAuth();
    }

    public function index() {
        $userName = isLoggedIn(); 
        $this->render("404", ['user' => $userName], 'Halaman Tidak Ditemukan');
    }
}