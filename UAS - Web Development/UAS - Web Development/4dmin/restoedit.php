<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<?php 
	include "include/config.php";
	if(isset($_POST['Edit']))
	{
		$restoMAKAN = $_POST['restoMAKAN'];
		$restoMINUM = $_POST['restoMINUM'];
		$fotoMENU = $_POST['fotoMENU'];

		$namafile = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

		// PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "png"))
		{
			move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
            mysqli_query($connection, "UPDATE resto SET restoMINUM='$restoMINUM', restoMENU='$namafile', fotoMENU='$fotoMENU' WHERE restoMAKAN='$restoMAKAN'");
			header("location:dashboard6.php");
		}

	}

	$datadestinasi = mysqli_query($connection, "select * from restomenu");
    $kodedestinasi = isset($_GET["ubah"]) ? $_GET["ubah"] : "";
    $editdestinasi = mysqli_query($connection, "SELECT * FROM resto WHERE restoMAKAN ='$kodedestinasi'");
    $rowedit = mysqli_fetch_array($editdestinasi);
?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-8"></h1>
		</div>
	</div>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row mb-3">
			<label for="restoMAKAN" class="col-sm-2 col-form-label">Kode Menu</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="restoMAKAN" name="restoMAKAN" value="<?php echo $rowedit["restoMAKAN"]?>">
			</div>
		</div>

		<div class="form-group row mb-3">
			<label for="restoMINUM" class="col-sm-2 col-form-label">Nama Menu</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="restoMINUM" name="restoMINUM" value="<?php echo $rowedit["restoMINUM"]?>">
			</div>
		</div>

		<div class="form-group row">
        <label for="namadestinasi" class="col-sm-2 col-form-label">Pilihan Menu</label>
        <div class="col-sm-10">
        <select class="form-control" id="namadestinasi" name="fotoMENU">
        <option value="<?php echo $rowedit["fotoMENU"]?>"><?php echo $rowedit
                ['fotoMENU'] ?></option>
                <?php while($row = mysqli_fetch_array($datadestinasi)){?>
                <option value="<?php echo $row["fotoMENU"]?>">
                <?php echo $row["fotoMENU"]?>
            </option>
                <?php } ?>
            </select>
        </div>
        </div>

		<div class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">Photo Wisata</label>
			<div class="col-sm-10">
				<input type="file" id="file" name="file" value="<?php echo $rowedit["namafile"]?>">
			</div>
		</div>

		<div class="form-group row mb-3">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="Edit" class="btn btn-primary" value="Edit">
				<input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
			</div>			
		</div>

        <form method="POST">
  <div class="form-group row mb-2">
    <label for="search" class="col-sm-3">Nama Handphone</label>
    <div class="col-sm-6">
      <input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Handphone">
    </div>
    <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
  </div>
</form>

		
	</form>

</div>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-8">Data Menu</h1>
			</div>
		</div>


	<table class="table table-hover table-danger">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Menu</th>
				<th>Nama Menu</th>
				<th>Pilihan Menu</th>
				<th>Foto Menu</th>
				<th colspan="2" style="text-align: center">Aksi</th>
			</tr>			
		</thead>

		<tbody>
			<?php     if(isset($_POST["kirim"]))
    {
        $search = $_POST['search'];
        $query = mysqli_query($connection, "SELECT resto.*, restomenu.fotoMENU FROM resto, restomenu WHERE restoMINUM LIKE '%".$search."%' AND resto.fotoMENU = restomenu.fotoMENU");
    }   else 
        {
            $query = mysqli_query($connection, "SELECT resto.*, restomenu.fotoMENU FROM resto JOIN restomenu ON resto.fotoMENU = restomenu.fotoMENU");
        }
		$nomor = 1;
		while($row = mysqli_fetch_array($query))    
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['restoMAKAN'];?></td>
					<td><?php echo $row['restoMINUM'];?></td>
                    <td><?php echo $row['fotoMENU'];?></td>
					<td><?php if(is_file("images/".$row['restoMENU']))
						{ ?>
							<img src="images/<?php echo $row['restoMENU']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?></td>

					<td>
						<a href="restoedit.php?ubah=<?php echo $row['restoMAKAN']?>" 
						class="btn btn-success btn-sm" title="EDIT">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
						</a>
					</td>

					<td>
					<a href="restohapus.php?hapus=<?php echo $row["restoMAKAN"]?>"
    class="btn btn-danger btn-sm" title="hapus">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg>
						</a>
						
					</td>

				</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
		</tbody>
		
	</table>
	</div>

	<div class="col-sm-1"></div>

	
</div>


</body>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</html>