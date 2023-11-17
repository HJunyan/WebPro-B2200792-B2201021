<?php
//WAJIB FAIL INI
require 'sambung.php';
?>

<html>  
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="https://kit.fontawesome.com/a4f30fe677.js" crossorigin="anonymous"></script>
    <title><?php echo $nama_sistem;?></title>
    </head>

<body>
    <section>
        <!-- Image -->
        <div class="imgBx">
            <img src="login.jpg">
            <h4 id="title">Selamat Datang ke Aplikasi Penilaian Sejarah Tingkatan 4</h4>
            <a href="index.php"><button class="home_btn">Kembali ke Laman Utama</button></a>
        </div>
        <!-- End Image -->

        <!-- Content -->
        <div class="contentBx">
            <div class="formBx">
                <h2>Log Masuk</h2>
                <form action="proseslogin.php" method="post">
                    <div class="inputBx">
                        <span><i class="fas fa-id-card"></i> Nombor Kad Pengenalan</span>
                        <input type="text" name="IDPengguna" placeholder="Contoh: 001122071234" pattern="[0-9]{12}" 
                         oninvalid="this.setCustomValidity('Sila masukkan 12 digit nombor sahaja')" oninput="this.setCustomValidity('')" required autofocus>
                    </div>
                    <div class="inputBx">
                        <span><i class="fas fa-key"></i> Katalaluan</span>
                        <input type="password" name="KataLaluan" id="password" placeholder="5 digit" maxlength='5'
                         onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Log Masuk">
                    </div>
                    <div class="inputBx">
                        <p>Belum mempunyai akaun? <a href="daftar_baru.php">Daftar Baru</a></p>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Content -->
    </section>
</body>

</html>