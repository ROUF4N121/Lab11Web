<?php
$db = new Database();
$form = new Form("tambah", "Simpan Artikel");

if ($_POST) {
    $data = [
        'judul' => $_POST['judul'],
        'isi' => $_POST['isi']
    ];
    if ($db->insert('artikel', $data)) {
        header('Location: index');
    } else {
        echo "<p style='color:red'>Gagal menambah data.</p>";
    }
}
?>

<h2>Tambah Artikel Baru</h2>
<?php
$form->addField("judul", "Judul Artikel");
$form->addField("isi", "Isi Artikel", "textarea");
$form->displayForm();
?>