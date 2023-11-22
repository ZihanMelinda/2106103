<?php

include './koneksi.php';

$nama_dokter = $_POST['nama_dokter'];
$hari_praktik = $_POST['hari_praktik'];
$jam_praktik = $_POST['jam_praktik'];


$ini_query = "INSERT INTO jadwal_dokter VALUES(NULL, '$nama_dokter', '$hari_praktik', '$jam_praktik')";

if (mysqli_query($koneksi, $ini_query)) {
    header("Location: ./index.php");
    exit;
} else {
    echo "Error: " . $ini_query . "<br>" . mysqli_error($koneksi);
}

if(isset($_POST['submit'])){
}
?>