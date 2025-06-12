<?php
require_once __DIR__ . '/../config/database.php';

class Gaji
{
    private $pdo;

    public function __construct()
    {
        global $pdo; // gunakan koneksi dari database.php
        $this->pdo = $pdo;
    }

    // Ambil semua data penggajian
    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT p.*, k.nama 
            FROM penggajian p 
            JOIN karyawans k ON p.karyawan_id = k.id 
            ORDER BY p.tanggal DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil data penggajian berdasarkan ID
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT p.*, k.nama 
            FROM penggajian p 
            JOIN karyawans k ON p.karyawan_id = k.id 
            WHERE p.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah data penggajian baru
    public function insert($karyawanId, $potongan, $insentif, $totalGaji)
    {
        $stmt = $this->pdo->prepare("INSERT INTO penggajian 
            (karyawan_id, potongan, insentif, total_gaji, tanggal) 
            VALUES (?, ?, ?, ?, CURDATE())");
        return $stmt->execute([$karyawanId, $potongan, $insentif, $totalGaji]);
    }

    // Hapus data penggajian
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM penggajian WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Update data penggajian
    public function update($id, $potongan, $insentif, $totalGaji)
    {
        $stmt = $this->pdo->prepare("UPDATE penggajian 
            SET potongan = ?, insentif = ?, total_gaji = ? 
            WHERE id = ?");
        return $stmt->execute([$potongan, $insentif, $totalGaji, $id]);
    }
}
