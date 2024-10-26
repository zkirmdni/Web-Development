<!doctype html>

<?php
include "include/config.php";
    if(isset($_POST['Simpan']))
    {
        $KategoriberitaKODE = $_POST['KategoriberitaKODE'];
        $KategoriberitaNAMA = $_POST['KategoriberitaNAMA'];
        $KategoriberitaKET = $_POST['KategoriberitaKET'];

        mysqli_query($connection, "INSERT INTO kategoriberita VALUE ('$KategoriberitaKODE','$KategoriberitaNAMA', '$KategoriberitaKET')");
        header("Location:helloworld.php?");
    }
?>
<html lang="en">
  <head>
  
    <h1> Entry Data Kategori Berita </h1>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Web Development Kelas C</title>
  </head>
  <body>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">
        <form method="POST">
    <form>
    <div class="form-group row">
    <label for="kategoriberitaKODE" class="col-sm-2 col-form-label">Kode Kategori Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="KategoriberitaKODE" placeholder="Kode Kategori Berita" name ="KategoriberitaKODE">
    </div>
  </div>

  <div class="form-group row">
    <label for="KategoriberitaNAMA" class="col-sm-2 col-form-label">Nama Kategori Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="KategoriberitaNAMA" placeholder="Nama Kategori berita" name ="KategoriberitaNAMA">
    </div>
  </div>

  <div class="form-group row">
    <label for="KategoriberitaKET" class="col-sm-2 col-form-label">Keterangan Kategori Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="KategoriberitaKET" placeholder="Keterangan Kategori berita" name = "KategoriberitaKET">
    </div>
  </div>
  
    <input class="btn btn-primary" type="submit" value="Simpan" name ="Simpan">
    <input class="btn btn-primary" type="reset" value="Reset">
    </div>
    </form>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>