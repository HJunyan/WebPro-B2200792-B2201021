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
    <section class="home-section">
      <div class="text">SENARAI TOPIK</div>
        <main>
            <table width="70%" border="0" align="center"
                   style='font-size:16px'>
                <tr>
                    <td width="2%"><b>Bil.</b></td>
                    <td width="50%"><b>Topik</b></td>
                    <td width="10%"><b>Bilangan Soalan</b></td>
                    <td width="8%"><b>Tindakan</b></td>
                </tr>
                <?php
                $no=1;
                $data1=mysqli_query($hubung,"SELECT * FROM topik");
                while($info1=mysqli_fetch_array($data1))
                {
                $idtopik=$info1['IDTopik'];
                
                $dataSoalan=mysqli_query($hubung, "SELECT COUNT(IDTopik) as 'bil' FROM soalan WHERE IDTopik=$idtopik GROUP BY IDTopik");
                $getSoalan=mysqli_fetch_array($dataSoalan);
                ?>
                <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $info1['TopikKuiz']; ?></td>
                <td><?php echo $getSoalan['bil']; ?></td>
                <td><?php if($getSoalan['bil']==0) {
                }else{ ?>
                <div class="form_wrap">
                <a href="soalan_mula.php?idtopik=
                <?php echo $info1['IDTopik'];?>">
                <button>BUKA</button></a>
                <?php } ?></td>
                </tr>
                <?php $no++; } ?>
            </table>
        </main>
        <center><font style='font-size:14px'>
            * Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?>
            </font>
        </center>
                    </section>
    </body>
</html>