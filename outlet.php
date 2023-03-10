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
            margin-right : 5px ;
            margin-top : 5px ;
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
require 'koneksi.php';
$title = 'Data Outlet' ;
require 'navigasi.php';
$query = 'SELECT outlet.*, user.nama_user FROM outlet LEFT JOIN user ON user.outlet_id = outlet.id_outlet';
$data = mysqli_query($conn, $query);
?>

                       
                         <h4 class="card-title"><?= $title; ?></h4>
                        <a href="tambah_outlet.php" class="button">
                            <i class="fa fa-plus"></i>
                            Tambah Outlet
<br>
                        </a>
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                  <br>
                                    <th style="width: 7%">No</th>
                                    <th>Nama</th>
                                    <th>Owner</th>
                                    <th>No Telepon</th>
                                    <th style="width: 25%;">Alamat</th>
                                    <th style="width: 10%">Aksi</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                              
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($data) > 0) {
                                    while ($outlet = mysqli_fetch_assoc($data)) {
                                ?>

                                        <tr>
                                          
                                            <td><?= $no++; ?></td>
                                            <td><?= $outlet['nama_outlet']; ?></td>
                                            <td><?php if ($outlet['nama_user'] == null) {
                                                    echo "Belum ada owner";
                                                } else {
                                                    echo $outlet['nama_user'];
                                                } ?>
                                            </td>
                                            <td><?= $outlet['telp_outlet']; ?></td>
                                            <td><?= $outlet['alamat_outlet']; ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="edit_outlet.php?id=<?= $outlet['id_outlet']; ?>" ><button class="button">Edit</button></a>
                                                    </a>
                                                    <a href="hapus_outlet.php?id=<?= $outlet['id_outlet']; ?>" ><button class="button">Hapus</button></a>
                                                    </a>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                      
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    