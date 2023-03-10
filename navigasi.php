<!DOCTYPE html>

<html lang="en">

<head>
<link href="../css/bar.css?version=<?= filemtime("../css/bar.css")?>" rel="stylesheet">
    <title>laundry</title>
</head>

 <header class="header">
		<h1 class="logo"><a href="index.php" class="a <?php if ($title == 'dashboard') {
                                                                    echo 'active';
                                                                } ?>">Dashboard</a></h1>
      <ul class="main-nav">
          <li><a href="outlet.php" class="a <?php if ($title == 'outlet') {
                                                                        echo 'active';
                                                                    } ?>">Data Outlet</a></li>
          <li><a href="paket.php" class="a <?php if ($title == 'paket') {
                                                                    echo 'active';
                                                                } ?>">Data Paket</a></li>
          <li><a href="pelanggan.php" class="a <?php if ($title == 'pelanggan') {
                                                                        echo 'active';
                                                                    } ?>">Data Pelanggan</a></li>
          <li><a href="transaksi.php" class="a <?php if ($title == 'transaksi') {
                                                                        echo 'active';
                                                                    } ?>">Data Transaksi</a></li>
          <li><a href="pengguna.php" class="a <?php if ($title == 'pengguna') {
                                                                        echo 'active';
                                                                    } ?>">Data Pengguna</a></li>
          <li><a href="laporan.php" class="a <?php if ($title == 'laporan') {
                                                                        echo 'active';
                                                                    } ?>">Laporan</a></li>
          <li><a href="logout.php" class="logout">Logout</a></li>
      </ul>
	</header> 
