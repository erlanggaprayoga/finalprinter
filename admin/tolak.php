<?php 
session_start();
require 'functions.php';

$id = $_GET["id"];

    if(tolakProduk($id)){
        echo "
            <script type='text/javascript'>
                alert('produk gagal ditolak');
                window.location = 'transaksi.php';
            </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('produk berhasil ditolak');
            window.location = 'transaksi.php';
        </script>
    ";
    }


?>

<?php require '../layout/sidebar.php'?>

