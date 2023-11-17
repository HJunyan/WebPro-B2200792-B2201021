<?php
//WAJIB FAIL INI
require 'sambung.php';
include 'header.php';
?>
<!-- MULA HTML -->
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title><?php echo $nama_sistem;?></title>
    </head>

<body>
    <!-- Hero Section -->
    <section id="hero">
        <div class="hero container">
            <div>
                <h1>Selamat datang <span></span></h1>
                <h1>ke <span></span></h1>
                <h1>Kuiz Sejarah Tingkatan 4 <span></span></h1>
                <a href="login.php" type="button" class="cta">Log Masuk</a>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- About Section -->
    <section id="abouts">
        <div class="abouts container">
            <div class="about-top">
                <h1 class="section-title"><span>Tentang</span> Aplikasi</h1>
                <p>Kandungan berikut dapat memberikan pemahaman yang lebih baik mengenai aplikasi ini!</p>
            </div>
            <div class="about-bottom">
                <div class="about-item">
                    <div class="icon"><img src="https://img.icons8.com/cotton/128/000000/idea.png"/></div>
                <h2>Pelbagai Topik</h2>
                <p>Anda boleh memilih topik yang berbeza untuk dijawab.</p>
                <p>Semua topik ialah subjek Sejarah Tingkatan 4.</p>
                </div>
                <div class="about-item">
                    <div class="icon"><img src="https://img.icons8.com/cotton/128/000000/edit--v2.png"/></div>
                <h2>Jenis Soalan</h2>
                <p>Semua soalan mempunyai empat pilihan. Pilih jawaban yang betul. Mudah sahaja untuk beroperasi.</p>
                </div>
                <div class="about-item">
                    <div class="icon"><img src="https://img.icons8.com/cotton/64/000000/document.png"/></div>
                <h2>Rekod anda</h2>
                <p>Anda boleh menilai kemampuan semasa anda melalui laporan.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Contact Section -->
    <section id="contact">
        <div class="contact container">
            <div><h1 class="section-title">Maklumat<span> Hubungan</span></h1></div>
            <div class="contact-items">
                <div class="contact-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png"/></div>
                    <div class="contact-info">
                        <h1>Telefon</h1>
                        <h2>+60112234987</h2>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/email--v1.png"/></div>
                    <div class="contact-info">
                        <h1>E-mel</h1>
                        <h2>junyan@gmail.com</h2>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/instagram.png"/></div>
                    <div class="contact-info">
                        <h1>Instagram</h1>
                        <h2>@jy_0810</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->

    <!-- Footer -->
    <section id="footer">
        <div class="footer container">
            <div class="brand"><h1><span>A</span>plikasi <span>P</span>enilaian</h1></div>
            <h2>Kuiz Dalam Talian</h2>
            <div class="social-icon">
                <div class="social-item">
                    <a href="https://www.facebook.com/"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png"/></a>
                </div>
                <div class="social-item">
                    <a href="https://web.whatsapp.com/"><img src="https://img.icons8.com/bubbles/100/000000/whatsapp.png"/></a>
                </div>
                <div class="social-item">
                    <a href="https://www.instagram.com/"><img src="https://img.icons8.com/bubbles/100/000000/telegram-app.png"/></a>
                </div>
            </div>
            <p>Copyright &copy; 2021 Sistem Pembelajaran Sejarah Kuiz</p>
        </div>
    </section>
    <!-- End Footer -->
</body>
</html>

