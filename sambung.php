<?php
//SETUP PANGKATAN DATA
//TIDAK PERLU UBAH
$host="localhost";
$idpengguna="root";
//BIARKAN KOSSONG JIKA GUNA XAMPP
$katalaluan="";
//NAMA P.DATA-BOLEH UBAH
$database="quiz";
////////////////////////
$hubung=mysqli_connect($host, $idpengguna, $katalaluan, $database);
if (mysqli_connect_errno()) {
    echo "Proses sambung ke pangkalan data gagal";
    exit();
}
///////////////////////
//PENETAPAN SISTEM ANDA
$lencana="pths.png";
$subjek="SEJARAH TINGKATAN 4";
$nama_sekolah="SMJK PHOR TAY<BR>
               731,JALAN SUNGAI DUA,<BR>
               11700 GELUGOR,<BR>
               PENANG.";
$nama_sistem="APLIKASI PENILAIAN SEJARAH TINGKATAN 4";
$motto_sistem="FORMAT:SOALAN MCQ/TF";
$footer="Sistem Pembelajaran Sejarah Kuiz";
$logo="logo.png";
?>
    