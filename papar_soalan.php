<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLU FAIL INI
include 'header2.php';
//DAPATKAN ID TOPIK
$topik_pilihan = $_GET['idtopik'];
$_SESSION['pilihan'] = $topik_pilihan;
$result = mysqli_query($hubung, "SELECT * FROM topik WHERE IDTopik='$topik_pilihan'");
while($res = mysqli_fetch_array($result))
{
//Paparkan nilai asal
$papartopik = $res['TopikKuiz'];
}
?>

<html>
    <head>
    <link rel="stylesheet" href="papar_soalan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include "menu.php";?>
    </head>

    <body>
    <style>
  .content-table {
	border-collapse: collapse;
	margin: 25px 0;
  text-align: center;
	font-size: 0.9em;
	width: 100%;
	border-radius: 5px 5px 0 0;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
  }
  
  .content-table thead tr {
	background-color: #272c4a;
	color: #ffffff;
	text-align: left;
	font-weight: bold;
  text-align: center;
  }
  
  .content-table th,
  .content-table td {
	padding: 12px 15px;
  }
  
  .content-table tbody tr {
	border-bottom: 1px solid #dddddd;
  }
  
  .content-table tbody tr:nth-of-type(even) {
	background-color: #f3f3f3;
  }
  
  .content-table tbody tr:last-of-type {
	border-bottom: 2px solid #272c4a;
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
  padding: 0.4rem 0.8rem;
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
      <div class="text">SENARAI SOALAN BAGI TOPIK: <?php echo $papartopik;?></div>

    <main>
      <center>
<table class="content-table">
<thead>
<tr>
<th>Bil.</th>
<th width="60%">Soalan</th>
<th>Jawaban</th>
<th>Tindakan</th>
</tr>
</thead>

    <?php $no=1;
$data1=mysqli_query($hubung, "SELECT * FROM soalan AS a INNER JOIN jawaban AS c ON c.IDSoalan =a.IDSoalan WHERE a.IDTopik='$topik_pilihan' AND c.JawabanTepat=1 GROUP BY a.IDSoalan ORDER BY a.IDSoalan ASC");
while ($info1=mysqli_fetch_array($data1))
{
?>

<tbody>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['SoalanKuiz']; ?></td>
<td><p class="status status-answer"><?php echo $info1['PilihanJawaban'];?></p></td>
<td>
<div class="form_wrap">
<a href="edit_soalan.php?idsoalan=<?php echo $info1['IDSoalan']; ?>"><button class="topic_button">Edit</button></a>
<a href="hapus_soalan.php?idsoalan=<?php echo $info1['IDSoalan']; ?>"><button class="topic_button">Hapus</button></a>
  </td>
</tr>
</tbody>

    <?php $no++; } ?>
  </table>
</center>
      </main>
    <center>
<font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?>
</font></center>
</body>
</html>