<?php 

session_start();

$id = $_POST["id_produk"];
$qty = $_POST["qty"];

$_SESSION["cart"][$id] = $qty;

header('location: keranjang.php');

?>
<?php require 'layout/footer.php'; ?> 