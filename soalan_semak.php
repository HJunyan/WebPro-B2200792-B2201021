<?php
//MESTI ADA
require 'sambung.php';
//DAPATKAN ID SUBJEK
session_start();
$topik_pilihan=$_SESSION['pilih_topik'];
?>

<?php

//APABILA PILIHAN JAWAPAN DIHANTAR
if($_POST) {
$idquestion = $_POST['idsoalan'];
$number = $_POST['number'];
$selected_choice = $_POST['choice'];
$next=$number+1;
$total=0;
//DAPATKAN JUMLAH SOALAN TOPIKAL
$query="SELECT * FROM soalan where IDTopik=$topik_pilihan";
$results = mysqli_query($hubung, $query);
$total=mysqli_num_rows($results);
//JIKA JAWAPAN BETUL
$q = "SELECT * FROM jawaban WHERE JawabanTepat=1 AND IDSoalan=$idquestion";
$result = mysqli_query($hubung, $q);
$row = mysqli_fetch_assoc($result);
$correct_choice=$row['IDJawaban'];
//BANDINGKAN PILIHAN JAWAPAN DGN JAWAPAN SEBENAR

if($correct_choice == $selected_choice) {
$semakan="TEPAT" ;
$_SESSION['score']++;
}

if ($number == $total){
header("Location: soalan_markah.php?total=".$total);
exit();
} else {
header("Location: soalan_papar.php?semakan=".$semakan."&idtopik=".$topik_pilihan."&n=".$next."&score=".$_SESSION['score']);
}
}
?>