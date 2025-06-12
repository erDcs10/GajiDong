<!-- views/home.php -->
<!DOCTYPE html>

<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="assets/image/favicon.ico">
  <title>Dashboard Penggajian</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-600">Gaji Online</h1>
      <div class="space-x-4">
        <a href="index.php" class="text-gray-700 hover:text-blue-600">Home</a>
        <a href="?page=karyawan" class="text-gray-700 hover:text-blue-600">Karyawan</a>
        <a href="?page=gaji" class="text-gray-700 hover:text-blue-600">Gaji</a>
        <a href="?page=logout" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="max-w-7xl mx-auto mt-10 px-4">
    <div class="bg-white rounded-xl shadow-lg p-6 md:flex md:items-center md:justify-between">
      <div>
        <h2 class="text-2xl font-semibold mb-2">Selamat datang di Gaji Online</h2>
        <p class="text-gray-600">Kelola data karyawan, proses penggajian, dan cetak laporan secara efisien.</p>
      </div>
      <img src="https://i.imgur.com/Pz8iWjJ.jpeg" alt="Payroll Illustration" class="w-32 md:w-48 mt-4 md:mt-0">
    </div>
  </section>

  <!-- Quick Menu -->
  <section class="max-w-7xl mx-auto mt-10 px-4 grid grid-cols-1 md:grid-cols-3 gap-6">
    <a href="?page=karyawan" class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 text-center">
      <h3 class="text-lg font-semibold text-blue-600">Manajemen Karyawan</h3>
      <p class="text-gray-500 mt-2">Tambah, ubah, dan hapus data karyawan.</p>
    </a>
    <a href="?page=gaji" class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 text-center">
      <h3 class="text-lg font-semibold text-blue-600">Proses Gaji</h3>
      <p class="text-gray-500 mt-2">Kelola dan proses gaji karyawan.</p>
    </a>
    <a href="?page=laporan" class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 text-center">
      <h3 class="text-lg font-semibold text-blue-600">Laporan</h3>
      <p class="text-gray-500 mt-2">Lihat dan cetak laporan penggajian.</p>
    </a>
  </section>

  <!-- Footer -->
  <footer class="text-center text-sm text-gray-500 mt-10 py-6">
    &copy; <?= date('Y') ?> Gaji Online. All rights reserved.
  </footer>

</body>
</html>
