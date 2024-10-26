<!DOCTYPE html>
<html>
 
 
 
<?php
include 'include/config.php';
if(isset($_POST['Simpan']))
{
$destinasiKODE = $_POST['kodedestinasi'];
$destinasiNAMA = $_POST['namadestinasi'];
$kategoriKODE = $_POST['kodekategori'];
 
 
 
mysqli_query($connection, "UPDATE destinasi set
destinasiNAMA = '$destinasiNAMA', kategoriKODE = '$kategoriKODE' where destinasiKODE = '$destinasiKODE'");
header("location:dashboard1.php");
 
 
 
}
$datakategori = mysqli_query($connection, "select * from kategoriwisata");
 
// untuk menerima kiriman data dari file yang akan diubah
$kodedestinasi = $_GET["ubah"];
$editdestinasi = mysqli_query($connection, "select * from destinasi
    where destinasiKODE = '$kodedestinasi' ");
    $rowedit = mysqli_fetch_array($editdestinasi);
 
    $editkategori = mysqli_query($connection, "select *
    from destinasi, kategoriwisata
    where destinasiKODE = '$kodedestinasi'
    and destinasi.kategoriKODE = kategoriwisata.kategoriKODE");
    $rowedit2= mysqli_fetch_array($editkategori);
 
 
 
?>
 
 
 
<head>
<title>DESTINASI</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
 
 
</head>
<body>
 
 
 
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
 
 
 
<form method="POST">
<div class="mb-3 row">
<label for="kodedestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="kodedestinasi" id="kodedestinasi"
value="<?php echo $rowedit["destinasiKODE"]?>">
</div>
</div>
 
 
 
<div class="mb-3 row">
<label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="namadestinasi" id="namadestinasi"
value="<?php echo $rowedit["destinasiNAMA"]?>">
</div>
</div>
 
 
 
<!--
<div class="mb-3 row">
<label for="kodekategori" class="col-sm-2 col-form-label">Kode Kategori</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="kodekategori" id="kodekategori">
</div>
</div>
-->
 
 
 
<div class="mb-3 row">
<label for="kodekategori" class="col-sm-2 col-form-label">Kategori Wisata</label>
<div class="col-sm-10">
<select class="form-control" name="kodekategori" id="kodekategori">
<option>Kategori Wisata</option>
<?php while($row = mysqli_fetch_array($datakategori))
{
?>
<option value="<?php echo $row["kategoriKODE"]?>">
<?php echo $row["kategoriKODE"]?>
<?php echo $row["kategoriNAMA"]?>
</option>
<?php } ?>
</select>
</div>
</div>
 
 
 
 
 
<div class="form-group row">
<div class="col-sm-2">
</div>
<div class="col-sm-10">
<input type="submit" name="Simpan" value="Simpan" class="btn btn-secondary">
<input type="reset" class="btn btn-success" value="Batal" name="Batal">
</div>
</div>
 
 
 
</form>
 
<!-- membuat form pencarian -->
<form method="POST">
    <div class="form-group row mb-2">
        <label for="search" class="col-sm-3">Nama Destinasi</label>
        <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search"
            value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>"
            placeholder="Cari nama destinasi">
        </div>
        <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="search">
    </div>
</form>
 
<!-- end form pencarian -->
 
<table class="table table-hover table-dark">
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">Kode Destinasi</th>
<th scope="col">Nama Destinasi</th>
<th scope="col">Kode Kategori</th>
 
<th colspan="2" style="tex-align: center">Aksi</th>
 
</tr>
</thead>
<tbody>
 
<!-- menerima kiriman dari form untuk pencarian pada tabel -->
    <?php
    if(isset($_POST["kirim"]))
    {
        $search = $_POST['search'];
        $query = mysqli_query($connection,"select destinasi.* from destinasi
            where destinasiNAMA like '%".$search."%'");
    }   else
        {
            $query = mysqli_query($connection, "select destinasi.* from destinasi");
        }
// <!-- end pencarian -->
 
 
// $query = mysqli_query($connection, "select destinasi.* from destinasi");
 
 
 
$nomor = 1;
while($row = mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo $nomor;?></td>
<td><?php echo $row['destinasiKODE'];?></td>
<td><?php echo $row['destinasiNAMA'];?></td>
<td><?php echo $row['kategoriKODE'];?></td>
 
<td width="5px">
    <a href="destinasiedit.php?ubah=<?php echo $row["destinasiKODE"]?>"
    class="btn btn-success btn-sm" title="edit">
 
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
</td>
<td width="5px">
<a href="destinasiedit.php?hapus=<?php echo $row["destinasiKODE"]?>"
    class="btn btn-danger btn-sm" title="hapus">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg>
</td>
 
</tr>
<?php $nomor = $nomor + 1; ?>
<?php } ?>
</tbody>
</table>
 
 
 
</div> <!-- penutup clas=col-sm-10 -->
</div> <!-- penutup clas=row -->
 
 
 
<script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
 
 
 
<script>
$(document).ready(function()
{
$('#kodeKategori').select2(
{
closeOnSelect:true,
allowClear:true,
placeholder:'Pilih Kategori Wisata'
});
});
</script>
 
 
 
</body>
</html>