<?php
session_start();
    if(!isset($_SESSION['role']) || $_SESSION['role']!="admin"){
    header("Location: ../auth/login.php");
    exit;
    }?>

<!DOCTYPE html>
    <html>
    <head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
        <body class="bg-light">
            <div class="container mt-5">
            <div class="card shadow">
            <div class="card-header bg-primary text-white">
            <h3>Dashboard Admin</h3>
        </div>
    <div class="card-body">
    <h4>Selamat Datang,

<?= $_SESSION['nama']; ?>
    </h4>
<p>
Role :
    <b><?= $_SESSION['role']; ?></b>
</p>
    <hr>
    <h5>Menu Admin</h5>
    <ul>
        <li>Kelola Artikel</li>
        <li>Kelola Kategori</li>
        <li>Kelola User</li>
        <li>Kelola Komentar</li>
    </ul>
                <a href="/PEMWEB2/newsportal/admin/logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>