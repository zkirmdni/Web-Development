<!DOCTYPE html>
<html lang="en">
<head>
<?php
  include "include/config.php";

  $kategori = mysqli_query($connection, "select * from kategoriwisata");

  $destinasi = mysqli_query($connection, "select * from destinasi");

  $restoran_result = mysqli_query($connection, "SELECT * FROM resto");

  $restoranData = mysqli_fetch_all ($restoran_result, MYSQLI_ASSOC);

  $travel_result = mysqli_query($connection, "SELECT * FROM travel");

  $travelData = mysqli_fetch_all ($travel_result, MYSQLI_ASSOC);

  $hotel = mysqli_query($connection, "SELECT * FROM zaki");

  $restoran = mysqli_query($connection, "SELECT * FROM resto");
?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Berita Wisata</title>
  <!-- Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="beritawisata.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand ml-3" href="#">Berita Wisata.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ml-auto" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              if(mysqli_num_rows($kategori)>0)
              {
                while ($row=mysqli_fetch_array($kategori))
                {?> <a class="dropdown-item"href="">
                  <?php echo $row ["kategoriNAMA"];?></a>
                  <?php }
              }
            ?>
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
      </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownDestinasi" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Destinasi
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              if(mysqli_num_rows($destinasi)>0)
              {
                while ($row=mysqli_fetch_array($destinasi))
                {?> <a class="dropdown-item"href="">
                  <?php echo $row ["destinasiNAMA"];?></a>
                  <?php }
              }
            ?>
          </ul>
      </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="hotel.php" id="navbarDropdownHotel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hotel
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              if(mysqli_num_rows($hotel)>0)
              {
                while ($row=mysqli_fetch_array($hotel))
                {?> <a class="dropdown-item"href="">
                  <?php echo $row ["hotelNAMA"];?></a>
                  <?php }
              }
            ?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownRestoran" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Restoran
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              if(mysqli_num_rows($restoran)>0)
              {
                while ($row=mysqli_fetch_array($restoran))
                {?> <a class="dropdown-item"href="">
                  <?php echo $row ["restoMINUM"];?></a>
                  <?php }
              }
            ?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownOlehOleh" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pusat Oleh-Oleh
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownOlehOleh">
            <a class="dropdown-item" href="#">Menu 1</a>
            <a class="dropdown-item" href="#">Menu 2</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Menu Lain</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTravel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Travel
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownTravel">
            <a class="dropdown-item" href="#">Menu 1</a>
            <a class="dropdown-item" href="#">Menu 2</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Menu Lain</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBerita" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Berita
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownBerita">
            <a class="dropdown-item" href="#">Menu 1</a>
            <a class="dropdown-item" href="#">Menu 2</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Menu Lain</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  </div>

  <!-- SlideShow -->
  <div id="carouselExample" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <!-- SlideShow 1-->
      <div class="carousel-item active">
        <img src="images/pexels-pixabay-260922.jpg" class="d-block" style="width: 89%; margin: 0 auto;" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>KATEGORI WISATA.</h5>
          <p>Ingin berliburan bersama keluarga tercinta anda? silahkan simak halaman web ini ya.</p>
        </div>
      </div>
      <!-- SlideShow 2 -->
      <div class="carousel-item">
        <img src="images/pexels-boonkong-boonpeng-1134176.jpg" class="d-block" style="width: 89%; margin: 0 auto;" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>BEST HOTEL</h5>
          <p>Ingin mencari penginapan terbaik anda bersama keluarga? Temukan semuanya disini</p>
        </div>
      </div>
      <!-- SlideSHow 3 -->
      <div class="carousel-item">
        <img src="images/pexels-tobias-bjørkli-2104152.jpg" class="d-block" style="width: 89%; margin: 0 auto;" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>TRAVEL</h5>
          <p>Wujudkan pengalaman anda menuju tujuan dengan travel terbaik kami.</p>
        </div>
      </div>
    </div>
    <!-- Tombol Navigasi -->
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="juduldestinasi text-center" style="font-family: 'Poppins', sans-serif; font-weight: 600;">
  <h5>Restoran</h5>
</div>
  <div class="border border-2" style="border-radius: 7px; padding: 20px 45px 10px 33px;"> 
  <div class="row mx-auto justify-content-center">
    <?php foreach ($restoranData as $item): ?>
      <div class="border border-2" style="border-radius: 7px; max-width: 225px; max-height: 350px; margin: 35px;">
        <img style="max-width: 100%; height: auto; margin-top: 10px" src="images/<?php echo $item['restoMENU']; ?>" class="card-img-top" alt="Card Image"> 
        <div class="card-body"> 
          <h5 class="card-title" style="font-size: 1.4rem;"> <!-- Tambahkan properti font-size di sini -->
            <b><?php echo $item['restoMINUM']; ?></b>
          </h5>
          <p class="card-text">Keterangan: <?php echo substr($item['fotoMENU'], 0, 60); ?>...</p> 
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="juduldestinasi text-center" style="font-family: 'Poppins', sans-serif; font-weight: 600;">
  <h5>Travel</h5>
</div>
<div class="border border-2" style="border-radius: 7px; padding: 20px 45px 10px 33px;"> 
  <div class="row mx-auto justify-content-center">
    <?php foreach ($travelData as $item): ?>
      <div class="border border-2" style="border-radius: 7px; max-width: 225px; max-height: 350px; margin: 35px;">
        <img style="max-width: 100%; height: auto; margin-top: 10px" src="images/<?php echo $item['fotoTRAVEL']; ?>" class="card-img-top" alt="Card Image"> 
        <div class="card-body"> 
          <h5 class="card-title" style="font-size: 1.4rem;"> <!-- Tambahkan properti font-size di sini -->
            <b><?php echo $item['namaTRAVEL']; ?></b>
          </h5>
          <p class="card-text">Tujuan: <?php echo substr($item['tanggalTRAVEL'], 0, 60); ?>...</p> 
          <p class="card-text">Harga: <?php echo substr($item['jenisTRAVEL'], 0, 60); ?>...</p> 
          <a href="indextravel.php" class="btn btn-primary">Booking</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
  
<!-- CARD -->
<div class="pembungkus-card">
<div class="col-sm-4"> <!-- Gunakan col-sm-4 -->
<ol class="list-group list-group-numbered mx-auto">
  <li class="list-group-item"><a href="http://localhost/UASWebDev/4dmin/dashboard6.php">Destinasi</a></li>
  <li class="list-group-item"><a href="http://localhost/UASWebDev/4dmin/dashboard2.php">Hotel</a></li>
  <li class="list-group-item"><a href="http://localhost/UASWebDev/4dmin/dashboard6.php">Restoran</a></li>
  <li class="list-group-item"><a href="http://localhost/UASWebDev/4dmin/dashboard11.php">Pusat Oleh-Oleh</a></li>
  <li class="list-group-item"><a href="http://localhost/UASWebDev/4dmin/dashboard9.php">Travel</a></li>
  <li class="list-group-item"><a href="http://localhost/UASWebDev/4dmin/dashboard8.php">Berita</a></li>
  <li class="list-group-item"><a href="http://localhost/UASWebDev/4dmin/dashboard3.php">Foto Destinasi</a></li>
</ol>
      </div>
<div class="card-deck mt-4">
    <!-- Baris 1 -->
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="images/pexels-andrei-tanase-1271619.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">DESTINASI WISATA</h5>
            <p class="card-text">Ayo,Mari tentukan destinasi wisata anda bareng keluarga saat ini juga impikan wisata terbaik dan terbagus di dunia.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="images/pexels-pixabay-271624.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">HOTEL</h5>
            <p class="card-text">Mari cari penginapan terbaik kelas dunia anda untuk pengalaman menginap bersama keluarga tercinta semakin seru dan menyenangkan.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 1 mins ago</small>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="images/pexels-tuur-tisseghem-2954405.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">PUSAT OLEH-OLEH</h5>
            <p class="card-text">Temukan tempat berbelanja anda yang paling terbaik yang pernah anda temukan hanya disini!.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Baris 2 -->
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="images/pexels-pixabay-260922.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">RESTORAN</h5>
            <p class="card-text">Dapatkan hidangan paling enak dan terbaik didunia dengan koki dan kru masak yang handal dan terbaik.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 8 mins ago</small>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="images/pexels-nandhu-kumar-450441.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">TRAVEL</h5>
            <p class="card-text">Temukan pengalaman keberangkatan anda yang paling seru dan terbaik bersama kami disini .</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="images/bg-05.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">BERITA</h5>
            <p class="card-text">Info dan Berita Layanan Kami.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
    </div>

 
        </div>
      </div>
    </div>
  </div>
  </div>




  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
<!-- Footer -->
<footer class="bg-light text-center text-lg-start mt-5">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Instagram -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" href="#" role="button">
        <i class="fab fa-instagram"></i>
      </a>

      <!-- Facebook -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="#" role="button">
        <i class="fab fa-facebook"></i>
      </a>

      <!-- Twitter -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="#" role="button">
        <i class="fab fa-twitter"></i>
      </a>
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links -->
    <section class="">
      <div class="row">
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">About Us</h5>

          <p>
            Website ini dibuat untuk membantu customer untuk mencari pengalaman liburan terbaik mereka bersama keluarga tercinta.
          </p>
        </div>

        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Quick Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#" class="text-dark">Home</a>
            </li>
            <li>
              <a href="#" class="text-dark">About</a>
            </li>
            <li>
              <a href="#" class="text-dark">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Bottom Bar -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Zaki Website.
  </div>
</footer>
<!-- Footer -->

</html>