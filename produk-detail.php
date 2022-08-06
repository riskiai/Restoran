<?php
  require "koneksi.php";

  /* query data */
  $nama = htmlspecialchars($_GET['nama']);
  $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
  $produk = mysqli_fetch_array($queryProduk);

  /* query produk terakit */
  $queryProdukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 4");


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warung Milenial | Produk-Detail </title>

   <!-- membuat link css bostrap dan fontawesome -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?PHP require "navbar.php"; ?>

  <div class="container-fluid py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 mb-4">
          <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
        </div>
        <div class="col-lg-6 offset-lg-1">
          <h1><?php echo $produk['nama']; ?></h1>
          <p class="fs-5"><?php echo $produk['detail']; ?></p>
          <p class="text-harga">
              Rp. <?php echo $produk['harga']; ?>
          </p>
          <p class="fs-5">Status Ketersediaan : <strong> <?php echo $produk['ketersediaan_stok']; ?></strong></p>
        </div>
      </div>
    </div>
  </div>

  <!-- produk menu terkait -->
  <div class="container-fluid py-5 warna2">
      <div class="container">
        <h2 class="text-center text-white mb-5">Produk Menu Terkait</h2>

        <div class="row">
          <?php while($data=mysqli_fetch_array($queryProdukTerkait)){ ?>
          <div class="col-md-6 col-lg-3 mb-3">
            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">
              <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail produk-terkait-image" alt="">
            </a>
          </div>
          <?php } ?>
        </div>
      </div>
  </div>

    <!-- footer -->
    <?php require "footer.php"; ?>

 <!-- membuat link script js bostrap dan font awesome -->
 <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>