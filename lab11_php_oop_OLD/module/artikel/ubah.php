<?php
$id = $_GET['id'];
$db = new Database();
$data = $db->get("artikel", "id=" . $id);

$form = new Form("ubah?id=" . $id, "Update Artikel");

if ($_POST) {
    $data_update = [
        'judul' => $_POST['judul'],
        'isi' => $_POST['isi']
    ];
    if ($db->update('artikel', $data_update, "id=" . $id)) {
        header('Location: index');
    } else {
        echo "<p style='color:red'>Gagal update data.</p>";
    }
}
?>

<h2>Ubah Artikel</h2>
<?php
// Menggunakan Form dengan parameter default value
$form->addField("judul", "Judul Artikel", "text", $data['judul']);
$form->addField("isi", "Isi Artikel", "textarea", $data['isi']);
$form->displayForm();
?>