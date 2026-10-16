<?php
require_once __DIR__ . '/includes/fungsi.php';
require_once __DIR__ . '/data/menu.php';
$judulHalaman = 'Food Menus';
$kategoriList = kategoriTersedia($menu);

// GET kategori lebih diutamakan daripada cookie. Nilai kategori tetap divalidasi.
if (array_key_exists('kategori', $_GET)) {
    $kategoriDipilih = (string) $_GET['kategori'];
    if ($kategoriDipilih !== '' && !in_array($kategoriDipilih, $kategoriList, true)) {
        $kategoriDipilih = '';
    }
} else {
    $kategoriDipilih = (string) ($_COOKIE['kategori_favorit'] ?? '');
    if (!in_array($kategoriDipilih, $kategoriList, true)) {
        $kategoriDipilih = '';
    }
}
$kataKunci = trim((string) ($_GET['cari'] ?? ''));
$hasilMenu = [];
foreach ($menu as $kode => $item) {
    $cocokNama = $kataKunci === '' || stripos($item['nama'], $kataKunci) !== false;
    $cocokKategori = $kategoriDipilih === '' || $item['kategori'] === $kategoriDipilih;
    if ($cocokNama && $cocokKategori) {
        $hasilMenu[$kode] = $item;
    }
}
require __DIR__ . '/includes/header.php';

$gambarMenu = [
    'M001' => 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?auto=format&fit=crop&w=500&q=80',
    'M002' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?auto=format&fit=crop&w=500&q=80',
    'M003' => 'https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?auto=format&fit=crop&w=500&q=80',
    'M004' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?auto=format&fit=crop&w=500&q=80',
    'M005' => 'https://images.unsplash.com/photo-1613478223719-2ab802602423?auto=format&fit=crop&w=500&q=80',
    'M006' => 'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?auto=format&fit=crop&w=500&q=80',
];
?>
<section class="hero">
    <div class="hero-search">
        <h1>Find your favorite food</h1>
        <p>Menu kantin, tinggal pilih dan pesan.</p>
        <form method="get" action="index.php" class="search-form">
            <input type="text" name="cari" value="<?= e($kataKunci) ?>" placeholder="Search for food..." aria-label="Cari nama menu">
            <button type="submit" aria-label="Cari">⌕</button>
        </form>
        <?php if ($kategoriDipilih !== ''): ?>
            <a class="clear-filter" href="index.php">Hapus filter kategori</a>
        <?php endif; ?>
    </div>
</section>

<main class="container">
    <div class="section-heading">
        <h2>Food Menus</h2>
        <p>Pilih menu favoritmu hari ini</p>
    </div>

    <form method="post" action="proses.php" class="favorite-form">
        <input type="hidden" name="aksi" value="favorit">
        <label for="kategori">Kategori favorit</label>
        <select id="kategori" name="kategori" required>
            <option value="">Pilih kategori</option>
            <?php foreach ($kategoriList as $kategori): ?>
                <option value="<?= e($kategori) ?>" <?= $kategoriDipilih === $kategori ? 'selected' : '' ?>><?= e($kategori) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Simpan Favorit</button>
    </form>

    <?php if (!$hasilMenu): ?>
        <p class="alert warning">Menu tidak ditemukan. Coba kata kunci atau kategori lain.</p>
    <?php else: ?>
        <div class="menu-grid">
        <?php foreach ($hasilMenu as $item): ?>
            <article class="menu-card">
                <img class="menu-image" src="<?= e($gambarMenu[$item['kode']] ?? $gambarMenu['M001']) ?>" alt="<?= e($item['nama']) ?>" loading="lazy">
                <div class="menu-info">
                    <h3><?= e($item['nama']) ?></h3>
                    <p class="category"><?= e($item['kategori']) ?></p>
                    <p class="price"><?= rupiah($item['harga']) ?></p>
                    <p class="availability">● Tersedia</p>
                    <form method="post" action="proses.php" class="order-form">
                        <input type="hidden" name="aksi" value="tambah">
                        <input type="hidden" name="kode" value="<?= e($item['kode']) ?>">
                        <label class="sr-only" for="jumlah-<?= e($item['kode']) ?>">Jumlah <?= e($item['nama']) ?></label>
                        <input id="jumlah-<?= e($item['kode']) ?>" type="number" name="jumlah" min="1" max="10" step="1" placeholder="1" required>
                        <button type="submit">Add to cart</button>
                    </form>
                </div>
            </article>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
