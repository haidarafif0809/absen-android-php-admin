<?php 

include 'db.php';


$query_lokasi = $db->query("SELECT * FROM lokasi_absen");


 $result = array();

while ($data_lokasi = mysqli_fetch_array($query_lokasi)) {

	array_push($result,array(
	 "id" => $data_lokasi['id'],
	 "latitude"=>$data_lokasi['latitude_absen'],
	 "longitude"=>$data_lokasi['longitude_absen'],
	 "nama" => $data_lokasi['nama'],
	 "batas_jarak_absen" => $data_lokasi['batas_jarak_absen']
	 ));
}

 //displaying in json format 
 echo json_encode(array('result'=>$result));
 
$db->close();

 ?>