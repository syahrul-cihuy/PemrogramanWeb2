<div class="d-flex">
    <!-- SIDEBAR -->
    <div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">
        <h3 class="mb-4">NEWS PORTAL</h3>
        
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="/PEMWEB2/newsportal/admin/dashboard_admin.php" class="nav-link text-white">
                    Dashboard
                </a>
            </li>
            
            <!-- Mengaktifkan pembatasan menu untuk Ketua -->
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'ketua') : ?>
                <li class="nav-item mb-2">
                    <!-- PERBAIKAN: Mengubah user.user menjadi user.php -->
                    <a href="/PEMWEB2/newsportal/admin/user.php" class="nav-link text-white">
                        Kelola User
                    </a>
                </li>
            <?php endif; ?> <!-- PERBAIKAN: Penutup IF untuk menu Kelola User -->

            <li class="nav-item mb-2">
                <a href="/PEMWEB2/newsportal/admin/kategori/index.php" class="nav-link text-white">
                    Kategori
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="/PEMWEB2/newsportal/admin/artikel/index.php" class="nav-link text-white">
                    Artikel
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="/PEMWEB2/newsportal/admin/logout.php" class="nav-link text-danger">
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- AREA KONTEN UTAMA -->
    <!-- PERBAIKAN: Tag HTML yang bertumpuk dibersihkan menjadi rapi kembali -->
    <div class="p-4 w-100">
        <!-- Isi konten halaman admin ditaruh di bawah sini -->