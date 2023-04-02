<?php include 'layout/navbar.php';?>

<?php
require 'layout/nav_customer.php'; 
require 'functions.php';
if(empty($_SESSION["cart"] || isset($_SESSION["cart"]))){
    echo "
    <script type='text/javascript'>
        alert('keranjang anda masih kosong, silahkan belanja terlebih dahulu');
        window.location = 'index.php';
    </script>
    ";
}
?>

<div class="checkout">
    <form action="" method="post">
        <label for="tanggal_transaksi">Tanggal Transaksi</label><br>
        <input type="text" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= date('y-m-d'); ?>"><br><br>

        <label for="alamat">Alamat</label><br>
        <input type="text" name="alamat" id="alamat"><br><br>

        <label for="nomor_whatsapp">Nomor whatsapp</label><br>
        <input type="number" name="nomor_whatsapp" id="nomor_whatsapp"><br><br>

        <label for="nama_penerima">Nama Penerima</label><br>
        <input type="text" name="nama_lengkap" id="nama_penerima" value="<?= $_SESSION["nama_lengkap"]; ?>"><br><br>

        <?php foreach($_SESSION["cart"] as $id_produk => $kuantitas) : ?>
            <?php 
                $data = query("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];
                $subTotal = $data["harga"] * $kuantitas;
            ?>
            <label for="nama_produk">Nama Produk</label><br>
            <input type="text" name="nama_produk" id="nama-produk" value="<?= $data["nama_produk"]; ?>"><br><br>

            <label for="harga">Harga Produk</label><br>
            <input type="text" name="harga" id="harga" value="<?= $data["harga"]; ?>"><br><br>

            <label for="subtotal">Sub Total Harga</label>
            <input type="text" name="subtotal" id="subtotal" value="<?= $subTotal; ?>">

            <input type="hidden" name="foto" value="<?= $data["foto"]; ?>">
            <?php endforeach; ?>

            <button type="submit" name="checkout">Checkout</button>
    </form>
</div>

<!-- fungsi checkout -->
<?php if(isset($_POST['checkout'])){
        if (checkoutProduct($_POST)>0) {
            echo "
            <script type='text/javascript'>
            alert('YEYYY!Barang Berhasil Di Checkout, Silahkan Di Tunggu Verifikasinya yaaa...!!!');
            window.location = 'index.php';
            </script>
            ";
        }else{
            echo mysqli_error($conn);
        }
} 
?>
<?php require 'layout/footer.php'; ?>  
<!-- fungsi checkout -->