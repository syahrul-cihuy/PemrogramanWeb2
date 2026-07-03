<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../auth/login.php");
    exit; // Tambahkan exit setelah header redirect
}
require_once "../config/koneksi.php";

// Hitung total artikel
$artikel = mysqli_query($koneksi, "SELECT COUNT(*) as total_artikel FROM artikel");
$total_artikel = mysqli_fetch_assoc($artikel);

// HITUNG TOTAL KATEGORI
$kategori = mysqli_query($koneksi, "SELECT COUNT(*) as total_kategori FROM kategori");
$total_kategori = mysqli_fetch_assoc($kategori);

// HITUNG TOTAL KOMENTAR
$totalKomentar = mysqli_num_rows(
    mysqli_query(
        $koneksi,
        "SELECT * FROM komentar"
    )
);

// HITUNG TOTAL USER
$totalUser = mysqli_num_rows(
    mysqli_query(
        $koneksi,
        "SELECT * FROM users"
    )
);

include "header.php";
include "sidebar.php";
?>

<h2>Dashboard Ketua portal berita</h2>
<hr>

<!-- Semua card disatukan ke dalam satu row agar sejajar rapi -->
<div class="row g-4">
    <!-- Total Artikel -->
    <div class="col-md-4">
        <div class="card shadow border-0">
            <div class="card-body">
                <h5 class="text-muted">Total Artikel</h5>
                <h2 class="display-6 fw-bold">
                    <?= $total_artikel['total_artikel']; ?>
                </h2>
            </div>
        </div>
    </div>

    <!-- Total Kategori -->
    <div class="col-md-4">
        <div class="card shadow border-0">
            <div class="card-body">
                <h5 class="text-muted">Total Kategori</h5>
                <h2 class="display-6 fw-bold">
                    <?= $total_kategori['total_kategori']; ?>
                </h2>
            </div>
        </div>
    </div>

    <!-- Khusus menu Ketua ditaruh di dalam baris yang sama -->
    <?php if ($_SESSION['role'] == 'ketua') { ?>
        <!-- Total Komentar -->
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="text-muted">Total Komentar</h5>
                    <h2 class="display-6 fw-bold">
                        <?= $totalKomentar; ?>
                    </h2>
                </div>
            </div>
        </div>

        <!-- Total User -->
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="text-muted">Total User</h5>
                    <h2 class="display-6 fw-bold">
                        <?= $totalUser; ?>
                    </h2>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

</div> <!-- Penutup dari pembungkus konten utama yang ada di sidebar/header -->
<?php include "footer.php"; ?>