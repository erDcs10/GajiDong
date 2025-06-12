<?php
require_once __DIR__ . '/../helpers/auth.php';
requireLogin();
require_once './config/database.php';

// Ambil semua data penggajian dan join dengan nama karyawan
$stmt = $pdo->query("
    SELECT p.id, k.nama, k.gaji_pokok, p.potongan, p.insentif, p.total_gaji, p.tanggal
    FROM penggajian p
    JOIN karyawans k ON p.karyawan_id = k.id
    ORDER BY p.tanggal DESC
");

$laporan = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Gaji</title>
  <link rel="icon" type="image/png" href="assets/image/favicon.ico">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
  <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-semibold text-gray-700">Laporan Gaji Karyawan</h2>
      <a href="index.php" class="text-sm text-gray-500 hover:text-blue-600 hover:underline">← Kembali ke Beranda</a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border-collapse">
        <thead>
          <tr class="bg-gray-200 text-gray-700">
            <th class="px-4 py-2 border">Tanggal</th>
            <th class="px-4 py-2 border">Nama</th>
            <th class="px-4 py-2 border">Gaji Pokok</th>
            <th class="px-4 py-2 border">Potongan</th>
            <th class="px-4 py-2 border">Insentif</th>
            <th class="px-4 py-2 border">Total Diterima</th>
        </thead>
        <tbody>
          <?php if (count($laporan) === 0): ?>
            <tr>
              <td colspan="6" class="text-center py-4 text-gray-500">Tidak ada data.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($laporan as $item): ?>
              <tr class="text-gray-700 even:bg-gray-50">
                <td class="px-4 py-2 border"><?= htmlspecialchars($item['tanggal']) ?></td>
                <td class="px-4 py-2 border"><?= htmlspecialchars($item['nama']) ?></td>
                <td class="px-4 py-2 border">Rp <?= number_format($item['gaji_pokok'], 0, ',', '.') ?></td>
                <td class="px-4 py-2 border">Rp <?= number_format($item['potongan'], 0, ',', '.') ?></td>
                <td class="px-4 py-2 border">Rp <?= number_format($item['insentif'], 0, ',', '.') ?></td>
                <td class="px-4 py-2 border font-semibold text-green-700">Rp <?= number_format($item['total_gaji'], 0, ',', '.') ?></td>
              </tr>
            <?php endforeach ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
