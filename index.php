<?php
    require "koneksi.php";

    /* memanggil data yang dibutuhkan */
    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warung Milenial | Home</title>

  <!-- membuat link css bostrap dan fontawesome -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <!-- panggil require navbar -->
  <?php require "navbar.php"; ?>

  <!-- banner -->
  <div class="container-fluid banner d-flex align-items-center">
    <div class="container text-center text-white">
      <h1>Warung Milenial</h1>
      <h3>Mau Cari Apa?</h3>
      <!--  Melakukan ketengah offset 2 button dan col mengecilkan objek   -->
      <div class="col-md-8 offset-md-2">
        <form method="get" action="produk.php">
          <div class="input-group input-group-lg my-4">
              <input type="text" class="form-control" placeholder="Silahkan Pilih" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
              <button type="submit" class="btn warna2 text-white">Telusuri</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- higlitate kategori -->
  <div class="container-fluid py-5">
    <div class="container text-center">
      <h3>Kategori Menu</h3>

      <div class="row mt-5">
        <div class="col-md-4 mb-3">
          <div class="highlighted-kategori kategori-makanan-satu d-flex justify-content-center align-items-center">
            <h4 class="text-white"> <a class="no-decoration" href="produk.php?kategori=Seafod Tradisional"> Steak Tradisional</a></h4>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="highlighted-kategori kategori-makanan-dua d-flex justify-content-center align-items-center">
            <h4 class="text-white"></a><a class="no-decoration" href="produk.php?kategori=Salad Tradisional"> Salad Tradisional</a></h4>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="highlighted-kategori kategori-makanan-tiga d-flex justify-content-center align-items-center">
            <h4 class="text-white"> <a class="no-decoration" href="produk.php?kategori=Steak Tradisional"> Seafood Tradisional</a></h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- tentang kami -->
  <div class="container-fluid warna3 py-5">
    <div class="container text-center">
      <h3>Tentang Kami</h3>
      <p class="fs-5 mt-3">
      Waroeng Milenial, Mendengar embel-embel warung tentu membuat Teman Traveler berpikir tempat ini bakal terkesan sederhana. Namun penambahan kata ‘milenial’ seolah kontras karena generasi tersebut dikenal menyukai sesuatu yang serba kekinian.Waroeng Millenial mengusung konsep interior sedemikian rupa, sehingga pelanggan merasa nyaman berlama-lama di dalamnya. Beberapa permukaan dinding dihiasi mural yang sampaikan banyak pesan unik. Tempatnya sendiri cukup asyik untuk sekedar ngobrol bersama teman ataupun mengerjakan tugas.
      </p>
    </div>
  </div>

  <!-- produk -->
  <div class="container-fluid py-5">
    <div class="container text-center">
      <h3>Daftar Menu</h3>

      <div class="row mt-5">

      <!-- MELAKUKAN INISIALISASI PERULANGAN 6 perulangan data -->
      <?php while($data = mysqli_fetch_array($queryProduk)){ ?>


          <div class="col-sm-6 col-md-4 mb-3">
            <div class="card h-200">
              <!-- memanggil perulangan -->
              <div class="image-box">
              <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                <p class="card-text text-harga">Rp <?php echo $data['harga']; ?></p>
                <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-outline warna2 text-white ">Lihat Detail Food</a>
                <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-outline warna3 text-white ">Beli</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

      <!-- mt adalah untuk mengatur jarak bawah atas -->
      <a class="btn btn-outline-warning mt-4 p-2 " href="produk.php">Lihat Lainnya</a>
    </div>
  </div>

  <!-- footer -->
  <?php require "footer.php";  ?>

  
  <!-- membuat link script js bostrap dan font awesome -->
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="fontawesome/js/all.min.js"></script>
</body>
</html>