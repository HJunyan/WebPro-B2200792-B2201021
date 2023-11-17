<?php
//WAJIB FAIL INI
require 'sambung.php';
//MULA SESI
session_start();
if (isset($_POST['IDPengguna'])) {
    $idpengguna = $_POST['IDPengguna'];
    $katalaluan = $_POST['KataLaluan'];
    $query = mysqli_query($hubung,
    "SELECT * FROM pengguna WHERE IDPengguna='$idpengguna' AND KataLaluan='$katalaluan'");
    $row = mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query) == 0||$row['KataLaluan']!=$katalaluan)
    {
     echo "<script>alert('Nombor Kad Pengenalan atau Kata Laluan yang salah');
     window.location='login.php'</script>";
    }
    else
    {
    $_SESSION['IDPengguna']=$row['IDPengguna'];
    $_SESSION['Status']=$row['Status'];
    echo "<script>alert('Anda berjaya log masuk!');
    window.location='index2.php'</script>";
    }
}
?>


