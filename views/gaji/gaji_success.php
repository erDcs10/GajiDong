<?php require_once __DIR__ . '/../../helpers/auth.php'; requireLogin(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Gaji Terkirim</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-xl shadow-md max-w-md text-center">
    <h2 class="text-xl font-semibold text-green-700 mb-4">Berhasil Mengirim Gaji</h2>
    <p class="text-gray-700 mb-6"><?= htmlspecialchars($_GET['pesan'] ?? 'Gaji telah disimulasikan terkirim.') ?></p>
    <a href="../views/gaji.php" class="text-blue-600 hover:underline">← Kembali ke Form Gaji</a>
  </div>
</body>
</html>
