<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLU FAIL INI
include 'header2.php';
?>
<?php
//DAPATKAN ID SOALAN
$soalan_terpilih = $_GET['idsoalan'];
//PILIH DATA BERDASARKAN PADA ID REKOD
$pilihSoalan = mysqli_query($hubung, "SELECT * FROM soalan WHERE IDSoalan='$soalan_terpilih'");
while($dataSoalan = mysqli_fetch_array($pilihSoalan))
{

//Paparkan nilai asal
$nom_soalan = $dataSoalan['NoSoalan'];
$soalan= $dataSoalan['SoalanKuiz'];
}

?>
<html>
<head>
    <link rel="stylesheet" href="edit_soalan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include "menu.php";?>
    </head>
	
	<body>
    <style>
      .topic {
  display: inline-flex;
  align-items: center;
  font-size: 15px;
}
.topic_input {
  display: none;
}

.topic_button {
  -webkit-appearance: none;
  background: #F4CC2B;
  border: 2px solid #a68b00;
  border-radius: 4px;
  outline: none;
  padding: 0.3em 0.8em;
  margin-right: 15px;
  color: #ffffff;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
}

.topic_button:hover {
  background: #a68b00;
}
    </style>
    <section class="home-section">
      <div class="text">KEMASKINI SOALAN</div>

    <center>
	<main>
<table>
	<tr>
		<td>
<form action="save_edit_soalan.php" method="POST"
enctype="multipart/form-data">
<p>
<label>Soalan ke - <a style="color:red"><?php echo $nom_soalan; ?></a></label>
<input type="text" name="idsoalan" value="<?php echo $soalan_terpilih; ?>" readonly hidden>
    </p>
<p>
<label>Soalan</label>
<br>
<textarea id="paparan_soalan" name="paparan_soalan" rows="5" cols="105" autofocus> <?php echo $soalan; ?></textarea>
    </div>
</p >

<?php
$no=1;
$pilihan = mysqli_query($hubung, "SELECT * FROM jawaban AS a INNER JOIN soalan AS q ON q.IDSoalan = a.IDSoalan WHERE q.IDSoalan=$soalan_terpilih");
while($dataPilihan = mysqli_fetch_array($pilihan))
{
?>
 <div class="form_wrap">
        <div class="input_wrap">
<p>
Pilihan <?php echo $no; ?> :
<?php echo $dataPilihan ['PilihanJawaban']; ?>
</p>
<p style="color:green;">
<?php
if($dataPilihan['JawabanTepat'] ==1){
echo "Jawaban : ";
echo $dataPilihan['PilihanJawaban'];
}
?>
</p>
<?php $no++; } ?>
<br>
<p>
<input type="submit" name="submit" value="Kemaskini" class="topic_button"/>
<input type="button" value="Batal" class="topic_button" onclick="history.back()"/>
</p>
</form></td></tr>
</table>
</main>
</center>
<?php include 'footer.php';?>
  </body>
</html>