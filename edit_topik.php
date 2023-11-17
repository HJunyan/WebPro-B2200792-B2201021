<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLU FAIL INI
include 'header2.php';
?>
<?php
if (isset($_POST['update'])){
$idtopik = $_POST['idtopik'];
$topikBaru=$_POST['paparan_topik'];

//KEMASKINI DENGAN REKOD BARU
$result = mysqli_query($hubung, "UPDATE topik SET TopikKuiz='$topikBaru' WHERE IDTopik=$idtopik");
//papar mesej jika rekod berjaya dikemaskini
echo "<script>
alert('Kemaskini rekod telah berjaya'); 
window.location='papar_topik.php' 
</script>";
}
?>

<?php
//DAPATKAN ID SAOALN
$topikEdit = $_GET['idtopik'];
//PILIH DATA BERDASARKAN PADA ID REKOD
$pilihTopik=mysqli_query($hubung,"SELECT * FROM topik WHERE IDTopik=$topikEdit");
while($dataTopik=mysqli_fetch_array($pilihTopik))
{
//Paparkan nilai asal
$idTOPIK = $topikEdit;
$editTOPIK = $dataTopik['TopikKuiz'];
}
?>

<html>
<head>
    <link rel="stylesheet" href="edit_topik.css">
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

.topic_button2 {
  -webkit-appearance: none;
  background: #F5AB4E;
  border: 2px solid #BF8439 ;
  border-radius: 4px;
  outline: none;
  padding: 0.3em 0.8em;
  margin-right: 15px;
  color: #ffffff;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
}

.topic_button2:hover {
  background: #BF8439 ;
}
    </style>
  <section class="home-section">
      <div class="text">KEMASKINI TOPIK</div>

      <center>
		<main>
<table width="70%" border="0" align="center"
style='font-size:18px'>
	<tr>
	  <td>
<form method="post" action="edit_topik.php">
<p>
<label>Topik :</label>
<br>
<input type="text" name="paparan_topik" size="60%" value="<?php echo $editTOPIK; ?>" />
</p>
<br>
<div class="topic">
<p>
<input type="hidden" name='idtopik'value="<?php echo $idTOPIK; ?>" />
<input type="submit" name="update" value="Kemaskini" class="topic_button2" />
<input type="button" value="Batal" onclick="history.back()" class="topic_button2"/>
</p>
</div>

</form>
</td>
</tr>
</table>
</main>
</section>
<?php include 'footer.php';?>
</body>
</html>