<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan MVVM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { padding: 20px; font-family: sans-serif; }
        nav { background: #f8f9fa; padding: 15px; margin-bottom: 20px; border-bottom: 1px solid #ddd; }
        nav a { margin-right: 20px; text-decoration: none; color: #333; font-weight: bold; }
        nav a:hover { color: #007bff; }
    </style>
</head>
<body>

    <nav>
        <a href="index.php?entity=buku">📚 Data Buku</a>
        <a href="index.php?entity=anggota">👥 Data Anggota</a>
        <a href="index.php?entity=petugas">👮 Data Petugas</a>
        <a href="index.php?entity=peminjaman">🔄 Peminjaman</a>
    </nav>

    <div class="content">