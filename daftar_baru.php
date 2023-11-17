<?php
//WAJIB FAIL INI
require 'sambung.php';
//POST VALUE
if (isset($_POST['IDPengguna'])) {
    $idpengguna = $_POST['IDPengguna'];
    $nama = $_POST['Nama'];
    $jantina = $_POST['Jantina'];
    $katalaluan = $_POST['KataLaluan'];

//TAMBAH REKOD
$daftar= "INSERT INTO pengguna
(IDPengguna,Nama,Jantina,Status,KataLaluan) VALUES ('$idpengguna','$nama','$jantina','Pelajar','$katalaluan')";
// LAKSANA ARAHAN SQL
$hasil = mysqli_query($hubung,$daftar);
// MESEJ POP UP
    if ($hasil) {
        echo "<script>alert('Pendaftaran berjaya');
        window.location='login.php'</script>";
    }else{
        echo "<script>alert('Pendaftaran gagal');
        window.location='daftar_baru.php'</script>";
    }
}
?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="daftar_baru.css">
    <script src="https://kit.fontawesome.com/a4f30fe677.js" crossorigin="anonymous"></script>
    <title><?php echo $nama_sistem;?></title>
    </head>

<body>
    <section>
        <!-- Image -->
        <div class="imgBx">
            <img src="daftar.jpg">
            <h4 id="title">Selamat Datang untuk menjadi sebahagian daripada kami !</h4>
            <a href="index.php"><button class="home_btn">Kembali ke Laman Utama</button></a>
        </div>
        <!-- End Image -->

        <!-- Content -->
        <div class="contentBx">
            <div class="formBx">
                <h2>Daftar Baru</h2>
                <form method="POST">
                    <div class="inputBx">
                        <span><i class="fas fa-user"></i> Nama</span>
                        <input type="text" name="Nama" placeholder="Nama Penuh Anda" required>
                    </div>
                    <div class="inputBx">
                        <span><i class="fas fa-id-card"></i> Nombor Kad Pengenalan</span>
                        <input type="text" name="IDPengguna" placeholder="Contoh: 001122071234" pattern="[0-9]{12}" 
                         oninvalid="this.setCustomValidity('Sila masukkan 12 digit nombor sahaja')" oninput="this.setCustomValidity('')" required autofocus>
                    </div>
                    <div class="inputBx">
                        <span><i class="fas fa-venus-mars"></i> Jantina</span>
                        <div class="wrapper">
                        <input type="radio" name="Jantina" value="Lelaki" id="option-1" checked>
                        <input type="radio" name="Jantina" value="Perempuan" id="option-2">
                        <label for="option-1" class="option option-1">
                        <div class="dot-1"></div>
                        <span>Lelaki</span>
                        </label>
                        <label for="option-2" class="option option-2">
                        <div class="dot-2"></div>
                        <span>Perempuan</span>
                        </label>
                        </div>
                    </div>
                    <div class="inputBx">
                        <span><i class="fas fa-key"></i> Katalaluan</span>
                        <input type="password" name="KataLaluan" id="password" placeholder="5 digit" maxlength='5'
                         onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Daftar Baru">
                    </div>
                    <input type="reset" value="Reset" style="float:right;">
                    <br>
                    <div class="inputBx">
                        <p>Sudah mempunyai akaun? <a href="login.php">Log Masuk</a></p>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Content -->
    </section>
</body>
</html>