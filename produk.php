<!-- membikin query dari database kategori -->
<?php

  require "koneksi.php";

  $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

  /* membikin 3 x query */
  /* get produk by nama produk/keyword */
  if(isset($_GET['keyword'])){
      $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
  }
  /* get produk by kategori */
  else if(isset($_GET['kategori_id'])){ 
    $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori_id]'");
    /* menampung id nya di parameter selanjutnya */
    $kategoriId = mysqli_fetch_array($queryGetKategoriId);

    /* selanjutnya ekseskusi lah */
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[kategori_id]'");
  }
  /* get produk default */
  else {
      $queryProduk = mysqli_query($con, "SELECT * FROM produk");
  }

  $countData = mysqli_num_rows($queryProduk);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warung Milenial || Produk</title>

  <!-- membuat link css bostrap dan fontawesome -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>  

    <!-- banner -->
    <div class="container-fluid banner-produk d-flex align-items-center">
      <div class="container">
      <h1 class="text-white text-center">Daftar Menu Favorit</h1>
      </div>
    </div>

    <!-- isi body beserta responsive -->
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-3 mb-5" >
          <h3>Kategori Menu</h3>
          <ul class="list-group">

            <!-- memanggil query dari database -->
            <!-- lakukan perulangan -->
            <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
            <a class="no-decoration" href="produk.php?kategori= <?php echo $kategori['nama']; ?>">
                <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
            </a>
            <?php } ?>
          </ul>
        </div>
        <div class="col-lg-9" >
              <h3 class="text-center mb-3">Daftar Menu</h3>
              <div class="row">
                <?php 
                    if($countData<1){
                      ?>
                            <h4 class="text-center my-5"> <i>
                              Produk Menu yang ada cari tidak tersedia</i></h4>
                      <?php
                    }
                ?>
                <!-- memanggil perulangan -->
                <?php while($produk = mysqli_fetch_array($queryProduk)) { ?>
                <div class="col-md-4 mb-4">
                   <div class="card h-200">
                   
                    <div class="image-box">
                    <img src="image/<?php echo $produk['foto']; ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                      <h4 class="card-title"><?php echo $produk['nama']; ?></h4>
                      <p class="card-text text-truncate"><?php echo $produk['detail']; ?></p>
                      <p class="card-text text-harga">Rp <?php echo $produk['harga']; ?></p>
                      <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" class="btn warna2 text-white">Lihat Detail Food</a>
                      <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" class="btn warna3 text-white">Beli</a>
                    </div>
                  </div>
                </div>
                  <?php } ?>
              </div>
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