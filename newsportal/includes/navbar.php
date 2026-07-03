<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        Home
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Kategori
                    </a>
                    <ul class="dropdown-menu">
                        <?php while($menu = mysqli_fetch_assoc($menuKategori)) : ?>
                        <li>
                            <a class="dropdown-item" href="kategori.php?id=<?= $menu['id']; ?>">
                                <?= $menu['nama_kategori']; ?>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tentang.php">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-warning text-dark ms-2 px-3" href="auth/login.php">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>