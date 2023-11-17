<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLU FAIL INI
include 'header2.php';
?>

<html>
    <head>
    <link rel="stylesheet" href="senarai_pelajar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
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

    .senarai {
  display: inline-flex;
  align-items: center;
  font-size: 15px;
}

.senarai_input {
  display: none;
}

.senarai_button {
  -webkit-appearance: none;
  background: #B2BABB;
  border: 2px solid #909497;
  border-radius: 4px;
  outline: none;
  padding: 0em 0.8em;
  margin-right: 15px;
  color: #ffffff;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
}

.senarai_button2 {
  -webkit-appearance: none;
  background: #FFFFFF;
  border: 2px solid #000000;
  border-radius: 4px;
  outline: none;
  padding: 0.3em 0.8em;
  margin-right: 15px;
  color: #000000 ;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
}

.senarai_button:hover {
  background: #909497;
}

.senarai_button2:hover {
  background: #000000 ;
  color: #FFFFFF;
}
  
        </style>

    <section class="home-section">
      <div class="text">SENARAI PELAJAR BERDAFTAR</div>

        <main>
            <center>
        <form method='POST'>
        <select name='searchname'>
    <option>-- PILIH NAMA PELAJAR --</option>
    <?php $choose = mysqli_query($hubung, "SELECT * FROM pengguna WHERE Status='Pelajar' ORDER BY Nama ASC");
    while ($choosePengguna = mysqli_fetch_array($choose)){
        echo "<option name='searchname'" . $choosePengguna['IDPengguna'] . "'>" . $choosePengguna['Nama'] . "</option>";
    }
    ?>
    </select>
    <div class="senarai">
    <input type='submit' name='submit' value='search' class="senarai_button"/>
    </div>
    </form>
<br>

<table>
    <thead>
      <tr>
        <th>Bil.</th>
        <th>ID Pelajar</th>
        <th>Nama Pelajar</th>
        <th>Jantina</th>
        <th>Katalaluan</th>
        <th>Tindakan</th>
      </tr>
    </thead>

    <?php
if(isset($_POST['submit'])){
    $no = 1;
    $namaPengguna = $_POST['searchname'];
    $search = mysqli_query($hubung, "SELECT * FROM pengguna WHERE Nama='$namaPengguna'");
    while ($infoSearch = mysqli_fetch_array($search)) { ?>
    <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $infoSearch['IDPengguna']; ?></td>
    <td><?php echo $infoSearch['Nama']; ?></td>
    <td><?php echo $infoSearch['Jantina']; ?></td>
    <td><?php echo $infoSearch['KataLaluan']; ?></td>
    <td>
    <a href="hapus_pelajar.php?idpengguna=<?php echo $infoSearch['IDPengguna'];?>" onclick="return confirm('Semua rekod yang berkaitan akan dihapuskan. Anda pasti?')">
    <button class="senarai_button2">Hapus</button></a></td>
    </tr>
    <?php $no++;
    }
}
else{
$no=1;
    $data1 = mysqli_query($hubung,"SELECT * FROM pengguna
    WHERE Status='Pelajar' ORDER BY Nama ASC");
    while ($info1=mysqli_fetch_array($data1)){
        ?>
    
    <tbody>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $info1['IDPengguna']; ?></td>
        <td><?php echo $info1['Nama']; ?></td>
        <td><?php echo $info1['Jantina']; ?></td>
        <td><?php echo $info1['KataLaluan']; ?></td>
        <td>
        <div class="form_wrap">
         <a href="hapus_pelajar.php?idpengguna=<?php echo $info1['IDPengguna'];?>" onclick="return confirm('Semua rekod yang berkaitan akan dihapuskan. Anda pasti?')">
        <button class="senarai_button2">Hapus</button></a></td>
    </tr>
    </tbody>
        <?php $no++; 
        } 
    }?>
            </table>
        </main>
</center>
<?php include 'footer.php';?>
     </section>

<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?>
</font></center>
    </body>
</html>