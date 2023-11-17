<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//Dapatkan ID dari URL
$pelajar_hapus = $_GET['idpengguna'];
//Hapus rekod pengguna semasa
$hapuskan1 = mysqli_query($hubung,"DELETE FROM rekod WHERE IDPengguna='$pelajar_hapus'");
//Hapus rekod perekodan semasa
$hapuskan2 = mysqli_query($hubung,"DELETE FROM pengguna WHERE IDPengguna='$pelajar_hapus'");
//Papar mesej jika berjaya hapus
echo "<script>alert('Hapus pelajar berjaya');
window.location='senarai_pelajar.php' </script>";
?>