<?php
include "include/config.php";

$hotel0164 = $_GET['ubah'];

if(isset($_POST['update']))
{
    $hotelnama = $_POST['hotelnama'];
    $hotelalamat = $_POST['hotelalamat'];
	$kategori0164 = $_POST['kategori0164'];

    mysqli_query($connection, "UPDATE alhakim SET hotelnama='$hotelnama', hotelalamat='$hotelalamat', kategori0164='$kategori0164' WHERE hotel0164='$hotel0164'");
}

$result = mysqli_query($connection, "SELECT * FROM alhakim WHERE hotel0164='$hotel0164'");
$row = mysqli_fetch_array($result);

$hotelnama = $row['hotelNAMA'];
$hotelalamat = $row['hotelALAMAT'];
$kategori0164 = $row['kategori0164'];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <form method="POST">
                <div class="mb-3 row">
                    <label for="hotelnama" class="col-sm-2 col-form-label">Tentang Kejadian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hotelnama" name="hotelnama" value="<?php echo $hotelnama; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="hotelalamat" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hotelalamat" name="hotelalamat" value="<?php echo $hotelalamat; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kategori0164" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kategori0164" name="kategori0164" value="<?php echo $kategori0164; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Simpan" name="update">
                        <a href="dashboard13.php" class="btn btn-secondary">continue</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>