<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLU FAIL INI
include 'header2.php';
?>
<html>
    <head>
    <link rel="stylesheet" href="papar_topik.css">
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
	min-width: 400px;
	border-radius: 5px 5px 0 0;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
  }
  
  .content-table thead tr {
	background-color: #272c4a;
	color: #ffffff;
	text-align: left;
	font-weight: bold;
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

  .add_btn{
	  display: inline-block;
	  padding: 10px 25px;
	  text-decoration: none;
	  color: #222;
	  font-size: 18px;
	  position: relative;
	  z-index: 9;
  }
  .add_btn:before{
	  content: "";
	  position: absolute;
	  top: 0;
	  left: 0;
	  height: 100%;
	  width: 60px;
	  background-color: #fab1a0;
	  border-radius: 50px;
	  z-index: -1;
	  transition: .3s linear;
  }
  .add_btn:hover:before{
	  width: 100%;
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
  padding: 0.3em 0.8em;
  margin-right: 15px;
  color: #ffffff;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
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

.topic_button:hover {
  background: #a68b00;
}

.topic_button2:hover {
  background: #BF8439 ;
}
  
            </style>
    <section class="home-section">
      <div class="text">SENARAI TOPIK SUBJEK: <?php echo $subjek;?></div>

<main>
<center>
<tr><td colspan="4" valign="middle" align="right"><b>
<a href="tambah_topik.php" class="add_btn">Tambah Topik Baru <i class='bx bxs-edit-alt'></i></a></b></td>
</tr>

<table class="content-table">
<thead>
<tr>
<th>Bil.</th>
<th>Topik</th>
<th>Pengurusan Soalan</th>
<th>Pengurusan Topik</th>
</tr>
</thead>

<?php
    $no=1;
    $data1=mysqli_query($hubung,"SELECT * FROM topik");
    while ($info1=mysqli_fetch_array($data1))
            {
            ?>
<tbody>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['TopikKuiz']; ?></td>

<div class="topic">
<td>    
     <a href="tambah_soalan.php?idtopik=<?php echo $info1['IDTopik'];?>"><button class="topic_button">Tambah</button></a>
     <a href="papar_soalan.php?idtopik=<?php echo $info1['IDTopik'];?>"><button class="topic_button">Papar</button></a>
</td>
<td>
     <a href="edit_topik.php?idtopik=<?php echo $info1['IDTopik'];?>"><button class="topic_button2">Edit</button></a>
     <a href="hapus_topik.php?idtopik=<?php echo $info1['IDTopik'];?>"><button class="topic_button2">Hapus</button></a>
</td>
</div>
</tr>
</tbody>
  <?php $no++; } ?>
</table>
            </center>
        </main>
        <br><center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?>
</font></center>
        <?php include 'footer.php';?>
            </section>
    </body>
</html>