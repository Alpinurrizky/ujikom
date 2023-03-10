<!DOCTYPE html>
<html lang="en">
<head>
  <style>
        button {
            padding : 8px 16px;
            margin-left : 6px;
            margin-right : 6px;
            margin-bottom : 10px;
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
$title = 'Data Transaksi';
require 'koneksi.php';

$query = "SELECT transaksi.*, pelanggan.nama_pelanggan, detail_transaksi.total_harga FROM transaksi INNER JOIN pelanggan ON pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN detail_transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi";
$data = mysqli_query($conn, $query);

require 'navigasi.php';
?>
                        <h4 class="card-title"><?= $title; ?></h4>
                        <a href="cari.php" class="button">
                            <i class="fa fa-plus"></i>
                            Tambah Transaksi
                        </a>
                        <a href="konfirmasi.php" class="button">
                            <i class="fas fa-user-check"></i>
                            Konfirmasi Pembayaran
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10%">No</th>
                                    <th>Kode</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th>Total</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                              
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($data) > 0) {
                                    while ($trans = mysqli_fetch_assoc($data)) {
                                ?>
<br>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $trans['kode_invoice']; ?></td>
                                            <td><?= $trans['nama_pelanggan']; ?></td>
                                            <td><?= $trans['status']; ?></td>
                                            <td><?= $trans['status_bayar']; ?></td>
                                            <td><?= 'Rp ' . number_format($trans['total_harga']); ?></td>
                                            <td>

                                                    <a href="detail.php?id=<?= $trans['id_transaksi']; ?>" ><button class="button">Detail</button></a>
                                                    
                                <?php }
                                }
                                ?>
                          