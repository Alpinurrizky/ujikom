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
$title = 'Edit Data Paket';
require 'koneksi.php';

$jenis = [
    'kiloan',
    'selimut',
    'bedcover',
    'kaos',
    'lain'
];

$id = $_GET['id'];
$query = "SELECT * FROM paket_cuci WHERE id_paket = '$id'";
$queryedit = mysqli_query($conn, $query);

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_paket'];
    $jenis = $_POST['jenis_paket'];
    $harga = $_POST['harga'];
    $id_outlet = $_POST['outlet_id'];

    $query = "UPDATE paket_cuci SET nama_paket = '$nama', jenis_paket = '$jenis', harga = '$harga', outlet_id = '$id_outlet' WHERE id_paket = '$id'";
    $update = mysqli_query($conn, $query);
    if ($update == 1) {
        $_SESSION['msg'] = 'Berhasil mengubah data';
        header('location:paket.php');
    } else {
        $_SESSION['msg'] = 'Gagal mengubah data!!!';
        header('location:paket.php');
    }
}

require 'navigasi.php';
?>
                   
                
                        <div class="card-title"><?= $title; ?>  : <strong><?= $edit["nama_paket"]; ?></strong></div>
                    </div>
                    <?php while ($edit = mysqli_fetch_assoc($queryedit)) { ?>
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="largeInput">Nama Paket</label>
                                    <input type="text" name="nama_paket" class="form-control form-control" id="defaultInput" value="<?= $edit['nama_paket']; ?>" placeholder="Paket...">
                                </div>
                                <div class="form-group">
                                    <label for="defaultSelect">Jenis Paket</label>
                                    <br>
                                    <select name="jenis_paket" class="form-control form-control" id="defaultSelect">
                                        <?php foreach ($jenis as $key) : ?>
                                            <?php if ($key == $edit['jenis_paket']) : ?>
                                                <option value="<?= $key ?>" selected><?= $key ?></option>
                                            <?php endif ?>
                                            <option value="<?= $key ?>"><?= ucfirst($key) ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="text" class="form-control" name="harga" aria-describedby="basic-addon1" value="<?= $edit['harga']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="defaultSelect">Pilih Outlet</label>
                                    <?php
                                    function ambildata($conn, $query)
                                    {
                                        $data = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($data) > 0) {
                                            while ($row = mysqli_fetch_assoc($data)) {
                                                $hasil[] = $row;
                                            }
                                            return $hasil;
                                        }
                                    }
                                    $query2 = "SELECT * FROM outlet";
                                    $data2 = ambildata($conn, $query2);
                                    ?>
                                    <select name="outlet_id" class="form-control form-control" id="defaultSelect">
                                        <?php foreach ($data2 as $outlet) : ?>
                                            <?php if ($data2['id_outlet'] == $edit['outlet_id']) : ?>
                                                <option value="<?= $outlet['id_outlet'] ?>" selected><?= $outlet['nama_outlet']; ?></option>
                                            <?php endif ?>
                                            <option value="<?= $outlet['id_outlet'] ?>"><?= $outlet['nama_outlet']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="card-action">
                                    <button type="submit" name="btn-simpan" class="btn btn-success">Submit</button>
                                    <!-- <button class="btn btn-danger">Cancel</button> -->
                                    <br><a href="javascript:void(0)" onclick="window.history.back();" class="link">Batal</a>
                                </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>