<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 11 - Modular OOP</title>
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f4f4; }
        .wrapper { width: 960px; margin: 0 auto; background: #fff; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        header { background: #333; color: #fff; padding: 20px; }
        nav { background: #555; padding: 10px; }
        nav a { color: #fff; text-decoration: none; margin-right: 15px; }
        nav a:hover { text-decoration: underline; }
        
        /* Flexbox Layout */
        .content-area { display: flex; min-height: 400px; }
        .main-content { flex: 3; padding: 20px; border-right: 1px solid #ddd; }
        .sidebar { flex: 1; padding: 20px; background: #f9f9f9; }
        
        footer { background: #333; color: #fff; text-align: center; padding: 10px; clear: both; }
        
        table { width: 100%; border-collapse: collapse; margin-top:10px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Framework Modular Sederhana</h1>
        </header>
        <nav>
            <a href="http://localhost/lab11_php_oop/artikel/index">Data Artikel</a>
            <a href="http://localhost/lab11_php_oop/artikel/tambah">Tambah Artikel</a>
        </nav>
        
        <div class="content-area"> 
            <div class="main-content">