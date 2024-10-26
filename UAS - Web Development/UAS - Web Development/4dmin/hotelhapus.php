<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
{
    $hotel0164 = $_GET["hapus"];
    mysqli_query($connection, "delete from zaki where hotel0137 = '$hotel0137'");
    echo "<script>alert('DATA BERHASIL DIHAPUS')</script>";
    header("location:dashboard2.php");
}
?>