<?php
session_start(); // 1. Aktifkan session di baris paling atas 

// Load Konfigurasi & Library
if (file_exists("config.php")) include "config.php";
require "class/Database.php";
require "class/Form.php";

// Routing Logic
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/artikel/index';
$segments = explode('/', trim($path, '/'));

$mod = isset($segments[0]) ? $segments[0] : 'artikel';
$page = isset($segments[1]) ? $segments[1] : 'index';

// 2. Cek Session Login
// Halaman yang boleh diakses tanpa login
$public_pages = ['home', 'user']; 

if (!in_array($mod, $public_pages)) {
    // Jika mengakses halaman privat tapi belum login, lempar ke login
    if (!isset($_SESSION['is_login'])) {
        header('Location: http://localhost/lab11_php_oop/user/login');
        exit();
    }
}

// Tentukan file modul
$file = "module/{$mod}/{$page}.php";

// Logika Tampilan: Jangan load header/footer/sidebar jika sedang di halaman login
if ($mod == 'user' && $page == 'login') {
    if (file_exists($file)) {
        include $file;
    } else {
        echo "Halaman login tidak ditemukan.";
    }
} else {
    // Load Template Utama
    include "template/header.php";
    
    if (file_exists($file)) {
        include $file;
    } else {
        echo "<div style='margin:20px; color:red;'>Modul tidak ditemukan: <b>{$mod}/{$page}</b></div>";
    }

    include "template/sidebar.php";
    include "template/footer.php";
}
?>