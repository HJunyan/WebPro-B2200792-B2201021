<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
// REKOD YANG DIPOST
if (isset($_POST['submit'])){
//NILAI YANG DI POST
$idsoalan = $_POST['idsoalan'];
$soalan = $_POST['paparan_soalan'];
//KEMASKINI DENGAN REKOD BARU
$result = mysqli_query($hubung,
"UPDATE soalan SET SoalanKuiz='$soalan'
WHERE IDSoalan='$idsoalan'");
//MESEJ POP UP
echo "<script>alert('Soalan berjaya dikemaskini');
window.location='papar_topik.php'</script>";
}
?>
