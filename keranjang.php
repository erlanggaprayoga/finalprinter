<?php
require 'layout/nav_customer.php'; 
require 'functions.php';


if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
    alert('Silahkan login terlebih dahulu')
    window.location = 'login/index.php';
    </script>
    ";
    
}

if(empty($_SESSION["cart"] || isset($_SESSION["cart"]))){
    echo "
    <script type='text/javascript'>
        alert('keranjang anda masih kosong, silahkan belanja terlebih dahulu');
        window.location = 'index.php';
    </script>
    ";
}
include 'layout/navbar.php'; 

?>

<div class="keranjang-belanja">

    <h2>Keranjang Belanja</h2>
    <table border="1" cellpadding= "10" cellspacing="0">
        <tr>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Quantity</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        <?php $gradTotal = 0; ?>
        <?php foreach($_SESSION["cart"] as $id_produk => $kuantitas) : ?>
            <?php 
                $data = query("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];
                $totalHarga = $data["harga"] * $kuantitas;
                $gradTotal += $totalHarga;
            ?>
            <tr>
                <td><img src="image/<?= $data["foto"]; ?>" width="100"></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td><?= number_format ($data["harga"]); ?></td>
                <td><?= $kuantitas; ?></td>
                <td><?= number_format ($totalHarga); ?></td>
                <td><a href="hapus_keranjang.php?id=<?= $data["id_produk"]; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Produk Ini Dari Keranjang?')">Hapus</a>
                    <a href="editkeranjang.php?id=<?= $data["id_produk"] ?>">Edit</a>
            </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="6">
                <h4>Grand Total</h4>
                <p><?= number_format($gradTotal); ?></p>
            </td>
        </tr>
    </table>
    <tr>
        <a href="checkout.php">Checkout</a>
    </tr>
</div>
<?php require 'layout/footer.php'; ?>  
