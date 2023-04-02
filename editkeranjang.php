<?php 
require 'functions.php';
$id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Keranjang</title>
</head>
<body>
    <h1>Edit Kuantitas Produk</h1>
    <form action="proses_editkeranjang.php" method="post">
        <input type="hidden" name="id_produk" value="<?= $_GET["id"]; ?>">

        <label for="qty">Kuantitas</label>
        <input type="number" name="qty" id="qty" value="<?= $_SESSION["cart"][$_GET["id"]]; ?>">

        <button type="submit" name="edit">Edit</button>
    </form>
</body>
<?php require 'layout/footer.php'; ?>  