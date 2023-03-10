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
            margin-right : 6px ;
            margin-top : 7px ;
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
$title = 'Data Pelanggan';
require 'koneksi.php';
require 'navigasi.php';
$query = 'SELECT * FROM pelanggan';
$data = mysqli_query($conn, $query);
?>
                        <h4 class="card-title"><?= $title; ?></h4>
                        <a href="tambah_pelanggan.php" class="button">
                            <i class="fa fa-plus"></i>
                            Tambah Pelanggan
<br>
                        </a>
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                  <br>
                                    <th style="width: 7%">No</th>
                                    <th>Nama</th>
                                    <th style="width: 20%;">No KTP</th>
                                    <th style="width: 25%;">Alamat</th>
                                    <th style="width: 15%;">Jenis Kelamin</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($data) > 0) {
                                    while ($plg = mysqli_fetch_assoc($data)) {
                                ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $plg['nama_pelanggan']; ?></td>
                                            <td><?= $plg['no_ktp']; ?></td>
                                            <td><?= $plg['alamat_pelanggan']; ?></td>
                                            <td><?php if ($plg['jenis_kelamin'] == 'L') {
                                                    echo "Laki-laki";
                                                } else {
                                                    echo "Perempuan";
                                                } ?>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="edit_pelanggan.php?id=<?= $plg['id_pelanggan']; ?>" ><button class="button">Edit</button></a>
                                                    </a>
                                                    <a href="hapus_pelanggan.php?id=<?= $plg['id_pelanggan']; ?>"><button class="button">Hapus</button></a>
                                                    </a>
                                                </div>
                                               
                                            </td>
                                        </tr>
                                        
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
?>