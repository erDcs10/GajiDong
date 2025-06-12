<?php
require_once __DIR__ . '/../config/database.php';

function loginUser($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && hash('sha256', $password) === $user['password']) {
        return $user;
    }
    return false;
}
