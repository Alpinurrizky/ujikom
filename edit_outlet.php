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
            margin-left : 20px;
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
.btn {
    padding : 8px 16px;
    height : 5px ;
            margin-left : 20px;
            margin-right : 10px;
            margin-bottom : 20px;
            border-radius : 4px ;
            color : white;
            background-color : #cf1b5c;
            text-decoration : none;
            font-family : Arial,Helvetica, sans-serif ;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
  </style>
<?php
$title = 'Edit Data Outlet';
require 'koneksi.php';

$query = "SELECT outlet.*, user.nama_user, user.id_user FROM outlet LEFT JOIN user ON user.outlet_id = outlet.id_outlet WHERE id_outlet  = " . $_GET['id'];
$data = mysqli_query($conn, $query);
$edit = mysqli_fetch_assoc($data);


$query2 = "SELECT user.*, outlet.nama_outlet FROM outlet RIGHT JOIN user ON user.outlet_id = outlet.id_outlet WHERE user.role = 'owner' ORDER BY user.outlet_id ASC";
$data2 = mysqli_query($conn, $query2);

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_outlet'];
    $alamat = $_POST['alamat_outlet'];
    $telp = $_POST['telp_outlet'];

    $query = "UPDATE outlet SET nama_outlet = '$nama', alamat_outlet = '$alamat', telp_outlet = '$telp' WHERE id_outlet = " . $_GET['id'];

    if ($_POST['owner_new_id']) {
        $query2 = "UPDATE user SET outlet_id = '" . $_GET['id'] . "' WHERE id_user = " . $_POST['owner_new_id'];
        $query3 = "UPDATE user SET outlet_id = NULL WHERE id_user = " . $edit['id_user'];
        $update3 = mysqli_query($conn, $query3);
    } else {
        $query2 = "UPDATE user SET outlet_id = '" . $_GET['id'] . "' WHERE id_user = " . $_POST['id_owner'];
    }

    $update = mysqli_query($conn, $query);
    $update2 = mysqli_query($conn, $query2);
    if ($update == 1 && $update2 == 1) {
        $_SESSION['msg'] = 'Berhasil Mengubah Data';
        header('location:outlet.php');
    } else {
        $_SESSION['msg'] = 'Gagal Mengubah Data!!!';
        header('location:outlet.php');
    }
}

require 'navigasi.php';
?>

                
    
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title; ?>
                            : <strong><?= $edit['nama_outlet']; ?></strong></div>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="largeInput">Nama Outlet</label>
                                <input type="text" name="nama_outlet" class="form-control form-control" id="defaultInput" value="<?= $edit['nama_outlet']; ?>" placeholder="Outlet...">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Outlet</label>
                                <textarea class="form-control" rows="5" name="alamat_outlet"><?= $edit['alamat_outlet']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">No Telepon</label>
                                <input type="text" name="telp_outlet" class="form-control form-control" id="defaultInput" value="<?= $edit['telp_outlet']; ?>" placeholder="No Telp..." maxlength="15">
                            </div>
                            <div class="form-group">
                                <?php if ($edit['nama_user'] == null) : ?>
                                    <label for="defaultSelect">Belum Ada Owner</label>
                                    <select name="id_owner" class="form-control form-control" id="defaultSelect">
                                        <?php foreach ($data2 as $owner) : ?>
                                            <option value="<?= $owner['id_user']; ?>"><?= $owner['nama_user']; ?>
                                                <?php if ($owner['outlet_id'] == null) : ?>
                                                    (Belum mempunyai outlet)
                                                <?php else : ?>
                                                    (Owner di <?= $owner['nama_outlet']; ?>)
                                                <?php endif ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                            </div>
                        <?php else : ?>
                            <label for="defaultSelect">Owner Sekarang : <?= $edit['nama_user']; ?></label>
                            <select name="owner_new_id" class="form-control form-control" id="defaultSelect">
                                <!-- <option value="">Pilih Owner Baru</option> -->
                                <?php foreach ($data2 as $owner) :  ?>
                                    <option value="<?= $owner['id_user']; ?>" selected><?= $owner['nama_user'] ?>
                                        <?php if ($owner['outlet_id'] == null) : ?>
                                            (Belum memiliki outlet)
                                        <?php else : ?>
                                            (Owner berada di <?= $owner['nama_outlet']; ?>)
                                        <?php endif ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <br>
                    <?php endif; ?>
                    <div class="card-action">
                        <button type="submit" name="btn-simpan" class="btn-succes">Submit</button>
                        <!-- <button class="button">Cancel</button> -->
                        <br><a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-danger">Batal</a>
                    </div>
                    </form>
           </html>
