<?php require_once __DIR__ . '/../../helpers/auth.php'; requireLogin(); 
require_once './config/database.php';?>

<?php
// Ambil semua karyawan dari database
$stmt = $pdo->query("SELECT * FROM karyawans ORDER BY nama ASC");
$karyawanList = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Inisialisasi hasil
$hasil = null;

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
  $id = $_POST['karyawan'];
  $potongan = (int) $_POST['potongan'];
  $insentif = (int) ($_POST['insentif'] ?? 0);
  $tanggal = date('Y-m-d');

  // Ambil data karyawan dari DB berdasarkan ID
  $stmt = $pdo->prepare("SELECT * FROM karyawans WHERE id = ?");
  $stmt->execute([$id]);
  $karyawan = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($karyawan) {
    $total = max(0, $karyawan['gaji_pokok'] - $potongan + $insentif);
    $hasil = [
      'nama' => $karyawan['nama'],
      'gaji' => $karyawan['gaji_pokok'],
      'potongan' => $potongan,
      'insentif' => $insentif,
      'total' => $total
    ];
  }

  $insert = $pdo->prepare("INSERT INTO penggajian (karyawan_id, potongan, insentif, total_gaji, tanggal) VALUES (?, ?, ?, ?, ?)");
  $insert->execute([$id, $potongan, $insentif, $total, $tanggal]);

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Proses Gaji</title>
  <link rel="icon" type="image/png" href="assets/image/favicon.ico">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
  <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow">
    <div class="mb-6">
      <h2 class="text-2xl font-semibold text-gray-700 mb-1">Proses Gaji Karyawan</h2>
      <a href="index.php" class="text-sm text-gray-500 hover:text-blue-600 hover:underline">← Kembali ke Beranda</a>
    </div>

    <form method="POST" class="space-y-4">
      <!-- Pilih Karyawan -->
      <div>
        <label class="block text-gray-600 mb-1">Pilih Karyawan</label>
        <select name="karyawan" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
          <option value="">-- Pilih --</option>
          <?php foreach ($karyawanList as $k): ?>
            <option value="<?= $k['id'] ?>" <?= isset($id) && $id == $k['id'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($k['nama']) ?> - Rp <?= number_format($k['gaji_pokok'], 0, ',', '.') ?>
            </option>
          <?php endforeach ?>
        </select>
      </div>

      <!-- Potongan -->
      <div>
        <label class="block text-gray-600 mb-1">Potongan Gaji (Rp)</label>
        <input type="number" name="potongan" value="<?= $_POST['potongan'] ?? 0 ?>" min="0"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
      </div>
        
      <!-- Insentif -->
    <div>
        <label class="block text-gray-600 mb-1">Insentif (Rp)</label>
        <input type="number" name="insentif" value="<?= $_POST['insentif'] ?? 0 ?>" min="0"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
    </div>

      <!-- Tombol -->
      <div class="pt-4">
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
          Proses Gaji
        </button>
      </div>
    </form>

    <!-- Hasil -->
    <?php if ($hasil): ?>
  <div id="popupGaji" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-xl max-w-sm w-full">
      <h3 class="text-xl font-bold text-green-600 mb-3">Berhasil di-transfer!</h3>
      <p class="text-gray-700 mb-2"><strong>Nama:</strong> <?= htmlspecialchars($hasil['nama']) ?></p>
      <p class="text-gray-700"><strong>Total Gaji Diterima:</strong> Rp <?= number_format($hasil['total'], 0, ',', '.') ?></p>
      <button onclick="tutupPopup()" class="mt-4 w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg">Tutup</button>
    </div>
  </div>
    <?php endif; ?>

  <script>
  function tutupPopup() {
    document.getElementById("popupGaji").style.display = "none";

    const form = document.querySelector("form");
    if (form) form.reset();
  }
</script>

</body>
</html>