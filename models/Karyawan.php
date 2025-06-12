<?php
require_once __DIR__ . '/../config/database.php';

function getAllKaryawan() {
  global $pdo;
  return $pdo->query("SELECT * FROM karyawans ORDER BY id DESC")->fetchAll();
}

function getKaryawanById($id) {
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM karyawans WHERE id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch();
}

function addKaryawan($nama, $jabatan, $gaji) {
  global $pdo;
  $stmt = $pdo->prepare("INSERT INTO karyawans (nama, jabatan, gaji_pokok) VALUES (?, ?, ?)");
  return $stmt->execute([$nama, $jabatan, $gaji]);
}

function updateKaryawan($id, $nama, $jabatan, $gaji) {
  global $pdo;
  $stmt = $pdo->prepare("UPDATE karyawans SET nama = ?, jabatan = ?, gaji_pokok = ? WHERE id = ?");
  return $stmt->execute([$nama, $jabatan, $gaji, $id]);
}

function deleteKaryawan($id) {
  global $pdo;
  $stmt = $pdo->prepare("DELETE FROM karyawans WHERE id = ?");
  return $stmt->execute([$id]);
}
