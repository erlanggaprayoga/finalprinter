<?php 
require 'layout/navbar-admin.php'; 

require 'functions.php';
if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = 'login/index.php';
    </script>
    ";
}

if($_SESSION["roles"] != "Customer"){
    echo "
    <script type='text/javascript'>
        alert('Mohon maaf anda bukan Customer, enggak bisa masuk kesini!')
        window.location = '../login/index.php';
    </script>
    ";
}


$produk = query("SELECT * FROM produk");

?>




<div id="main">
<?php include 'layout/navbar.php'; ?>
    <div class="content">
        <h1>Data Produk</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach($produk as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td><img src="image/<?= $data["foto"]; ?>" alt="" width="70"></td>
                <td>Rp. <?= number_format($data["harga"]); ?></td>
                <td><?= $data["stok"]; ?></td>
                <td><?= $data["deskripsi"]; ?></td>
                <td><a href="detail.php?id=<?= $data["id_produk"]; ?>">Detail</a></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php require 'layout/footer.php'; ?> 