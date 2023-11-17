<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//ID TOPIK
$topik_pilihan = $_GET['idtopik'];
$_SESSION['pilih_topik'] = $topik_pilihan;
$_SESSION['score']=0;
//TABLE TOPIK
$dataTopik=mysqli_query($hubung, "SELECT * FROM topik WHERE IDTopik='$topik_pilihan'");
$getTopik=mysqli_fetch_array($dataTopik);
$idtopik=$getTopik['IDTopik'];

//TABLE soalan
$dataSoalan=mysqli_query($hubung, "SELECT * FROM soalan WHERE IDTopik='$idtopik'");
$getSoalan=mysqli_fetch_array($dataSoalan);
$total=mysqli_num_rows($dataSoalan);
?>

<html>
<head>
    <link rel="stylesheet" href="senarai_pelajar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <?php include "menu.php";?>
    </head>

    <body>
    <section class="home-section">
      <div class="text">TOPIK: <?php echo $getTopik['TopikKuiz'];?></div>
      <ul style="float:right;"><?php include 'utility.php';?></ul>
        <center>
        <table>
            <tr>
                <td>
                    <h2>Arahan kepada pelajar:</h2>
                    
                    <p>Jawaban semua soalan. Sila pilih jawaban yang terbaik.</p>
                    <br><strong>Jumlah Soalan: </strong><?php echo $total; ?>
                    <br><strong>Jenis Soalan: </strong>Soalan Bentuk Aneka Pilihan
                    <br><strong>Peruntukan Masa: </strong>
                    <?php echo $total*0.5; ?> minit
                    <br><br>
                    
                    <button onclick="window.location.href='soalan_papar.php?n=1&idtopik=<?php echo $topik_pilihan;?>&total=<?php echo $total;?>'">Mula</button>
                    <input type="button" value="Batal" onclick="history.back()"/>
                </td>
            </tr>
        </table>
</center>
        <?php include 'footer.php';?>
    </body>
</html>