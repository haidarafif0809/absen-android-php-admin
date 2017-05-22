<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
include 'db.php';



$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$nama = $_POST['nama'];
$id = $_POST['id'];
$batas_jarak = $_POST['batas_jarak_absen'];

$sql = "UPDATE lokasi_absen SET latitude_absen =  '$latitude',longitude_absen ='$longitude' ,nama = '$nama' ,batas_jarak_absen = '$batas_jarak' WHERE id = '$id'";


if ($db->query($sql) === TRUE) {
    echo "Berhasil Mengubah Data Lokasi Absen";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}


$db->close();
}

?>