<?php
// Pastikan hanya user login yang bisa akses
if (!isset($_SESSION['is_login'])) {
    header('Location: login');
    exit;
}

$db = new Database();
$message = "";

// Proses Ganti Password
if ($_POST) {
    $password_baru = $_POST['password_baru'];
    
    if (!empty($password_baru)) {
        // Enkripsi Password Baru [cite: 1371]
        $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
        
        $username = $_SESSION['username'];
        $sql = "UPDATE users SET password = '{$password_hash}' WHERE username = '{$username}'";
        
        if ($db->query($sql)) {
            $message = "<div style='color:green'>Password berhasil diubah!</div>";
        } else {
            $message = "<div style='color:red'>Gagal mengubah password.</div>";
        }
    } else {
        $message = "<div style='color:red'>Password tidak boleh kosong.</div>";
    }
}
?>

<h2>Profil Pengguna</h2>
<p>Berikut adalah data akun Anda:</p>

<table style="width: 50%; border:none;">
    <tr>
        <td width="150"><strong>Username</strong></td>
        <td>: <?= $_SESSION['username']; ?></td>
    </tr>
    <tr>
        <td><strong>Nama Lengkap</strong></td>
        <td>: <?= $_SESSION['nama']; ?></td>
    </tr>
</table>

<hr>
<h3>Ubah Password</h3>
<?= $message; ?>

<form method="POST" action="">
    <label>Password Baru:</label><br>
    <input type="password" name="password_baru" style="width: 300px; padding: 5px;" required><br><br>
    
    <input type="submit" value="Simpan Password Baru" style="padding: 5px 10px;">
</form>