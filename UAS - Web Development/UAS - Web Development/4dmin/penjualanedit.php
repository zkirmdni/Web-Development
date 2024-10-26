<!DOCTYPE html>
<html>
<head>
    <title>PENJUALAN</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>
</head>
<body>
    <!-- Konten Form -->
    <!-- ... (Kode form lainnya tetap sama seperti yang Anda bagikan sebelumnya) ... -->

    <?php
        include "include/config.php";
        
        if(isset($_POST['edit'])) {
            $hpKODE = $_POST['hpKODE'];
            $hpNAMA = $_POST['hpNAMA'];
            $garansiKODE = $_POST['garansiKODE'];
            $hpTYPE = $_POST['hpTYPE'];
            
            mysqli_query($connection, "UPDATE penjualanhp SET hpNAMA='$hpNAMA', garansiKODE='$garansiKODE', hpType='$hpTYPE' WHERE hpKODE='$hpKODE'");
            header("location:dashboard4.php");
        }

        $kategorihp = mysqli_query($connection, "select * from jenishp");
        
        // Pastikan variabel $kodedestinasi sudah diinisialisasi sebelum digunakan
        $kodedestinasi = isset($_GET["ubah"]) ? $_GET["ubah"] : "";
        $editdestinasi = mysqli_query($connection, "SELECT * FROM penjualanhp WHERE hpKODE ='$kodedestinasi'");
        $rowedit = mysqli_fetch_array($editdestinasi);
    ?>
 
<head>
<title>PENJUALAN</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
</head>
 
<body>
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<div>
<h1 class="display-7">Regis Hanphone</h1>
</div>
</div>
<div class="col-sm-1"></div>
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<form method="POST">
<div class="mb-3 row">
<label for="hpKODE" class="col-sm-2 col-form-label">Kode Handphone</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="hpKODE" name="hpKODE" value="<?php echo $rowedit["hpKODE"]?>">
</div>
</div>
<div class="mb-3 row">
<label for="hpNAMA" class="col-sm-2 col-form-label">Nama Handphone</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="hpNAMA" name="hpNAMA" value="<?php echo $rowedit["hpNAMA"]?>">
</div>
</div>
<div class="mb-3 row">
<label for="garansiKODE" class="col-sm-2 col-form-label">Garansi</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="garansiKODE" name="garansiKODE" value="<?php echo $rowedit["garansiKODE"]?>">
</div>
</div>
<div class="mb-3 row">
<label for="hpTYPE" class="col-sm-2 col-form-label">Type Handphone</label>
<div class="col-sm-10">
<select class="form-control" name="hpTYPE" id="hpTYPE">
<option value="<?php echo $rowedit["hpTYPE"]?>"><?php echo $rowedit
['hpTYPE'] ?></option>
<?php while($row = mysqli_fetch_array($kategorihp)){?>
<option value="<?php echo $row["hpTYPE"]?>">
<?php echo $row["hpTYPE"]?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="form-group row">
<div class="col-sm-2"></div>
<div class="col-sm-10">
<input type="submit" class="btn btn-primary" value="edit" name="edit">
<input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
</div>
</div>
</form>
<form method="POST">
  <div class="form-group row mb-2">
    <label for="search" class="col-sm-3">Nama Handphone</label>
    <div class="col-sm-6">
      <input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Handphone">
    </div>
    <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
  </div>
</form>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div>
            <h1 class="display-7">Data Penjualan</h1>
        </div>
    </div>
    <div class="col-sm-1"></div>
<table class="table table-hover table-dark">
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">Kode Handphone</th>
<th scope="col">Nama Handphone</th>
<th scope="col">Tahun Garansi</th>
<th scope="col">Type Handphone</th>
<th colspan="2" style="tex-align: center">Aksi</th>
</tr>
</thead>
<tbody>
<?php
    if(isset($_POST["kirim"]))
    {
        $search = $_POST['search'];
        $query = mysqli_query($connection, "SELECT penjualanhp.*, jenishp.hpTYPE FROM penjualanhp, jenishp WHERE hpNAMA LIKE '%".$search."%' AND penjualanhp.hpTYPE = jenishp.hpTYPE");
    }   else 
        {
            $query = mysqli_query($connection, "SELECT penjualanhp.*, jenishp.hpTYPE FROM penjualanhp, jenishp WHERE penjualanhp.hpTYPE = jenishp.hpTYPE");
        }
		$nomor = 1;
		while($row = mysqli_fetch_array($query))
		{    
		?>  
<tr>
<td><?php echo $nomor; ?></td>
<td><?php echo $row['hpKODE']; ?></td>
<td><?php echo $row['hpNAMA']; ?></td>
<td><?php echo $row['garansiKODE']; ?></td>
<td><?php echo $row['hpTYPE']; ?></td>
<td width="5px">
    <a href="penjualanedit.php?ubah=<?php echo $row["hpKODE"]?>"
    class="btn btn-success btn-sm" title="edit">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
</td>
<td width="5px">
<a href="penjualanhapus.php?hapus=<?php echo $row["hpKODE"]?>"
    class="btn btn-danger btn-sm" title="hapus">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg>
</td>
</tr>
<?php 
$nomor = $nomor + 1; ?>
<?php } ?>
</tbody>
</table>

</div>
</div> <!--penutup div buat form-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</body>
</html>