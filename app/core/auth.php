<?php

function isLoggedIn() {
    return isset($_SESSION['user']) ? $_SESSION['user'] : false;  // Make sure this returns a string
}

function requireAuth() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['user'])) {
        header("Location: /auth/login");
        exit;
    }
}

