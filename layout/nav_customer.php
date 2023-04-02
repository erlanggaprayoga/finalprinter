<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid">
    <a class="navbar-brand" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></a>
    <div class="navbar-nav">
        <a class="nav-link" href="../printer-xiirpl/index.php">Produk</a>
        <a class="nav-link" href="../printer-xiirpl/riwayat.php">Riwayat</a>
        <a class="nav-link" href="../printer-xiirpl/keranjang.php">Keranjang</a>
        <?php if (isset($_SESSION["username"])) : ?>

            <a class="nav-link disabled" href="#"><?= $_SESSION["nama_lengkap"];?></a>
            <a class="nav-link" href="../printer-xiirpl/logout.php">logout</a>
        <?php endif; ?>
        <?php if (!isset($_SESSION["username"])) : ?>
            <div class="atuh">
            <a class="nav-link" href="login/index.php">Login</a>
        </div>
        <?php endif; ?>
    </div>
    </div>
</nav>
