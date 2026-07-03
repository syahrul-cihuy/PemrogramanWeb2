<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../auth/login.php");

}
require_once "../config/koneksi.php";

// Hitung total artikel
$artikel = mysqli_query($koneksi, "SELECT COUNT(*) as total_artikel FROM artikel");
$total_artikel = mysqli_fetch_assoc($artikel);

// HITUNG TOTAL KATEGORI
$kategori = mysqli_query($koneksi, "SELECT COUNT(*) as total_kategori FROM kategori");
$total_kategori = mysqli_fetch_assoc($kategori);

include "header.php";
include "sidebar.php";
?>

<h2>Dashboard admin portal berita</h2>
<hr>
<div class="row">
    <!-- total artikel -->
    <div class="col-md-4">
        <div class="shadow border-8">
            <div class="card-body">
                <h5>Total artikel</h5>
                <h2>
                    <?= $total_artikel['total_artikel']; ?>
                </h2>
            </div>
        </div>
    </div>

    <!-- TOTAL KATEGORI -->
    <div class="col-md-4">
        <div class="card shadow border-8">
            <div class="card-body">
                <h5>Total kategori</h5>
                <h2>
                    <?= $total_kategori['total_kategori']; ?>
                </h2>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?> 