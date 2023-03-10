<!DOCYTPE html>
<html>
<style>
form {
  background-color :  white;
  margin-top: 100px;
			margin-bottom: 100px;
			margin-right: 150px;
			margin-left: 60px
			
}
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-size : 11pt;
}
input[type=text], select, textarea{
  width: 100%;
  padding: 20px;
  border: 1px solid #ccc
}
button {
    padding : 8px 16px;
            margin-left : 20px;
            margin-right : 10px;
            margin-bottom : 20px;
            border-radius : 4px ;
            color : white;
            background-color : #40E0D0;
            text-decoration : none;
            font-family : Arial,Helvetica, sans-serif ;
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
link, 
.link:link,
.link:active,
.link:visited{
    padding : 7px 16px;
    height : 4px ;
    margin-left : 12px;
    margin-right : 5px;
    margin-bottom : 15px;
    border-radius : 4px ;
    color : white;
    background-color : #cf1b5c;
    text-decoration : none;
    font-family : Arial,Helvetica, sans-serif ;
}
.select::after {
  content: "";
  width: 0.8em;
  height: 0.5em;
  background-color: var(--select-arrow);
  clip-path: polygon(100% 0%, 0 0%, 50% 100%);
}
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
}
.btn {
    padding : 8px 16px;
    height : 5px ;
            margin-left : 20px;
            margin-right : 10px;
            margin-bottom : 20px;
            border-radius : 4px ;
            color : white;
            background-color : #8d68e8;
            text-decoration : none;
            font-family : Arial,Helvetica, sans-serif ;
}
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
</style>
<?php
$title = 'Tambah Data Pelanggan';
require 'koneksi.php';

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat_pelanggan'];
    $no_ktp = $_POST['no_ktp'];
    $telp = $_POST['telp_pelanggan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $query = "INSERT INTO pelanggan (nama_pelanggan, alamat_pelanggan, no_ktp, telp_pelanggan, jenis_kelamin) values ('$nama', '$alamat', '$no_ktp', '$telp', '$jenis_kelamin')";

    $insert = mysqli_query($conn, $query);
    if ($insert == 1) {
        $_SESSION['msg'] = 'Berhasil menambahkan pelanggan baru';
        header('location:pelanggan.php?');
    } else {
        $_SESSION['msg'] = 'Gagal menambahkan data baru!!!';
        header('location: pelanggan.php');
    }
}

require 'navigasi.php';
?>
                        <div class="card-title"><?= $title; ?></div>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="largeInput">No KTP Pelanggan</label>
                                <input type="text" name="no_ktp" class="form-control form-control" id="defaultInput" placeholder="No KTP..." maxlength="20">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" class="form-control form-control" id="defaultInput" placeholder="Nama...">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Pelanggan</label>
                                <textarea class="form-control" rows="5" name="alamat_pelanggan"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">No Telepon</label>
                                <input type="text" name="telp_pelanggan" class="form-control form-control" id="defaultInput" placeholder="No Telp...">
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control form-control" id="defaultSelect">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="btn-simpan" class="btn btn-success">Submit</button>
                                <!-- <button class="btn btn-danger">Cancel</button> -->
                                <a href="javascript:void(0)" onclick="window.history.back();" class="link">Batal</a>
                            </div>
                    </form>
                