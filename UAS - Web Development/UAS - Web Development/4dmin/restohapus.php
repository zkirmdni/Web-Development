<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
{
    $restoMAKAN = $_GET["hapus"];
    mysqli_query($connection, "delete from resto where restoMAKAN = '$restoMAKAN'");
    echo "<script>alert('DATA BERHASIL DIHAPUS')</script>";
    header("location:dashboard6.php");
}
?>