<?php
//MESTI ADA
require 'sambung.php';
require 'keselamatan.php';
//PERLU FAIL INI
include 'header2.php';
?>

<html>
    <head>
    <link rel="stylesheet" href="edit_topik.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>  
    <?php include "menu.php";?>
    </head>	

    <body>
        <style>
.file-upload {
  display: inline-flex;
  align-items: center;
  font-size: 15px;
}

.file-upload_input {
  display: none;
}

.file-upload_button {
  -webkit-appearance: none;
  background: #B2BABB;
  border: 2px solid #909497;
  border-radius: 4px;
  outline: none;
  padding: 0.3em 0.8em;
  margin-right: 15px;
  color: #ffffff;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
}

.file-upload_button2 {
  -webkit-appearance: none;
  background: #EC7063;
  border: 2px solid #CB4335;
  border-radius: 4px;
  outline: none;
  padding: 0.3em 0.8em;
  margin-right: 15px;
  color: #ffffff;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
}

.file-upload_button:active {
  background: #515A5A;
}

.file-upload_button2:active {
  background: #943126;
}

.file-upload_label {
  max-width: 250px;
  font-size: 0.95em;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}
        </style>

    <section class="home-section">
      <div class="text">IMPORT NAMA PELAJAR DARI FAIL CSV</div>
      
        <main>
          <center>
                <tr>
                    <td>
<label>Kemudahan untuk daftar nama pelajar secara berkelompok</label><br>
<label>Pilih lokasi fail CSV/Excel:</label>
                        
<!-- PANGGIL FAIL CSV UTK LAKSANAKAN ARAHAN IMPORT -->
<form action="import_csv.php" method="post" name="upload_excel" enctype="multipart/form-data">
<div class="file-upload">
    <input type="file" name="file" id="file" class="file-upload_input">
    <button class="file-upload_button" type="button">Pilih fail</button>
    <span class="file-upload_label">Tiada fail yang dipilih</span>
</div>
    <br>
    <br>
    <button type="submit" id="submit" name="import" class="file-upload_button2"><i class='bx bx-upload'></i> Upload</button>
    </form>

    <script>
        Array.prototype.forEach.call(
  document.querySelectorAll(".file-upload_button"),
  function(button) {
    const hiddenInput = button.parentElement.querySelector(".file-upload_input");
    const label = button.parentElement.querySelector(".file-upload_label");
    const defaultLabelText = "Tiada fail yang dipilih";

    // Set default text for label
    label.textContent = defaultLabelText;
    label.title = defaultLabelText;

    button.addEventListener("click", function() {
      hiddenInput.click();
    });

    hiddenInput.addEventListener("change", function() {
      const filenameList = Array.prototype.map.call(hiddenInput.files, function(file) {
        return file.name;
      });

      label.textContent = filenameList.join(", ") || defaultLabelText;
      label.title = label.textContent;
    });
  }
);
    </script>
                
<br>              
*Cipta fail dalam Ms Excell dan save as csv mengikut
aturan lajur seperti di bawah:
 <table width="70%" border="1" align="center">
     <tr>
         <td>111213031234</td>
         <td>67894</td>
         <td>Cheah</td>
         <td>Lelaki</td>
          </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </main>
</center>

<?php include 'footer.php';?>
    </body>
</html>