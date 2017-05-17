<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
include 'db.php';



$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$nama = $_POST['nama'];
$batas_jarak = $_POST['batas_jarak_absen'];

$sql = "INSERT INTO lokasi_absen (latitude_absen,longitude_absen,nama,batas_jarak_absen) VALUES ('$latitude','$longitude','$nama','$batas_jarak')";


if ($db->query($sql) === TRUE) {
    echo "Berhasil Menambah Lokasi Absen";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
}

?>