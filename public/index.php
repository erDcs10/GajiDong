<?php
require_once '../helpers/auth.php';

$page = $_GET['page'] ?? 'home';

// Halaman yang tidak butuh login
$publicPages = ['login'];

if (!in_array($page, $publicPages) && !isLoggedIn()) {
    header("Location: ?page=login");
    exit;
}

// Routing berdasarkan halaman
switch ($page) {
    case 'login':
        require '../controllers/auth.php';
        handleLogin();
        break;
    case 'logout':
        require '../controllers/auth.php';
        handleLogout();
        break;
    case 'karyawan':
        require '../controllers/karyawan.php';
        handleKaryawan($_GET['action'] ?? 'index');
        break;
    case 'gaji':
        require '../controllers/handlegaji.php';
        include '../views/gaji/proses.php';
        handleGaji($_GET['action'] ?? 'index');
        break;
    case 'home':
        requireLogin();
        include '../views/home.php';
        break;
    default:
        include '../views/home.php';
        break;
}
