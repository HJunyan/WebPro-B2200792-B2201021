<?php 
//WAJIB FAIL INI
require 'sambung.php'; 
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="header.css">
    <title><?php echo $nama_sistem;?></title>
</head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
            <img src="<?php echo $logo;?>" style="width:100px;height:100px;">
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="index.php#hero">Laman Utama</a></li> │
            <li><a href="index.php#abouts">Tentang</a></li> │
            <li><a href="index.php#contact">Maklumat Hubungan</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->

</body>
  </html>
