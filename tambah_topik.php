<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLU FAIL INI
include 'header2.php';
?>

<?php
if (isset($_POST['submit'])){
    $nom_soalan = $_POST['nom_soalan'];
    $topik = $_POST['paparan_topik'];

    //QUERY TOPIK + INSERT NEW TOPIK
    $query="INSERT INTO topik (IDTopik,TopikKuiz,IDPengguna) values ('$nom_soalan','$topik','$_SESSION[IDPengguna]')";
    $insert_row =mysqli_query($hubung,$query);
    $last_id =mysqli_insert_id($hubung);
    //MESEJ
    echo "<script>alert('Topik baru telah ditambah');
    window.location='tambah_soalan.php?idtopik=$last_id'; </script>";
}
//KIRA JUMLAH TOPIK DALAM SENARAI
$query = "SELECT * FROM topik";
$topik = mysqli_query($hubung,$query);
$total = mysqli_num_rows($topik);
$next=$total+1;
?>

<html>
        <head>
    <link rel="stylesheet" href="tambah_topik.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include "menu.php";?>
    </head>
    
    <body>
        <style>
            .topic {
  display: inline-flex;
}

.topic_input {
  display: none;
}

.topic_button {
  -webkit-appearance: none;
  background: #EC7063;
  border: 2px solid #CB4335;
  border-radius: 4px;
  outline: none;
  padding: 0.3em 0.8em;
  color: #ffffff;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
}

.topic_button:hover {
  background: #CB4335;
}

        </style>
        <section class="home-section">
      <div class="text">TAMBAH TOPIK</div>
        <main>
            <center>
<table style="font-size:18px;">
<tr>
<td>
<form method="post" action="tambah_topik.php">
<p>
<label>Topik ke -</label> <a style="color:red;"><?php echo $next; ?></a>
<input type="text" value="<?php echo $next; ?>"
name="nom_soalan" hidden />
</p>
<p>
<label>Topik :</label>
<input type="text" name="paparan_topik" size="60%" required />
</p>
<br>
<div class="topic">
<p>
<input type="submit" name="submit" value="TAMBAH" class="topic_button"/>
</div>
</p>
</form>
    </td>
 </tr>
</table>
</center>
</main>
<?php include 'footer.php';?>
</section>
</body>
</html>