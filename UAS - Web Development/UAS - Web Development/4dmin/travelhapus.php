<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
{
    $namaTRAVEL = $_GET["hapus"];
    mysqli_query($connection, "delete from travel where namaTRAVEL = '$namaTRAVEL'");
    echo "<script>alert('DATA BERHASIL DIHAPUS')</script>";
    header("location:dashboard9.php");
}
?>