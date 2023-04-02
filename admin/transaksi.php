<?php 
require 'functions.php';

session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if($_SESSION["roles"] != "Admin"){
    echo "
    <script type='text/javascript'>
        alert('Mohon maaf anda bukan admin, enggak bisa masuk kesini!')
        window.location = '../login/index.php';
    </script>
    ";
}


$transaksi = query("SELECT * FROM transaksi WHERE status = 'proses' order by tanggal_transaksi desc");
$tolak = query("SELECT * FROM transaksi WHERE status = 'ditolak' order by tanggal_transaksi desc");
$verif = query("SELECT * FROM transaksi WHERE status = 'terverifikasi' order by tanggal_transaksi desc");
?>

<?php require '../layout/sidebar.php'; ?>
<div id="main">
<?php require '../layout/navbar-admin.php'; ?>  
<div class="content">
    <h1>Data Transaksi</h1>
    <hr>
    <h3>Produk Request</h3>
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
            <th>Aksi</th>
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
            <td><img src="../image/<?= $data["foto"]; ?>" alt="" width="70"></td>
            <td><?= $data["status"]; ?></td>
            <td>
                <a href="verifikasi.php?id=<?= $data["id_transaksi"]; ?>" onclick="return confirm('Apakah anda yakin ingin verifikasi pesanan?');">Accept</a>
                <a href="tolak.php?id=<?= $data["id_transaksi"]; ?>" onclick="return confirm('Apakah anda yakin ingin menolak pesanan?');">Decline</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <h3>Produk Selesai Diverifikasi</h3>
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
        <?php foreach($verif as $data) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $data["tanggal_transaksi"]; ?></td>
            <td><?= $data["nama_lengkap"]; ?></td>
            <td><?= $data["alamat"]; ?></td>
            <td><?= $data["nomor_whatsapp"]; ?></td>
            <td><?= $data["nama_produk"]; ?></td>
            <td><?= $data["subtotal"]; ?></td>
            <td><img src="../image/<?= $data["foto"]; ?>" alt="" width="70"></td>
            <td><?= $data["status"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <h3>Produk Selesai ditolak</h3>
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
        <?php foreach($tolak as $data) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $data["tanggal_transaksi"]; ?></td>
            <td><?= $data["nama_lengkap"]; ?></td>
            <td><?= $data["alamat"]; ?></td>
            <td><?= $data["nomor_whatsapp"]; ?></td>
            <td><?= $data["nama_produk"]; ?></td>
            <td><?= $data["subtotal"]; ?></td>
            <td><img src="../image/<?= $data["foto"]; ?>" alt="" width="70"></td>
            <td><?= $data["status"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>
</div>

<?php require '../layout/footer-admin.php'; ?> 