<?php
// Load Konfigurasi & Library
include "config.php";
require "class/Database.php";
require "class/Form.php";

// Routing Logic
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/artikel/index';
$segments = explode('/', trim($path, '/'));

$mod = isset($segments[0]) ? $segments[0] : 'artikel';
$page = isset($segments[1]) ? $segments[1] : 'index';

// Tentukan file modul
$file = "module/{$mod}/{$page}.php";

// Load Template Header
include "template/header.php";

// Load Konten Modul
if (file_exists($file)) {
    include $file;
} else {
    echo "<div style='margin:20px; color:red;'>Modul tidak ditemukan: <b>{$mod}/{$page}</b></div>";
}

// Load Template Sidebar & Footer
include "template/sidebar.php";
include "template/footer.php";
?>