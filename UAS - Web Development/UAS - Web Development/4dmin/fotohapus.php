<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
{
    $fotodestinasiKODE = $_GET["hapus"];
    mysqli_query($connection, "delete from fotodestinasi where fotodestinasiKODE = '$fotodestinasiKODE'");
    echo "<script>alert('FOTO BERHASIL DIHAPUS')</script>";
    header("location:dashboard3.php");
}
?>