<html>
    <head>
        <title>Toko Print</title>
        <link rel="stylesheet" href="styleutama.css">
    </head>
    <body>
        
        <?php require 'functions.php'; 

?>
<?php $produk = query("SELECT * FROM produk"); ?>

    <?php require 'layout/nav_customer.php'; ?>
        <?php require 'layout/navbar.php'; ?>
        <h2>Data Produk yang tersedia</h2>
        <?php foreach($produk as $data) : ?>

            <!-- <img class="banner" src="banner.png" alt=""> -->
                    <div class="col-md-3">
                        <div class="kotak1">
                    <img src="image/<?= $data["foto"]; ?>" width="200">
                <div class="caption">
                    <?= $data ["nama_produk"]; ?>
                    <br>
                    <?= $data["harga"]; ?>
                    <br>
                    <?= $data["stok"]; ?>
                    <br>
                    <?= $data["deskripsi"]; ?>
                    <br>
                    <?php if(isset($_SESSION["username"])) : ?>
                        <div class="auth">
                            <a href="detail.php?id=<?= $data["id_produk"]; ?>">Detail</a>
                        </div>
                        <?php endif; ?>
                    
                    <?php if(!isset($_SESSION["username"])) : ?>
                        <div class="auth">
                            <a href="login/index.php"></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
        </div>
                
                <?php endforeach; ?>

</body>
</html>
<?php require 'layout/footer.php'; ?> 