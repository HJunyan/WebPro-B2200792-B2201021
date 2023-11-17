<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLU FAIL INI
include 'header2.php';
?>
<?php
if (isset($_POST['submit'])){
    
    //NILAI YANG DIBUAT POST
    $nom_soalan = $_POST['nom_soalan'];
    $idtopik = $_POST['idtopik'];
    $soalan = $_POST['paparan_soalan'];
    $jawaban_betul = $_POST['jawaban_betul'];
    
    $pilihan = array();
    $pilihan[1] = $_POST['pilih1'];
    $pilihan[2] = $_POST['pilih2'];
    $pilihan[3] = $_POST['pilih3'];
    $pilihan[4] = $_POST['pilih4'];
    
    //query soalan
    $query="INSERT INTO soalan (NoSoalan, SoalanKuiz, IDTopik) values ('$nom_soalan','$soalan','$idtopik')";
    $insert_row=mysqli_query($hubung, $query);
    $last_id = mysqli_insert_id($hubung);
    
//MESEJ POP UP
echo "<script>alert('Soalan baru telah berjaya ditambah);
window.location='tambah_soalan.php?idtopik=$idtopik' 
</script>";
    
    //PENETAPAN JAWAPAN BETUL=1
    if($insert_row){
        foreach($pilihan as $pilihan_jawaban => $pilih) {
            if($pilih != ""){
                if($jawaban_betul == $pilihan_jawaban){
                    $jawaban = 1;
                } else {
                    $jawaban = 0;
                }
    
                $query="INSERT INTO jawaban (JawabanTepat, PilihanJawaban, IDSoalan) values ('$jawaban', '$pilih','$last_id')";
                $insert_row=$hubung->query($query);
            }
            }
    }
    }
    $topik_pilihan = $_GET['idtopik'];
    $_SESSION['topik_semasa'] = $topik_pilihan;
        
    //DAPATKAN JUMLAH SOALAN
    $query = "SELECT * FROM soalan WHERE IDTopik='$topik_pilihan'";
    $soalan = mysqli_query($hubung, $query);
    $total=mysqli_num_rows($soalan);
    $next=$total+1;
?>

<html>
<head>
    <link rel="stylesheet" href="tambah_soalan.css">
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
	width: 800px;
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

  .container{
	margin-top: 0%;
	margin-right: 0%;
	padding: 10px;
	border: 1px solid #ededed;

	-moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.03);
	-webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.03);
	box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.03);
}
form{
	width: auto;
	height: auto;
	padding-bottom: 20px;
}
textarea{
	border: none;
	outline: none;
	resize: none;
}

label.labels{
	font-weight: 600;
	font-size: 18px;
	color:#6B6B6B;
}

.textarea_style{
	margin-top: 5px;
	width: auto;
	height: auto;
	border: 1px solid #000;
	border-radius: 2px;
	font-size: 16px;
}
.textarea_style:hover{
	-moz-box-shadow: 0px 0px 10px 1px  #EBF6FF;
	-webkit-box-shadow: 0px 0px 10px 1px  #EBF6FF;
	box-shadow: 0px 0px 10px 1px  #EBF6FF;
	border: 1px solid #229CFF;
}
.textarea_style:focus{
	-moz-box-shadow: 0px 0px 5px 1px #EBF6FF;
	-webkit-box-shadow: 0px 0px 5px 1px  #EBF6FF;
	box-shadow: 0px 0px 5px 1px  #EBF6FF;
	border: 1px solid #229CFF;
}

.custom-field.one input {
  background: none;
  border: 2px solid #ddd;
  transition: border-color 0.3s ease;
}

.custom-field.one input + .placeholder {
  left: 8px;
  padding: 0 5px;
}

.custom-field.one input.dirty,
.custom-field.one input:not(:placeholder-shown),
.custom-field.one input:focus {
  border-color: #222;
  transition-delay: 0.1s
}

.custom-field.one input.dirty + .placeholder,
.custom-field.one input:not(:placeholder-shown) + .placeholder,
.custom-field.one input:focus + .placeholder {
  top: 0;
  font-size: 10px;
  color: #222;
  background: #fff;
  width: auto
}

.pilihan{
    width: 100%;
    margin-top: 0%;
	margin-right: 0%;
    padding: 40px;
    border-radius: 15px;
    background: none;
    justify-content: space-between;
}
.ui_text_field{
    width: 100%;
    position: relative;
}
.ui_text_field input{
    width: 100%;
    height: 40px;
    border-radius: 5px;
    padding: 15px;
    border: 1px solid lightgrey;
    color: #737373;
    font-size: 16px;
    transition: all 0.3s ease-in-out;   
}
.ui_text_field label{
    position: absolute;
    left: 17px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    color: #737373;
    transition: all 0.3s ease-out;
}
.ui_text_field input:focus{
    outline: 0;
    border-width: 2px;
}
.ui_text_field input:focus + label{
    margin-top: -32px;
    color: #333;
}
.ui_text_field input:not([value=""]){
  border-width: 2px;
}
.ui_text_field input:not([value=""]) + label{
  margin-top: -32px;
  color: #333;
}

.ques {
  display: inline-flex;
  float: right;
}

.ques_input {
  display: none;
}

.ques_button {
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

.ques_button:hover {
  background: #CB4335;
}


        </style>
    <section class="home-section">
      <div class="text">TAMBAH SOALAN</div>
        <main>
            <center>
          <table class="content-table">
            <form method="post" enctype="multipart/form-data">
    <thead>
    <th>No Soalan
    <input type="id" value="<?php echo $next; ?>" name="nom_soalan" size="5" readonly />
    <input type="id" value="<?php echo $topik_pilihan; ?>" name="idtopik" hidden />
    </th>
    </thead>
    <tbody>
    <td>
    <div class="container">
		<form>
			<label class="labels">Soalan</label><br>
			<div class="textarea_style">
    <textarea class="textarea" id="paparan_soalan" name="paparan_soalan" rows="4" cols="120" autofocus required></textarea>
    </div>
    <div class="pilihan">
    <div class="ui_text_field">
    <p>
    <input type="text" name="pilih1" value="" onchange="this.setAttribute('value',this.value)" required />
    <label>Pilihan 1: </label> 
    </p>
    </div>
    <br>
    <div class="ui_text_field">
    <p>
    <input type="text" name="pilih2" value="" onchange="this.setAttribute('value',this.value)" required />
    <label>Pilihan 2: </label> 
    </p>
    </div>
    <br>
    <div class="ui_text_field">
    <p> 
    <input type="text" name="pilih3" value="" onchange="this.setAttribute('value',this.value)" required/>
    <label>Pilihan 3: </label> 
    </p>
    </div>
    <br>
    <div class="ui_text_field">
    <p>
    <input type="text" name="pilih4" value="" onchange="this.setAttribute('value',this.value)" required/>
    <label>Pilihan 4: </label> 
    </p>
    </div>
    <br>
    <p>
    <label style="float:left;">Pilihan Jawapan [1-4] &nbsp;</label>
    <input type="text" name="jawaban_betul" style="width:50px;float:left;" required />
    </p>

    <div class="ques">
    <p>
    <input type="submit" name="submit" value="Cipta" class="ques_button"/>
    </p>
    </div>
    </div>
    </td>
    </tbody>
</form>
</table>
</main>
</center>
</section>
<?php include 'footer.php';?>
</body>
</html>