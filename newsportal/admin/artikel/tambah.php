<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../../auth/login.php");
}
require_once "../../config/koneksi.php";


/* AMBIL DATA KATEGORI */
$kategori = mysqli_query(
    $koneksi,
    "SELECT * FROM kategori"
);

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    /* MEMBUAT SLUG */
    $slug = strtolower(str_replace(" ", "-", $judul));
    $isi = $_POST['isi_berita'];
    $kategori_id = $_POST['kategori_id'];
    $user_id = $_SESSION['id'];

    /* UPLOAD GAMBAR */
    $gambar = $_FILES['thumbnail']['name'];
    $tmp = $_FILES['thumbnail']['tmp_name'];
    move_uploaded_file(
        $tmp,
        "../../../uploads/" . $gambar
    );

    /* INSERT DATABASE */
    $simpan = mysqli_query(
        $koneksi,
        "INSERT INTO artikel
    (
        judul,
        slug,
        isi_berita,
        thumbnail,
        kategori_id,
        user_id
    )
    VALUES
    (
        '$judul',
        '$slug',
        '$isi',
        '$gambar',
        '$kategori_id',
        '$user_id'
    )"
    );
    if ($simpan) {
        echo "
        <script>
            alert('Artikel berhasil ditambahkan');
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
            <h3>Tambah Artikel</h3>
            <hr>
            <form method="POST" enctype="multipart/form-data">
                <!-- JUDUL -->
                <div class="mb-3">
                    <label>Judul artikel</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-select" required>
                        <option value="">
                            -- Pilih Kategori --
                        </option>
                        <?php while ($k = mysqli_fetch_assoc($kategori)): ?>
                            <option value="<?= $k['id']; ?>">
                                <?= $k['nama_kategori']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Isi Berita</label>

                    <textarea name="isi_berita" id="editor" rows="10" class="form-control" ></textarea>
                </div>

                <div class="mb-3">
                    <label>Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control" required>
                </div>

                <button type="submit" name="simpan" class="btn btn-primary">
                    Simpan Artikel
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
<?php include "../footer.php"; ?>