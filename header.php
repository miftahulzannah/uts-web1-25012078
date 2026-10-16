<?php
// File ini dipanggil setelah fungsi.php dan data/menu.php.
$judulHalaman = $judulHalaman ?? 'Kantin Kampus';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($judulHalaman) ?> - Modern Canteen</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="site-header">
    <a class="brand" href="index.php">Modern Canteen</a>
    <nav>
        <a href="keranjang.php">🛒 Cart (<?= array_sum($_SESSION['keranjang']) ?>)</a>
    </nav>
</header>
<?php if ($flash = ambilFlash()): ?>
    <div class="flash-wrap"><div class="alert <?= e($flash['tipe']) ?>"><?= e($flash['pesan']) ?></div></div>
<?php endif; ?>
