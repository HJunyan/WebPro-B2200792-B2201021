<?php
//SESI DATA
$nokp=$_SESSION['IDPengguna'];
//Papar maklumat lengkap pengguna login
$dataA=mysqli_query($hubung,"SELECT * FROM pengguna WHERE IDPengguna='".$nokp."'");
$infoA=mysqli_fetch_array($dataA);
if ($_SESSION['Status']=="Guru")
{
?>
<!-- MENU ADMIN -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="menu.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>  
        </head>

<body>
<div class="sidebar">
    <div class="logo-details">
        <div class="logo"><img src="<?php echo $logo;?>" style="width:100px;"></div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="index2.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="papar_topik.php">
         <i class='bx bxs-edit' ></i>
         <span class="links_name">Kuiz</span>
       </a>
       <span class="tooltip">Kuiz</span>
     </li>
     <li>
       <a href="prestasi_topik.php">
         <i class='bx bx-receipt' ></i>
         <span class="links_name">Rekod Pelajar</span>
       </a>
       <span class="tooltip">Rekod</span>
     </li>
     <li>
       <a href="senarai_pelajar.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Senarai Pelajar</span>
       </a>
       <span class="tooltip">Senarai</span>
     </li>
     <li>
       <a href="import_daftar.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Import Pelajar</span>
       </a>
       <span class="tooltip">Import</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="user.png" alt="profileImg">
           <div class="name_ic">
             <div class="name"><?php echo $infoA['Nama']; ?></div>
             <div class="ic"><?php echo $infoA['IDPengguna']; ?></div>
           </div>
         </div>
         <a href="logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
     </li>
    </ul>
  </div>
  <script src="menu.js"></script>
</body>
</html>

<?php
}else{
?>
<!-- MENU PELAJAR -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="menu.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>  
        </head>

<body>
<div class="sidebar">
    <div class="logo-details">
        <div class="logo"><img src="<?php echo $logo;?>" style="width:100px;"></div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="index2.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="pilihan_topik.php">
         <i class='bx bxs-edit' ></i>
         <span class="links_name">Mula Kuiz</span>
       </a>
       <span class="tooltip">Mula</span>
     </li>
     <li>
       <a href="skor_individu.php">
         <i class='bx bx-receipt' ></i>
         <span class="links_name">Rekod</span>
       </a>
       <span class="tooltip">Rekod</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="user.png" alt="profileImg">
           <div class="name_ic">
             <div class="name"><?php echo $infoA['Nama']; ?></div>
             <div class="ic"><?php echo $infoA['IDPengguna']; ?></div>
           </div>
         </div>
         <a href="logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
     </li>
    </ul>
  </div>
  <script src="menu.js"></script>
</body>
</html>

<?php    
}
?>