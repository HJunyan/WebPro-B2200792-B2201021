<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLU FAIL INI
include 'header2.php';
?>

<html>
    <head>
    <link rel="stylesheet" href="prestasi_topik.css">
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

  .prestasi {
  display: inline-flex;
  align-items: center;
  font-size: 15px;
}

.prestasi_input {
  display: none;
}

.prestasi_button {
  -webkit-appearance: none;
  background: #3B5AEA ;
  border: 2px solid #263B9A ;
  border-radius: 4px;
  outline: none;
  padding: 0.3em 0.8em;
  color: #ffffff;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
}

.prestasi_button:hover {
  background: #263B9A ;
}
    </style>
    <section class="home-section">
      <div class="text">PRESTASI PELAJAR BERDASARKAN TOPIK</div>

        <main>
          <center>
<table class="content-table">
  <thead>
    <tr>
<th>Bil.</th>
<th>Topik</th>
<th>Bil. Menjawab</th>
<th>Laporan Lengkap</th>
   </tr>
</thead>

<?php
$no=1;
$topik=mysqli_query($hubung,"SELECT * FROM topik");
    while ($infoTopik=mysqli_fetch_array($topik))
        {
$rekod=mysqli_query($hubung,"SELECT IDTopik, COUNT(IDTopik) as 'bil' FROM rekod
WHERE IDTopik='$infoTopik[IDTopik]'");
$infoJawab=mysqli_fetch_array($rekod);
?>
<tbody>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $infoTopik['TopikKuiz']; ?></td>
        <td><?php echo $infoJawab['bil']; ?></td>
        <div class="prestasi">
        <td><a href="laporan_guru.php?idtopik=<?php echo $infoTopik['IDTopik'];?>"><button class="prestasi_button">Papar</button></a>
        </div>
      </td>
    </tr>
</tbody>
<?php $no++; } ?>
            </table>
        </main>
        </center>
<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Rekod: <?php echo $no-1; ?>
    </font>
        </center>
        <?php include 'footer.php';?>
        </section>
    </body>
</html>
