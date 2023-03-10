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
            background-color : #17aaaf;
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
            background-color : #17aaaf;
            text-decoration : none;
            font-family : Arial,Helvetica, sans-serif ;
        }
        </style>
<link href="../css/tbl.css?version=<?= filemtime("../css/tbl.css")?>" rel="stylesheet">
</head>
<body>
<?php
$title = 'Data Laporan';
require 'koneksi.php';

$query = "SELECT transaksi.*, pelanggan.nama_pelanggan, detail_transaksi.total_harga, outlet.nama_outlet FROM transaksi INNER JOIN pelanggan ON pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN detail_transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi INNER JOIN outlet ON outlet.id_outlet = transaksi.outlet_id";
$data = mysqli_query($conn, $query);

require 'navigasi.php';
?>
                        <h4 class="card-title"><?= $title; ?></h4>
                        <a href="cetak.php" target="_blank" class="button">
                            <i class="fas fa-print"></i>
                            Cetak Laporan
<br>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                  <br>
                                    <th style="width: 7%">#</th>
                                    <th>Kode</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th>Total</th>
                                    <th>Outlet Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($data) > 0) {
                                    while ($trans = mysqli_fetch_assoc($data)) {
                                ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $trans['kode_invoice']; ?></td>
                                            <td><?= $trans['nama_pelanggan']; ?></td>
                                            <td><?= $trans['status']; ?></td>
                                            <td><?= $trans['status_bayar']; ?></td>
                                            <td><?= 'Rp ' . number_format($trans['total_harga']); ?></td>
                                            <td><?= $trans['nama_outlet']; ?></td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    