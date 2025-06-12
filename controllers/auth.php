<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../helpers/auth.php';

function handleLogin() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = loginUser($username, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: index.php?page=home");
            exit;
        } else {
            $error = "Username atau password salah";
        }
    }

    include __DIR__ . '/../views/login.php';
}

function handleLogout() {
    logout();
}
