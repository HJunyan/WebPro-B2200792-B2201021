<?php
require 'sambung.php';
require 'keselamatan.php';
$idpengguna=$_SESSION['IDPengguna'];
?>

<html>
    <head>
    <link rel="stylesheet" href="skor_individu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include "menu.php";?>
    </head>
    <body>  
        <style>
            table {
	border-collapse: collapse;
	box-shadow: 0 5px 10px #f9fbff;
	background-color: white;
	text-align: left;
    border: 1px solid black;
	overflow: hidden;
  }

	thead {
	  box-shadow: 0 5px 10px #f9fbff;
      border: 1px solid black;
	}
  
	th {
	  padding: 1rem 2rem;
	  text-transform: uppercase;
	  letter-spacing: 0.1rem;
	  font-size: 1rem;
	  font-weight: 900;

	}
  
	td {
	  padding: 1rem 2rem;
	}

    .status {
    border-radius:  0.2rem;
    padding: 0.2rem 1rem;
    text-align: center;
  }
  .status-answer {
      background-color: #c8e6c9;
      color: #388e3c;
    }
        </style>          
    <section class="home-section">
      <div class="text">REKOD MARKAH YANG DICAPAI</div>
      <ul style="float:right;"><?php include 'utility.php';?></ul>
      
        <main>
            <center>
        <table>
    <thead>
      <tr>
        <th>Bil.</th>
        <th>IDTopik</th>
        <th>Topik</th>
        <th>Tarikh</th>
        <th>Tempoh Masa</th>
        <th>Skor</th>
        <th>Markah</th>
        <th>Gred</th>
      </tr>
    </thead>

            <?php
$no=1;
$data1=mysqli_query($hubung, "SELECT * FROM rekod WHERE IDPengguna= '$idpengguna' ORDER BY Tarikh DESC limit 0,10");
while ($info1=mysqli_fetch_array($data1))
{
//TABLE TOPIK
$dataTopik=mysqli_query($hubung, "SELECT * FROM topik WHERE IDTopik=$info1[IDTopik]");
$getTopik=mysqli_fetch_array($dataTopik);
//TABLE SOALAN
$datasoalan=mysqli_query($hubung, "SELECT COUNT(IDTopik) as 'bil' FROM soalan WHERE IDTopik=$info1[IDTopik] group by IDTopik");
$getBilSoalan=mysqli_fetch_array($datasoalan);
//LETAK VALUE PADA VARIABLE
$bilSoalan=$getBilSoalan['bil'];
$markah_Topik=$info1['Markah'];

?>
<tbody>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['IDTopik']; ?></td>
<td><?php echo $getTopik['TopikKuiz']; ?></td>
<td><?php echo date('d/m/Y', strtotime($info1['Tarikh'])); ?></td>
<td><?php echo date('h:ia', strtotime($info1['TempohMasa'])); ?></td>
<td><?php echo $info1['Skor']; ?></td>
<td><p class="status status-answer"><?php echo $markah_Topik; ?></p></td>
<td><?php echo $info1['Gred']; ?></td>
</tr>
<?php $no++; } ?>
            </table>
</center>
        </main>

        <center><font style='font-size:14px'>
            * Rekod yang dipaparkan adalah 10 yang terakhir *
            <br>Jumlah Rekod:<?php echo $no-1; ?></font>
        </center>
            </section>
    </body>
</html>