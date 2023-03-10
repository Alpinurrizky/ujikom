<!DOCTYPE html>
<html lang="en">
<head>
  <style>
       
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
$title = 'Data Paket';
require 'koneksi.php';
$query = "SELECT outlet.nama_outlet, paket_cuci.* FROM paket_cuci INNER JOIN outlet ON paket_cuci.outlet_id = outlet.id_outlet";
$data = mysqli_query($conn, $query);
require 'navigasi.php';
?>
                        <h4 class="card-title"><?= $title; ?></h4>
                        <a href="tambah_paket.php" class="button">
                            <i class="fa fa-plus"></i>
                            Tambah Paket
<br>
                        </a>
             
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                  <br>
                                    <th style="width: 7%">No</th>
                                    <th>Nama Paket</th>
                                    <th>Jenis</th>
                                    <th>Harga</th>
                                    <th>Outlet</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($data) > 0) {
                                    while ($paket = mysqli_fetch_assoc($data)) {
                                ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $paket['nama_paket']; ?></td>
                                            <td><?= $paket['jenis_paket']; ?></td>
                                            <td><?= 'Rp ' . number_format($paket['harga']); ?></td>
                                            <td><?= $paket['nama_outlet']; ?>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="edit_paket.php?id=<?= $paket['id_paket']; ?>" button class="button">Edit</button>
                                                    </a>
                                                     <a href="hapus_paket.php?id=<?= $paket['id_paket']; ?>"><button class="button">Hapus</button>
                                         
                                                    </a> 
                                                </div>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
<?php
?>