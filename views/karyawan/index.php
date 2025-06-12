<?php require_once __DIR__ . '/../../helpers/auth.php'; requireLogin(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Karyawan</title>
  <link rel="icon" type="image/png" href="assets/image/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

  <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow">
    
    <!-- Header dan tombol -->
    <div class="flex justify-between items-center mb-6">
      <div>
        <h1 class="text-2xl font-semibold text-gray-700 mb-1">Daftar Karyawan</h1>
        <a href="index.php"
           class="text-sm text-gray-500 hover:text-blue-600 hover:underline">
          ← Kembali ke Halaman Utama
        </a>
      </div>
      <a href="index.php?page=karyawan&action=create"
         class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
        + Tambah Karyawan
      </a>
    </div>

    <?php if (empty($list)): ?>
      <p class="text-gray-500">Belum ada data karyawan.</p>
    <?php else: ?>
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border-collapse">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="px-4 py-2">No</th>
              <th class="px-4 py-2">Nama</th>
              <th class="px-4 py-2">Jabatan</th>
              <th class="px-4 py-2">Gaji Pokok</th>
              <th class="px-4 py-2 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white text-gray-700">
            <?php foreach ($list as $i => $row): ?>
              <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2"><?= $i + 1 ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row['nama']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row['jabatan']) ?></td>
                <td class="px-4 py-2">Rp <?= number_format($row['gaji_pokok'], 0, ',', '.') ?></td>
                <td class="px-4 py-2 text-center space-x-2">
                  <a href="index.php?page=karyawan&action=edit&id=<?= $row['id'] ?>"
                     class="text-blue-600 hover:underline">Edit</a>
                  <a href="index.php?page=karyawan&action=delete&id=<?= $row['id'] ?>"
                     onclick="return confirm('Yakin hapus data ini?')"
                     class="text-red-600 hover:underline">Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>

</body>
</html>
