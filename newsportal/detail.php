<?php
include "config/koneksi.php";
$menuKategori = mysqli_query($koneksi,
"SELECT * FROM kategori
ORDER BY nama_kategori ASC");
include "includes/header.php";
include "includes/navbar.php";

$id = $_GET["id"];
$query = mysqli_query($koneksi, "SELECT artikel.*, kategori.nama_kategori, users.nama FROM artikel LEFT JOIN kategori ON artikel.kategori_id = kategori.id LEFT JOIN users ON artikel.user_id = users.id WHERE artikel.id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['kirim'])) {
    $nama = htmlspecialchars(trim($_POST['nama']));
    $email = htmlspecialchars(trim($_POST['email']));
    $komentar_input = htmlspecialchars(trim($_POST['komentar'])); // Mengubah nama agar tidak bentrok

    // PERBAIKAN: Menggunakan '$komentar_input' (buku '$isiKomentar')
    mysqli_query($koneksi, "INSERT INTO komentar (artikel_id, nama, email, komentar) VALUES ('$id', '$nama', '$email', '$komentar_input')");

    echo "<div class='alert alert-success'>Komentar berhasil dikirim.</div>"; // Perbaikan typo 'aler' menjadi 'alert'
}

$komentar = mysqli_query($koneksi, "SELECT * FROM komentar WHERE artikel_id='$id' ORDER BY id DESC");
?>

<div class="container mt-5">
    <h1><?= $data['judul']; ?></h1>
    <hr>
    <span class="badge bg-primary"><?= $data['nama_kategori']; ?></span>
    <p class="mt-2 text-muted">
        Oleh : <?= $data['nama']; ?> | <?= date('d M Y', strtotime($data['tanggal'])); ?>
    </p>
    <img src="uploads/<?= $data['thumbnail']; ?>" class="img-fluid rounded">

    <div class="mt-4">
        <!-- PERBAIKAN: Mengubah n12br menjadi nl2br (menggunakan huruf 'l') -->
        <?= nl2br($data['isi_berita']); ?>
    </div>

    <!-- tombol kembali -->
    <div class="mt-4">
        <a href="index.php" class="btn btn-secondary">← Kembali Ke Beranda</a>
    </div>

    <!-- Tulis komentar -->
    <hr>
    <h3 class="mt-5">Tulis Komentar</h3>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Komentar</label>
            <textarea name="komentar" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" name="kirim" class="btn btn-primary">Kirim Komentar</button>
    </form> <!-- PERBAIKAN: Tag form ditutup di sini agar tidak membungkus list komentar -->

    <!-- Tampilan Komentar -->
    <hr>
    <h3>Komentar Pembaca</h3>
    <?php
    if (mysqli_num_rows($komentar) > 0) {
        while ($k = mysqli_fetch_assoc($komentar)):
            ?>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h6><?= $k['nama']; ?></h6>
                    <small class="text-muted">
                        <!-- Deteksi otomatis jika kolom tanggal/created_at ada di DB -->
                        <?= isset($k['tanggal']) ? date('d F Y H:i', strtotime($k['tanggal'])) : ''; ?>
                    </small>
                    <p class="mt-2"><?= $k['komentar']; ?></p>
                </div>
            </div>
        <?php
        endwhile;
    } else {
        echo "<p class='text-muted'>Belum ada komentar. Jadi yang pertama berkomentar!</p>";
    }
    ?>
</div>

<?php include "includes/footer.php"; ?>