<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pelanggan Travel</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <?php
    include "include/config.php";

    if (isset($_GET['ubah'])) {
        $nama_pelanggan = $_GET['ubah'];
        $query = mysqli_query($connection, "SELECT * FROM travel WHERE namaTRAVEL = '$nama_pelanggan'");
        $row = mysqli_fetch_array($query);
    }

    if (isset($_POST['Update'])) {
        $namaTRAVEL = $_POST['namaTRAVEL'];
        $tujuanTRAVEL = $_POST['tujuanTRAVEL'];
        $tanggalTRAVEL = $_POST['tanggalTRAVEL'];
        $jenisTRAVEL = $_POST['jenisTRAVEL'];

        mysqli_query($connection, "UPDATE travel SET tujuanTRAVEL = '$tujuanTRAVEL', jenisTRAVEL = '$jenisTRAVEL', tanggalTRAVEL = '$tanggalTRAVEL' WHERE namaTRAVEL = '$namaTRAVEL'");
        header("location: dashboard9.php");
        exit();
    }
    ?>

    <div class="container mt-5">
        <h2>Edit Data Pelanggan Travel</h2>
        <form method="POST" action="">
            <input type="hidden" name="namaTRAVEL" value="<?php echo $row['namaTRAVEL']; ?>">
            <div class="form-group row mb-3">
                <label for="tujuanTRAVEL" class="col-sm-2 col-form-label">Tujuan Travel</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tujuanTRAVEL" name="tujuanTRAVEL" value="<?php echo $row['tujuanTRAVEL']; ?>" placeholder="Masukkan Tujuan Anda Anda">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="tanggalTRAVEL" class="col-sm-2 col-form-label">Tanggal Travel</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggalTRAVEL" name="tanggalTRAVEL" value="<?php echo $row['tanggalTRAVEL']; ?>" required>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="jenisTRAVEL" class="col-sm-2 col-form-label">Jenis Travel</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jenisTRAVEL" name="jenisTRAVEL" value="<?php echo $row['jenisTRAVEL']; ?>" placeholder="Masukkan Jenis Travel Anda">
                </div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <input type="submit" name="Update" class="btn btn-primary" value="Update">
                    <input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
                </div>
            </div>
        </form>
    </div>
    <h2 class="mt-5">Data Travel</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tujuan Wisata</th>
                <th>Tanggal Berangkat</th>
                <th>Jenis Travel</th>
                <th>Foto</th>
                <th colspan="2" style="text-align: center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
		$nomor = 1;
            while ($row = mysqli_fetch_array($query)) {  
                ?>
                <tr>
                    <!-- Kolom data sesuai dengan struktur tabel travel -->
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $row['namaTRAVEL'];?></td>
                    <td><?php echo $row['tujuanTRAVEL'];?></td>
                    <td><?php echo $row['tanggalTRAVEL'];?></td>
                    <td><?php echo $row['jenisTRAVEL'];?></td>
                    <td>
                        <?php if (is_file("images/".$row['fotoTRAVEL'])) { ?>
                            <img src="images/<?php echo $row['fotoTRAVEL'];?>" width="80">
                        <?php } else {
                            echo "<img src='images/noimage.png' width='80'>";
                        }?>
                    </td>
					<td>
						<a href="traveledit.php?ubah=<?php echo $row['namaTRAVEL']?>" 
                        class="btn btn-success btn-sm" title="edit">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
						</a>
					</td>

					<td>
					<a href="travelhapus.php?hapus=<?php echo $row["namaTRAVEL"]?>"
    class="btn btn-danger btn-sm" title="hapus">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg>
						</a>
						
					</td>

				</tr>
                <?php
                $nomor++;
            }        ?>
        </tbody>
    </table>
</div>
<div class="col-sm-1"></div>


</body>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</html>
