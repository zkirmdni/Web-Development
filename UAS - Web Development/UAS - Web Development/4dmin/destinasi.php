<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <?php
        include "include/config.php";
        if(isset($_POST["Simpan"])) {
            $destinasiKODE = $_POST['kodedestinasi'];
            $destinasiNAMA = $_POST['namadestinasi'];
            $kategoriKODE = $_POST['kategorikode'];

            mysqli_query($connection, "INSERT INTO destinasi (destinasiKODE, destinasiNAMA, kategoriKODE) VALUES ('$destinasiKODE', '$destinasiNAMA', '$kategoriKODE')");
            header ("location:destinasi.php");
        }
        ?>

        <form method="POST">
            <div class="mb-3 row">
                <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kodedestinasi" name="kodedestinasi" placeholder="Kode Destinasi">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namadestinasi" name="namadestinasi" placeholder="Nama Destinasi">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="kodekategori" class="col-sm-2 col-form-label">Kode Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kodekategori" name="kategorikode" placeholder="Kode Kategori">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-7">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                    <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
                </div>
            </div>
        </form>

        <div class="jumbotron mt-5">
            <h1 class="display-5">Hasil entri data destinasi wisata</h1>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Kode Destinasi</th>
                <th scope="col">Nama Destinasi</th>
                <th scope="col">Kode Kategori</th>
            </tr>
            </thead>
            <tbody>

            <?php
if(isset($_POST["kirim"]))
{
    $search = $_POST['search'];
    $query = mysqli_query($connection,"select destinasi.*from destinasi
        where destinasiNAMA like '%".$search."%'");
}else
{
    $query = mysqli_query($connection, "select destinasi.* from destinasi");
}
            $nomor = 1;

            while ($row = mysqli_fetch_array($query)) {
                ?>

                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $row['destinasiKODE']; ?></td>
                    <td><?php echo $row['destinasiNAMA']; ?></td>
                    <td><?php echo $row['kategoriKODE']; ?></td>
                </tr>
                <?php $nomor = $nomor + 1;
            } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>