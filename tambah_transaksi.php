<!DOCYTPE html>
<html>
<style>
form {
    background-color :  transparen;
    box-sizing : border-box;
	width: 100%;
	padding: 10px;
	font-size: 11pt;
	margin-bottom: 20px;
}

  input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
  
}

/* Style the label to display next to the inputs */
label {

  padding: 12px 12px 12px 0;
  display: inline-block;
  font-size : 11pt;
 
}

button {
    padding : 8px 16px;
            margin-left : 19px;
            margin-right : 10px;
            margin-bottom : 20px;
            border-radius : 4px ;
            color : white;
            background-color : #40E0D0;
            text-decoration : none;
            font-family : Arial,Helvetica, sans-serif ;
}

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  
}
select {
  width: 100%;
  min-width: 15ch;
  max-width: 30ch;
  border: 1px solid var(--select-border);
  border-radius: 0.25em;
  padding: 0.25em 0.5em;
  font-size: 1.25rem;
  cursor: pointer;
  line-height: 1.1;
  background-color: #40E0D0;
  background-image: linear-gradient(to top, #f9f9f9, #fff 33%);
}

/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.card-body {
    width : 350px;
    background : white ;
    margin : 80px auto ;
    padding : 30px 20px ;
    box-sizing : border-box ;
    border : 1px solid black ;
    border-radius : 16px ;
}
.link, 
.link:link,
.link:active,
.link:visited{
    padding : 7px 15px;
    height : 4px ;
    margin-left : 19px;
    margin-right : 5px;
    margin-bottom : 15px;
    border-radius : 4px ;
    color : white;
    background-color : #cf1b5c;
    text-decoration : none;
    font-family : Arial,Helvetica, sans-serif ;
}
 
           
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
  </style>
<?php
$title = 'Tambah Transaksi';
require 'koneksi.php';

$tgl = date('Y-m-d h:i:s');
$seminggu = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$batas_waktu = date("Y-m-d h:i:s", $seminggu);

$kode = "CLN" . date('Ymdsi');
$id_outlet = $_SESSION['outlet_id'];
$id_user = $_SESSION['user_id'];
$id_pelanggan = $_GET['id'];

$query = "SELECT nama_outlet FROM outlet WHERE id_outlet = '$id_outlet'";
$data = mysqli_query($conn, $query);
$outlet = mysqli_fetch_assoc($data);

$query2 = "SELECT nama_pelanggan FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
$data2 = mysqli_query($conn, $query2);
$pelanggan = mysqli_fetch_assoc($data2);

$query3 = "SELECT * FROM paket_cuci WHERE outlet_id = '$id_outlet'";
$paket = mysqli_query($conn, $query3);

if (isset($_POST['btn-simpan'])) {
    $kode_invoice = $_POST['kode_invoice'];
    $biaya_tambah = $_POST['biaya_tambahan'];
    $diskon = $_POST['diskon'];
    $pajak = $_POST['pajak'];

    $query4 = "INSERT INTO transaksi (outlet_id, kode_invoice, id_pelanggan, tgl, batas_waktu, biaya_tambahan, diskon, pajak, status, status_bayar, id_user) VALUES ('$id_outlet', '$kode_invoice', '$id_pelanggan', '$tgl', '$batas_waktu', '$biaya_tambah', '$diskon', '$pajak', 'baru', 'belum', '$id_user')";
    $insert = mysqli_query($conn, $query4);
    if ($insert == 1) {
        $id_paket = $_POST['id_paket'];
        $qty = $_POST['qty'];
        $query5 = mysqli_query($conn, "SELECT * FROM paket_cuci WHERE id_paket = $id_paket");
        $paket_harga = mysqli_fetch_assoc($query5);
        $total = $paket_harga['harga'] * $qty;
        $kode_invoice;
        $query6 = mysqli_query($conn, "SELECT * FROM transaksi WHERE kode_invoice = '" . $kode_invoice . "'");
        $transaksi = mysqli_fetch_assoc($query6);
        $id_transaksi = $transaksi['id_transaksi'];

        $query_detail = "INSERT INTO detail_transaksi (id_transaksi, id_paket, qty, total_harga) VALUES ('$id_transaksi', '$id_paket', '$qty', '$total')";
        $insert_detail = mysqli_query($conn, $query_detail);
        if ($insert_detail == 1) {
            // $_SESSION['msg'] = 'Berhasil menambahkan ';
            header('location:transaksi_sukses.php?id=' . $id_transaksi);
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Gagal transaksi!!!</div>";
            header('location:tambah_transaksi.php');
        }
    }
}

require 'navigasi.php';
?>

            <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] <> '') { ?>
                <div class="alert alert-success" role="alert" id="msg">
                    <?= $_SESSION['msg']; ?>
                </div>
            <?php }
            $_SESSION['msg'] = ''; ?>
        </div>
                        <div class="card-title"><?= $title; ?></div>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="largeInput">Kode Invoice</label>
                                <input type="text" name="kode_invoice" class="form-control form-control" id="defaultInput" value="<?= $kode; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Outlet</label>
                                <input type="text" name="" class="form-control form-control" id="defaultInput" value="<?= $outlet['nama_outlet']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Pelanggan</label>
                                <input type="text" name="" class="form-control form-control" id="defaultInput" value="<?= $pelanggan['nama_pelanggan']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Pilih Paket</label>
                                <select name="id_paket" class="form-control form-control" id="defaultSelect">
                                    <?php while ($key = mysqli_fetch_array($paket)) { ?>
                                        <option value="<?= $key['id_paket']; ?>"><?= $key['nama_paket']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Jumlah</label>
                                <input type="text" name="qty" class="form-control form-control" id="defaultInput">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Biaya Tambahan</label>
                                <input type="text" name="biaya_tambahan" class="form-control form-control" id="defaultInput" value="0">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Diskon (%)</label>
                                <input type="text" name="diskon" class="form-control form-control" id="defaultInput" value="0">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Pajak</label>
                                <input type="text" name="pajak" class="form-control form-control" id="defaultInput" value="0">
                            </div>
                            <div class="card-action">
                                <button type="submit" name="btn-simpan" class="btn btn-success">Submit</button>
                                <!-- <button class="btn btn-danger">Cancel</button> -->
                                <br><a href="javascript:void(0)" onclick="window.history.back();" class="link">Batal</a>
                            </div>
                    </form>
                