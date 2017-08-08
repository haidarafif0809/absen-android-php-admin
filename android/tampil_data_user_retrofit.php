<?php 
include 'db.php';


$query_barang = $db->query("SELECT * FROM daftar_karyawan");


  $result = array();
  while($row = mysqli_fetch_array($query_barang)){
    array_push($result,array(
	 "id" => $row['id'],
	 "nik"=>$row['nik'],
	 "nama"=>$row['nama']
	
	 ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));

 ?>