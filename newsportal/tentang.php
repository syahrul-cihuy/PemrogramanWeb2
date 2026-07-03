<?php
include "config/koneksi.php";

// PERBAIKAN 1: Buat query untuk mengambil data kategori sebelum memanggil navbar
$menuKategori = mysqli_query($koneksi, "SELECT * FROM kategori");

include "includes/navbar.php";
include "includes/header.php";
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">
                Tentang NewsPortal
            </h1>
            <p class="lead">
                NewsPortal adalah media informasi digital yang menyajikan berita terkini, terpercaya, dan informatif dari berbagai kategori seperti Teknologi, Pengetahuan, Ekonomi, dan Kesehatan.
            </p>
            <p>
                Kami berkomitmen untuk menghadirkan informasi yang akurat berimbang, dan bermanfaat bagi masyarakat dengan tetap menjujung tinggi kode etik jurnalistik dan prinsip-prinsip pemberitaan yang profesional.
            </p>
        </div>
    </div>
    <hr class="my-5">
    <div class="row">
        <!-- Informasi -->
         <div class="col-md-6">
            <h3>
                Informasi perusahaan
            </h3>
            <table class="table">
                <tr>
                    <th width="180">Nama Media</th>
                    <td>NewsPortal</td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td>Pt NewsPortal Cihuy</td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td>Jl. Gatot Subroto No 66A, Kota Jakarta Timur, Indonesia</td>
                </tr>

                <tr>
                    <th>WhatsApp</th>
                    <td>
                        +62 219-298-721
                    </td>
                </tr>

                <tr>
                    <th>Telepon</th>
                    <td>
                        (041) 1209384
                    </td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>
                        redaksi@newsportal.com
                    </td>
                </tr>

            </table>
         </div>

         <!-- Maps -->
          <div class="col-md-6">
            <h3>
                Lokasi Kantor
            </h3>
            <!-- PERBAIKAN 3: Memperbaiki separator URL Google Maps (& danbukan $) -->
            <iframe src="https://www.google.com/maps?q=Semarang&output=embed" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
    </div>
    <hr class="my-5">
    <div class="row">
        <div class="col-md-6">
            <h3>
                Media sosial
            </h3>

            <ul class="list-group">
                <li class="list-group-item">
                    Instagram : @newsportal.id
                </li>
                <li class="list-group-item">
                    Tiktok : @newsportal.id
                </li>
                <li class="list-group-item">
                    Threads : @newsportal.id
                </li>
                <!-- PERBAIKAN 2: Memperbaiki typo 'clas' menjadi 'class' -->
                <li class="list-group-item">
                    Youtube : NewsPortal TV
                </li>
                <li class="list-group-item">
                    Facebook : NewsPortal Indonesia
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <h3>
                Struktur Redaksi
            </h3>
            <ul class="list-group">
                <li class="list-group-item">
                    Pemimpin Umum : Ahmad Nugroho
                </li>

                <li class="list-group-item">
                    Pemimpin Redaksi : Budi Santoso
                </li>
                <li class="list-group-item">
                    Redaktur Pelaksana : Siti Rahmawati
                </li>
                <li class="list-group-item">
                    Editor : Tim Editorial NewsPortal
                </li>
                <li class="list-group-item">
                    Reporter : Tim Jurnalis NewsPortal
                </li>
            </ul>
        </div>
    </div>
    <hr class="my-5">
    <div class="row">
        <div class="col-md-12">
            <h3>
                Kebijakan Pemberitaan
            </h3>
            <p>
                Seluruh berita yang diterbitkan NewsPortal telah melalui proses verifikasi dan penyuntingna oleh tim redaksi. NewsPortal berkomitmen menyajikan informasi akurat, berimbang, independen, dan bertanggung jawab sesuai dengan kode etik jurnalistik yang berlaku.
            </p>
            <p>
                Apabila terdapat kekeliruan dalam pemberitaan, pembaca dapat menghubungi redaksi melalui email atau WhatsApp resmi yang telah disediakan
            </p>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>