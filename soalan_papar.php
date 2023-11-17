<?php
//WAJIB FAIL INI
require 'sambung.php';
?>
<?php session_start();?>
<?php
//DAPATKAN ID TOPIK
$topik_pilihan=$_SESSION['pilih_topik'];

//TABLE TOPIK
$dataTopik=mysqli_query($hubung," SELECT * FROM soalan AS q INNER JOIN topik AS t ON t.IDTopik = q.IDTopik WHERE t.IDTopik=$topik_pilihan GROUP BY q.IDSoalan");
$getSoalan=mysqli_fetch_array($dataTopik);
// JUMLAH BILANGAN SOALAN
$total = mysqli_num_rows($dataTopik);
//TETAPKAN NOM SOALAN
$number = (int) $_GET['n'];
// DAPATKAN SOALAN
$query1 = mysqli_query($hubung, "SELECT * FROM soalan WHERE NoSoalan = $number AND IDTopik=$topik_pilihan");
$question=mysqli_fetch_assoc($query1);
// PILIHAN jawaban
$query2 = mysqli_query($hubung, "SELECT * FROM jawaban AS c INNER JOIN soalan AS q ON c.IDSoalan = q.IDSoalan WHERE q.NoSoalan = $number AND c.IDSoalan=$question[IDSoalan]");
//PAPARKAN PILIHAN
$choices = $query2;
?>

<html>
    <head>
            <head>
    <link rel="stylesheet" href="skor_individu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    </head>
    <body>
        <center><h2>TOPIK : <?php echo $getSoalan['TopikKuiz'];?></h2>
        </center>
        <table width="50%" border="0" align="center" style="font-size:18px;">
            <tr>
                <td><?php
                    //RESPON JAWAPAN BETUL ATAU SALAH
                    if($number == 1){
                        echo "Sila baca soalan dengan teliti";
                    }else{
                        $jawapan=$_GET['semakan'];
                        if($jawapan=="TEPAT"){
                            echo "Tahniah, jawaban bagi soalan ";
                            echo $number-1;
                            echo " adalah <font color='green'>TEPAT</font>";
                        }else{
                            echo "Maaf, jawaban bagi soalan ";
                            echo $number-1;
                            echo " adalah <font color='red'>SALAH</font>";
                        }
                    }
                    ?></td>
            </tr>
            <tr>
<td>Soalan <?php echo $number; ?> dari <?php echo $total; ?>
<br><br><?php echo $question['SoalanKuiz'] ?><br>
<form method="post" action="soalan_semak.php">
<ul>
<?php while($row=mysqli_fetch_assoc($choices)):?>
<li><input name="choice" type="radio" required
value="<?php echo $row['IDJawaban']; ?>" />
<?php echo $row['PilihanJawaban']; ?></li>
<?php endwhile; ?>
    </ul>
    <br>
<input type="submit" value="Next" class="submit_btn"/>
<input type="hidden" name="number" value="<?php echo $number; ?>" class="submit_btn"/>
<input type="hidden" name="idsoalan" value="<?php echo $question['IDSoalan']; ?>" class="submit_btn"/>
                    </form>
                </td>
            </tr>
        </table>
        <?php include 'footer.php';?>
    </body>
</html>