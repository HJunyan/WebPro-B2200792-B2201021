<?php
require 'sambung.php';

if (isset($_POST["import"])) {
    $filename = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $idPengguna = $getData[0];
            $kataLaluan = $getData[1];
            $nama = $getData[2];
            $jantina = $getData[3];

            // Check if the record already exists
            $checkQuery = "SELECT * FROM pengguna WHERE IDPengguna = '$idPengguna'";
            $checkResult = mysqli_query($hubung, $checkQuery);

            if (mysqli_num_rows($checkResult) == 0) {
                // Record does not exist, so insert it
                $import = "INSERT INTO pengguna (IDPengguna, KataLaluan, Nama, Jantina, Status) VALUES ('$idPengguna','$kataLaluan','$nama','$jantina', 'Pelajar')";
                $tambah = mysqli_query($hubung, $import);

                if (!$tambah) {
                    echo "<script type='text/javascript'>alert('Pindah naik fail CSV gagal');window.location ='import_daftar.php'; </script>";
                } else {
                    echo "<script type='text/javascript'>alert('Pindah naik fail CSV berjaya'); window.location ='senarai_pelajar.php';</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Rekod dengan IDPengguna $idPengguna sudah wujud'); window.location ='import_daftar.php';</script>";
            }
        }
        fclose($file);
    }
}
?>
