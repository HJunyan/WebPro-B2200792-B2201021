<?php
require 'sambung.php';
require 'keselamatan.php';
?>
<?php
//session_start();
$idpengguna=$_SESSION['IDPengguna'];
$topik_pilihan=$_SESSION['pilih_topik'];
$score=$_SESSION['score'];
$total=$_GET['total'];
if ($total!=0){
$markah=($score/$total)* 100;
}else{
$markah=0;
}
if ($markah>=80) {
$gred="A";
}else{
if ($markah>=60) {
$gred="B";
}else{
if ($markah>=50){
$gred="C";
}else{
$gred="D";
}
}
}
$query="INSERT INTO rekod (IDPengguna, IDTopik, Gred, Skor, Markah, Tarikh) values ('$idpengguna','$topik_pilihan','$gred','$score',convert('$markah',VARCHAR(5)),SYSDATE())";
$insert_row=mysqli_query($hubung, $query);

?>

<html>
    <body>
        <center><h2>SOALAN TAMAT</h2></center>
        <main>
            <table width="70%" border="0" align="center">
                <tr>
                    <td>
                        <p>Tahniah! Anda telah selesai menjawab semua soalan.</p>
                        <p>Bilangan Betul: <?php echo $_SESSION['score']; ?></p>
                    </td></tr>
                <tr><td>
                <button onclick="window.location.href='soalan_papar.php?n=1'">Cuba Lagi</button>
                <button onclick="window.location.href='index2.php'">Tamat</button>
                <button onclick="window.location.href='skor_individu.php'">Prestasi</button>
                    <?php $_SESSION['score']=0; ?>
                    </td></tr></table>
            <?php include 'footer.php';?>
        </main>
    </body>
</html>