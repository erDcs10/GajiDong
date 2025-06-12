<?php require_once __DIR__ . '/../../helpers/auth.php'; requireLogin(); ?>
<?php $edit = isset($data); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $edit ? 'Edit' : 'Tambah' ?> Karyawan</title>
  <link rel="icon" type="image/png" href="assets/image/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center px-4">

  <div class="bg-white shadow-xl rounded-xl w-full max-w-lg p-8">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center"><?= $edit ? 'Edit' : 'Tambah' ?> Data Karyawan</h2>

    <form method="POST" class="space-y-5">
      <!-- Nama -->
      <div>
        <label class="block mb-1 text-sm text-gray-600">Nama Lengkap</label>
        <input type="text" name="nama" required autofocus
               value="<?= $edit ? htmlspecialchars($data['nama']) : '' ?>"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Jabatan -->
      <div>
        <label class="block mb-1 text-sm text-gray-600">Jabatan</label>
        <input type="text" name="jabatan" required
               value="<?= $edit ? htmlspecialchars($data['jabatan']) : '' ?>"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Gaji Pokok -->
      <div>
        <label class="block mb-1 text-sm text-gray-600">Gaji Pokok (Rp)</label>
        <input type="number" name="gaji_pokok" required min="0" step="1000"
               value="<?= $edit ? $data['gaji_pokok'] : '' ?>"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Tombol -->
      <div class="flex justify-between items-center pt-4">
        <a href="index.php?page=karyawan"
           class="text-gray-500 hover:underline text-sm">&larr; Kembali</a>

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
          <?= $edit ? 'Update' : 'Simpan' ?>
        </button>
      </div>
    </form>
  </div>

</body>
</html>
