<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Gaji Online</title>
  <link rel="icon" type="image/png" href="assets/image/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="bg-white shadow-lg rounded-xl w-full max-w-sm p-6">
    <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Login Gaji Online</h2>

    <?php if (!empty($error)): ?>
      <div class="bg-red-100 border border-red-300 text-red-700 p-3 mb-4 rounded text-sm">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-4">
        <label class="block text-sm text-gray-700 mb-1">Username</label>
        <input type="text" name="username" required autofocus
               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="mb-6">
        <label class="block text-sm text-gray-700 mb-1">Password</label>
        <input type="password" name="password" required
               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <button type="submit"
              class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Login</button>
    </form>

    <p class="text-sm text-center text-gray-500 mt-6">&copy; <?= date('Y') ?> Gaji Online</p>
  </div>

</body>
</html>
