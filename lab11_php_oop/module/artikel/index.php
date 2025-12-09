<?php
$db = new Database();
$data = $db->query("SELECT * FROM artikel");
?>

<h2>Daftar Artikel</h2>

<table border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse: collapse;">
    <tr style="background:#eee;">
        <th>ID</th>
        <th>Judul</th>
        <th>Isi Artikel</th> <th>Aksi</th>
    </tr>
    <?php if ($data->num_rows > 0) : ?>
        <?php while ($row = $data->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['judul']; ?></td>
                <td>
                    <?= substr($row['isi'], 0, 50) . (strlen($row['isi']) > 50 ? '...' : ''); ?>
                </td>
                <td align="center">
                    <a href="ubah?id=<?= $row['id']; ?>" style="text-decoration:none; color:blue;">Ubah</a> | 
                    <a href="hapus?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?')" style="text-decoration:none; color:red;">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="4" align="center">Tidak ada data.</td></tr>
    <?php endif; ?>
</table>