<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
{
    $barangKODE = $_GET["hapus"];
    mysqli_query($connection, "delete from pusatoleh where barangKODE = '$barangKODE'");
    echo "<script>alert('DATA BERHASIL DIHAPUS')</script>";
    header("location:dashboard11.php");
}
?>