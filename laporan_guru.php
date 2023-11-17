<?php
//MESTI ADA
require 'sambung.php';
require 'keselamatan.php';
//DATA DARI URL
$topik_pilihan = $_GET['idtopik'];
//PANGGIL REKOD
$topik=mysqli_query($hubung, "SELECT * FROM topik WHERE IDTopik=$topik_pilihan");
$infotopik=mysqli_fetch_array($topik);
?>

<html>
<title><?php echo $nama_sistem;?></title>
<body>
    <center>
<table width="800" border="0">
    <tr>
<td width="800">
<table width="800" border="0">
<tr>
<td width="80" align="top">
<img src="<?php echo $logo; ?>" width="85" height="102" hspace="7" align="left" />
</td>
<td>
<h5 style="font-size:18px;"><?php echo $nama_sistem; ?></h5>
</tr>
<tr>
<td colspan="3" valign="top"><hr/></td>
</tr>
</table></td>
</tr>
<tr>
<td><p><strong>LAPORAN PRESTASI PELAJAR BAGI TOPIK:
<?php echo $infotopik['TopikKuiz']; ?></strong></p >
<table width="800" border="1" align="center">
</td>
</tr>
<!-- TAJUK DALAM TABLE-->
<tr>
     <td width="10"><b>Bil.</b></td>
     <td width="550"><b>Nama Pelajar</b></td>
     <td width="90"><b>Bil. Kuiz</b></td>
     <td width="150"><b>Markah Tertinggi</b></td>
</tr>
<?php
$no=1;
//NILAI PEMULA PEMBILANG
//Arahan SQL
$rekod=mysqli_query($hubung, "SELECT IDPengguna, IDTopik, MAX(Markah), COUNT(IDPengguna) as 'Bil' FROM rekod WHERE IDTopik='$topik_pilihan' GROUP BY IDPengguna HAVING MAX(Skor)>=1");
while ($infoRekod=mysqli_fetch_array($rekod))
{
//SAMBUNG TABLE PENGGUNA
$pelajar=mysqli_query($hubung, "SELECT * FROM pengguna WHERE IDPengguna='$infoRekod[IDPengguna]'");
$infoPelajar=mysqli_fetch_array($pelajar);
?>
<!-- masukan nilai kedalam lajur yang di tetapkan-->
<tr style='font-size:16px'>
<td><?php echo $no; ?></td>
<td><?php echo $infoPelajar['Nama']; ?></td>
<td><?php echo $infoRekod['Bil'];; ?></td>
<td><?php echo $infoRekod ['MAX(Markah)'];; ?></td>
</tr>
<?php
$no++;
}
?>
</table>
</center>
<center>
<h5>Jumlah Rekod : <?php echo $no-1; ?></h5><br>
<a href="index2.php "><button class="submit_btn">Laman Utama</button></a> 
<a href="javascript:window.print()"><button class="submit_btn">Cetak Laporan</button></a> 
<a href="logout.php"><button class="submit_btn">Logout</button></a>
</center>
</body>
</html>
