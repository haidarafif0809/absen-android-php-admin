<?php 

include 'db.php';


$query_lokasi = $db->query("SELECT * FROM daftar_karyawan");


 $result = array();

while ($data_lokasi = mysqli_fetch_array($query_lokasi)) {

	array_push($result,array(
	 "id" => $data_lokasi['id'],
	 "nik"=>$data_lokasi['nik'],
	 "nama"=>$data_lokasi['nama']
	
	 ));
}

 //displaying in json format 
 echo json_encode(array('result'=>$result));
 
$db->close();

 ?>