<?php
include "include/config.php";

$hotel0137 = $_GET['ubah'];

if(isset($_POST['update']))
{
    $hotelnama = $_POST['hotelnama'];
    $hotelalamat = $_POST['hotelalamat'];
	$kategori0137 = $_POST['kategori0137'];

    mysqli_query($connection, "UPDATE zaki SET hotelnama='$hotelnama', hotelalamat='$hotelalamat', kategori0137='$kategori0137' WHERE hotel0137='$hotel0137'");
}

$result = mysqli_query($connection, "SELECT * FROM zaki WHERE hotel0137 = '$hotel0137'");
$row = mysqli_fetch_array($result);

$hotelnama = $row['hotelNAMA'];
$hotelalamat = $row['hotelALAMAT'];
$kategori0137 = $row['kategori0137'];
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
                    <label for="hotelnama" class="col-sm-2 col-form-label">Nama Hotel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hotelnama" name="hotelnama" value="<?php echo $hotelnama; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="hotelalamat" class="col-sm-2 col-form-label">Hotel Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hotelalamat" name="hotelalamat" value="<?php echo $hotelalamat; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kategori0164" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kategori0137" name="kategori0137" value="<?php echo $kategori0137; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Simpan" name="update">
                        <a href="dashboard2.php" class="btn btn-secondary">continue</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>