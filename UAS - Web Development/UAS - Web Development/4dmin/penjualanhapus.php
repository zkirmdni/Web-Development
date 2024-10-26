<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
{
    $hpKODE = $_GET["hapus"];
    mysqli_query($connection, "delete from penjualanhp where hpKODE = '$hpKODE'");
    echo "<script>alert('data BERHASIL DIHAPUS')</script>";
    header("location:dashboard4.php");
}
?>