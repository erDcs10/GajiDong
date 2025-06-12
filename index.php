<?php
require_once __DIR__.'/helpers/auth.php';

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
        require './controllers/auth.php';
        handleLogin();
        break;
    case 'logout':
        require './controllers/auth.php';
        handleLogout();
        break;
    case 'karyawan':
        require './controllers/karyawan.php';
        handleKaryawan($_GET['action'] ?? 'index');
        break;
    case 'gaji':
        requireLogin();
        include './views/gaji/proses.php';
        break;
    case 'home':
        requireLogin();
        include './views/home.php';
        break;
    case 'laporan':
    requireLogin();
    include './views/laporan_gaji.php';
    break;

    default:
        include './views/home.php';
        break;
}
