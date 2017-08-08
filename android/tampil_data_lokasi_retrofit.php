<?php 
include 'db.php';


$query_barang = $db->query("SELECT * FROM lokasi_absen");


  $result = array();
  while($row = mysqli_fetch_array($query_barang)){
    array_push($result,array(
	 "id" => $row['id'],
	 "latitude"=>$row['latitude_absen'],
	 "longitude"=>$row['longitude_absen'],
	 "nama" => $row['nama'],
	 "batas_jarak_absen" => $row['batas_jarak_absen']
	 ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));

 ?>