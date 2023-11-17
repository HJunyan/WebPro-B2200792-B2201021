<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLUKAN FAIL INI
include 'header2.php';

//TOTAL PELAJAR
$countPengguna = mysqli_query($hubung, "SELECT count('IDPengguna') FROM pengguna WHERE Status='Pelajar'");
$nomPengguna = mysqli_fetch_array($countPengguna);
//TOTAL TOPIK
$countTopik = mysqli_query($hubung, "SELECT count('IDTopik') FROM topik");
$nomTopik = mysqli_fetch_array($countTopik);
//TOTAL SOALAN
$countSoalan = mysqli_query($hubung, "SELECT count('IDSoalan') FROM soalan");
$nomSoalan = mysqli_fetch_array($countSoalan);
//TOTAL REKOD
$countRekod = mysqli_query($hubung, "SELECT count('IDRekod') FROM rekod");
$nomRekod = mysqli_fetch_array($countRekod);
//INFO PENGGUNA
$nokp=$_SESSION['IDPengguna'];
$dataA=mysqli_query($hubung,"SELECT * FROM pengguna WHERE IDPengguna='".$nokp."'");
$infoA=mysqli_fetch_array($dataA);
if ($_SESSION['Status']=="Guru")
{
?>

<!-- DASHBOARD GURU -->
<html>
    <head>
    <link rel="stylesheet" href="index2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include "menu.php";?>
    </head>

<body>
<section class="home-section">
      <div class="text">DASHBOARD GURU</div>
      <br>
      <div class="col-div-3">
		<div class="box">
			<p><?php echo $nomPengguna['0'];?><br/><span>Pelajar</span></p>
			<i class="fa fa-users box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $nomRekod['0'];?><br/><span>Rekod</span></p>
			<i class="fa fa-list box-icon"></i>
		</div>
	</div>
    <div class="clearfix"></div>
    <br/><br/>
	<div class="col-div-8">
		<div class="box-8">
		<div class="content-box">
			<p>Soalan Terkini</p>
			<br/>
<?php include 'soalan_terkini.php';?>
		</div>
	</div>
	</div>
	<div class="col-div-4">
		<div class="box-4">
		<div class="content-box">
			<p>Info Pengguna</p>
			<p1>
			Nama: <br><?php echo $infoA['Nama'];?>
			<br><br>
			No Kad Pengenalan: <br><?php echo $infoA['IDPengguna'];?>
			<br><br>
			Jantina: <br><?php echo $infoA['Jantina'];?>
			<br><br>
			Kata Laluan: <br><?php echo $infoA['KataLaluan'];?>
			</p1>
		</div>
	</div>
	<?php include 'footer.php';?>
  </section>
</body>
</html>

<?php
}else{
?>

<!-- DASHBOARD MURID -->
<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index2.css">
    <?php include "menu.php";?>
    </head>

<body>
<section class="home-section">
      <div class="text">Dashboard Pelajar</div>
	  <br>
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $nomSoalan['0'];?><br/><span>Soalan</span></p>
			<i class="fa fa-edit box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $nomRekod['0'];?><br/><span>Rekod</span></p>
			<i class="fa fa-list box-icon"></i>
		</div>
	</div>
	<div class="clearfix"></div>
    <br/><br/>
	<div class="col-div-8">
		<div class="box-8">
		<div class="content-box">
			<p>Soalan Terkini</p>
			<br/>
<?php include 'soalan_terkini.php';?>
		</div>
	</div>
	</div>
	<div class="col-div-4">
		<div class="box-4">
		<div class="content-box">
			<p>Info Pengguna</p>
			<p1>
			Nama: <br><?php echo $infoA['Nama'];?>
			<br><br>
			No Kad Pengenalan: <br><?php echo $infoA['IDPengguna'];?>
			<br><br>
			Jantina: <br><?php echo $infoA['Jantina'];?>
			<br><br>
			Kata Laluan: <br><?php echo $infoA['KataLaluan'];?>
			</p1>
		</div>
	</div>
	<?php include 'footer.php';?>
  </section>
</body>
</html>

<?php    
}
?>