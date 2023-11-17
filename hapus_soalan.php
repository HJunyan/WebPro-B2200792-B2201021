<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';

//Dapatkan ID dari URL
$soalan_terpilih = $_GET['idsoalan'];

// Hapus rekod soalan + pilihan
$hapuskan1 = mysqli_query($hubung,"DELETE FROM soalan WHERE Soalan.IDSoalan='$soalan_terpilih'");

//Papar mesej jika berjaya hapus
echo "<script>alert('Hapus soalan berjaya');
window.location='papar_topik.php';</script>";

?>