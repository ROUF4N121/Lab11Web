<?php
$db = new Database();
$id = $_GET['id'];
if ($db->delete("artikel", "WHERE id=" . $id)) {
    header('Location: index');
}
?>