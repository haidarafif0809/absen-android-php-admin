<?php 

include 'db.php';


$query_hadir = $db->query("SELECT p.nik,p.waktu_masuk,dk.nama FROM presensi p  INNER JOIN daftar_karyawan dk ON p.nik = dk.nik WHERE jam_pulang IS NULL");


 $result = array();

while ($data_hadir = mysqli_fetch_array($query_hadir)) {

	array_push($result,array(
	 "waktu_masuk" => $data_hadir['waktu_masuk'],
	 "nik"=>$data_hadir['nik'],
	 "nama"=>$data_hadir['nama']
	
	 ));
}

 //displaying in json format 
 echo json_encode(array('result'=>$result));
 
$db->close();

 ?>