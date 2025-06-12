<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: ?page=login");
        exit;
    }
}

function logout() {
    session_destroy();
    header("Location: ?page=login");
    exit;
}
