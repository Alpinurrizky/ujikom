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
          <li><a href="laporan.php" class="a <?php if ($title == 'laporan') {
                                                                        echo 'active';
                                                                    } ?>">Laporan</a></li>
          <li><a href="logout.php" class="logout">Logout</a></li>
      </ul>
	</header> 
