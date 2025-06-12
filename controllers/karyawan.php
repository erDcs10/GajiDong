<?php
require_once __DIR__ . '/../models/Karyawan.php';

function handleKaryawan($action) {
  switch ($action) {
    case 'create':
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        addKaryawan($_POST['nama'], $_POST['jabatan'], $_POST['gaji_pokok']);
        header("Location: index.php?page=karyawan");
        exit;
      }
      include './views/karyawan/form.php';
      break;

    case 'edit':
      $id = $_GET['id'] ?? 0;
      $data = getKaryawanById($id);
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        updateKaryawan($id, $_POST['nama'], $_POST['jabatan'], $_POST['gaji_pokok']);
        header("Location: index.php?page=karyawan");
        exit;
      }
      include './views/karyawan/form.php';
      break;

    case 'delete':
      $id = $_GET['id'] ?? 0;
      deleteKaryawan($id);
      header("Location: index.php?page=karyawan");
      break;

    default:
      $list = getAllKaryawan();
      include './views/karyawan/index.php';
  }
}
