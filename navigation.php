<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
a{text-decoration: none; font-size: 20px;font-family: sans-serif;padding: 7px 5px}
ul{padding: 10px}
li{list-style: none; display: inline;}
li a{background: #222; color:#d4d4d4;}
li a:hover{background: #4da4ff; color:#fff;}
.navi{background: #222; height: 60px}
</style>
  </head>
<body>
<nav class="navi">
<ul>
<li><a href="index.php" class ="a <?php if ($title == 'dashboard') { echo 'active' ; } ?> ">Dashboard</a></li>
<li><a href="outlet.php" class ="a <?php if ($title == 'outlet') { echo 'active' ; } ?> ">Outlet</a></li>
<li><a href="paket.php" class ="a <?php if ($title == 'paket') { echo 'active' ; } ?> ">Paket</a></li>
<li><a href="pelanggan.php" class ="a <?php if ($title == 'pelanggan') { echo 'active' ; } ?> ">Pelanggan</a></li>
<li><a href="transaksi.php" class ="a <?php if ($title == 'transaksi') { echo 'active' ; } ?> ">Transaksi</a></li>
<li><a href="pengguna.php" class ="a <?php if ($title == 'pengguna') { echo 'active' ; } ?> ">Pengguna</a></li>
<li><a href="laporan.php" class ="a <?php if ($title == 'laporan') { echo 'active' ; } ?> ">Laporan</a></li>
<li><a href="logout.php" class="logout">Logout</a></li>
</ul>
</nav>
</body>