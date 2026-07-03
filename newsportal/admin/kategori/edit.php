<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../../auth/login.php");

}
require_once "../../config/koneksi.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query(
    $koneksi,
    "SELECT * FROM kategori WHERE id='$id'"
));
if (isset($_POST['update'])) {
    $nama = $_POST['nama_kategori'];
    $update = mysqli_query(
        $koneksi,
        "UPDATE kategori
    SET nama_kategori='$nama'
    WHERE id='$id'"
    );
    if ($update) {
        echo "
        <script>
            alert('Kategori berhasil diperbarui');
            window.location='index.php';
        </script>
        ";
    }
}
include "../header.php";
include "../sidebar.php";
?>
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <h3>Edit Kategori</h3>
            <hr>
            <form method="POST">
                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" value="<?= $data['nama_kategori']; ?>"
                        required>
                </div>
                <button type="submit" name="update" class="btn btn-primary">
                    Update
                </button>
                <a href="index.php" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
<?php include "../footer.php"; ?>