<?php 
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
    alert('Mohon maaf anda bukan customer, enggak bisa masuk kesini!')
    window.location = '../login/index.php';
    </script>
    ";
}


$transaksi = query("SELECT * FROM transaksi WHERE nama_lengkap = '{$_SESSION['nama_lengkap']}' order by tanggal_transaksi desc");

?>

<?php require 'layout/nav_customer.php'; ?>
<?php require 'layout/navbar.php'; ?>  

<div id="main">
<div class="content">
    <h1>Data Transaksi</h1>
    <hr>
    <h3>Riwayat Pembelian Produk</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Tanggal Transaksi</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>No. WA</th>
            <th>Produk</th>
            <th>Total Harga</th>
            <th>foto</th>
            <th>status</th>
        </tr>
        
        <?php $i = 1; ?>
        <?php foreach($transaksi as $data) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $data["tanggal_transaksi"]; ?></td>
            <td><?= $data["nama_lengkap"]; ?></td>
            <td><?= $data["alamat"]; ?></td>
            <td><?= $data["nomor_whatsapp"]; ?></td>
            <td><?= $data["nama_produk"]; ?></td>
            <td><?= $data["subtotal"]; ?></td>
            <td><img src="image/<?= $data["foto"]; ?>" alt="" width="70"></td>
            <td><?= $data["status"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>
</div>

<?php require 'layout/footer-admin.php'; ?>  