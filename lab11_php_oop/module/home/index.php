<?php
// Cek nama user (kalau login pakai nama asli, kalau belum pakai 'Pengunjung')
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Pengunjung';
?>

<h2>Selamat Datang</h2>
<p>Halo, <strong><?= $nama; ?></strong>. Selamat datang di Aplikasi Web Praktikum 12.</p>
<p>Ini adalah halaman utama (Home) yang dibuat dengan struktur modular sederhana.</p>

<?php if (isset($_SESSION['is_login'])): ?>
    <p>Anda sudah login sebagai admin. Silakan akses menu di sidebar untuk mengelola data.</p>
<?php else: ?>
    <p>Anda belum login. Silakan <a href="../user/login">Login Disini</a> untuk masuk ke sistem.</p>
<?php endif; ?>