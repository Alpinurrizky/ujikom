<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  .form {
    padding: px;
  border: 1px solid gray;
  background-color:;
  border-radius: 6px;
  font: inherit;
  margin-bottom: 20px;
  }
  .card-body {
    width : 350px;
    background : white ;
    margin : 80px auto ;
    padding : 30px 20px ;
    box-sizing : border-box ;
    webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
	 -moz-box-shmoz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
	 box-shadow: 0px 0px 50px 0px rgba(224,255,255,0.75);
    border : 1px solid black ;
    border-radius : 16px ;
}
  </style>
<link href="../css/bar.css?version=<?= filemtime("../css/bar.css")?>" rel="stylesheet">
</head>
<body>
 
<?php
$title = 'Selamat Datang di Aplikasi Pengelolaan Laundry';
require 'koneksi.php';
require 'navigasi.php';

setlocale(LC_ALL, 'id_id');
setlocale(LC_TIME, 'id_ID.utf8');

$query4 = mysqli_query($conn, "SELECT SUM(total_harga) as total_penghasilan FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi WHERE status_bayar = 'dibayar'");
$total_penghasilan = mysqli_fetch_assoc($query4);
?>                  <div class="form">
                            <div class="numbers">
                                <p class="card-body">Total Penghasilan : <br><?= 'Rp ' . number_format($total_penghasilan['total_penghasilan']); ?></p>
                            </div>
                            </div>


</div>
</div>
<?php
?>