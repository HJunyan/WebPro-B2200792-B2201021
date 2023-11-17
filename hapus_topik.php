<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//ID dari URL
$topik_terpilih = $_GET['idtopik'];
//LAKSANA DELETE
$result = mysqli_query($hubung,"DELETE FROM topik WHERE
IDTopik='$topik_terpilih'");
$result1 = mysqli_query($hubung, "DELETE FROM soalan WHERE
IDTopik='$topik_terpilih'");
$result2 = mysqli_query($hubung,"DELETE FROM jawaban WHERE
IDTopik='$topik_terpilih'");
$result2 = mysqli_query($hubung,"DELETE FROM rekod
WHERE IDTopik='$topik_terpilih'");
//MESEJ POP UP
echo "<script>alert('Hapus topik berjaya');
window.location='papar_topik.php' </script>";
?>