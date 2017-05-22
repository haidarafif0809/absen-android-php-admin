<?php 
include 'db.php';

$id = $_GET['id'];


$query_lokasi = $db->query("SELECT * FROM lokasi_absen WHERE id = '$id'");
$data_lokasi = mysqli_fetch_array($query_lokasi);

 //pushing result to an array 
 $result = array();

array_push($result,array(
	 "latitude"=>$data_lokasi['latitude_absen'],
	 "longitude"=>$data_lokasi['longitude_absen'],
	 "nama" => $data_lokasi['nama'],
	 "batas_jarak_absen" => $data_lokasi['batas_jarak_absen']
	 ));
 
	 //displaying in json format 
 echo json_encode(array('result'=>$result));
$db->close();

 ?>