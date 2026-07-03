<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../../auth/login.php");
}
require_once "../../config/koneksi.php";
if (!isset($_POST['simpan'])) {
    $nama = $_POST['nama_kategori'];
    mysqli_query($koneksi, "INSERT INTO kategori(nama_kategori) VALUES('$nama')");
    header("Location:index.php");

}
include "../header.php";
include "../sidebar.php";
?>
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <h3>Tambah kategori</h3>
            <hr>
            <form method="POST">
                <div class="mb-3">
                    <label>Nama kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" required>
                </div>
                
                <button type="submit" name="simpan" class="btn btn-primary">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>