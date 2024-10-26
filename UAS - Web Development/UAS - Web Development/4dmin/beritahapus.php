<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
{
    $hotel0164 = $_GET["hapus"];
    mysqli_query($connection, "delete from alhakim where hotel0164 = '$hotel0164'");
    echo "<script>alert('DATA BERHASIL DIHAPUS')</script>";
    header("location:dashboard13.php");
}
?>