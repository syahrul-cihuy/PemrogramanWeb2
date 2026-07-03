<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../../auth/login.php");
}
require_once "../../config/koneksi.php";
$query = mysqli_query(
    $koneksi,
    "SELECT artikel.*,
kategori.nama_kategori,
users.nama
FROM artikel
LEFT JOIN kategori
ON artikel.kategori_id = kategori.id
LEFT JOIN users
ON artikel.user_id = users.id
ORDER BY artikel.id DESC"
);

include "../header.php";
include "../sidebar.php";
?>

<div class="container-fluid">
    <h2>Data Artikel</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">
        Tambah Artikel
    </a>
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Thumbnail</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($query)):
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <img src="../../uploads/<?= $row['thumbnail']; ?>" width="100">
                            </td>
                            <td><?= $row['judul']; ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td>
                                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus artikel?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "../footer.php"; ?>