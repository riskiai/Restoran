<?php 
  $con = mysqli_connect("localhost", "root","","toko_online");

  /* Cek Koneksien */
  if (mysqli_connect_error()){
    echo "Konek Eror:" . mysqli_connect_error();
    exit();
  } 
?>