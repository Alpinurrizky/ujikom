<!DOCTYPE html>
<html lang="en">
<head>
  <style>
        button {
            padding : 8px 16px;
            margin-left : 6px;
            margin-right : 6px;
            border-radius : 4px ;
            color : white;
            background-color : #8d68e8;
            text-decoration : none;
            font-family : Arial,Helvetica, sans-serif ;
        }
        .button {
          padding : 5px 16px;
          margin-left : 6px;
            margin-right : 6px;
            margin-bottom : 8px;
            border-radius : 2px ;
            color : white;
            background-color : #8d68e8;
            text-decoration : none;
            font-family : Arial,Helvetica, sans-serif ;
        }
        </style>
<link href="../css/tbl.css?version=<?= filemtime("../css/tbl.css")?>" rel="stylesheet">
</head>
<body>
<?php
$title = 'Data Pengguna';
require 'koneksi.php';
$data = mysqli_query($conn, 'SELECT * FROM user ORDER BY role desc');
require 'navigasi.php';
?>
                        <h4 class="card-title"><?= $title; ?></h4>
                        <a href="tambah_pengguna.php" class="button">
                            <i class="fa fa-plus"></i>
                            Tambah Pengguna
<br>
                        </a>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                  <br>
                                    <th style="width: 7%;">No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($data) > 0) {
                                    while ($user = mysqli_fetch_assoc($data)) {
                                ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $user['nama_user']; ?></td>
                                            <td><?= $user['username']; ?></td>
                                            <td><?= $user['role']; ?></td>
                                            <!-- <td><?php if ($user['jenis_kelamin'] == 'L') {
                                                            echo "Laki-laki";
                                                        } else {
                                                            echo "Perempuan";
                                                        } ?>
                                            </td> -->
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="edit_pengguna.php?id=<?= $user['id_user']; ?>" ><button class="button">Edit</button></a>
                                                   
                                                  
                                                    <a href="hapus_pengguna.php?id=<?= $user['id_user']; ?>" ><button class="button">Hapus</button></a>
                                             <br>       
                                                </div>
                                               
                                            </td>
                                        </tr>
     
                                <?php }
                                }
                                ?>
                            