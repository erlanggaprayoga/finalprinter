<?php 
session_start();

$id = $_GET["id"];
unset($_SESSION["cart"][$id]);
echo"
<script type='text/javascript'>
    alert('Produk Berhasil Dihapus');
    window.location = 'keranjang.php'
    </script>
";
?>