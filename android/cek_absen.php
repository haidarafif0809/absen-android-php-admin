<?php
require_once('db.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $nik = $_POST['nik'];

  $cari_nik  = $db->query("SELECT COUNT(*) as jumlah_data FROM  daftar_karyawan WHERE nik = '$nik'  ")->fetch_array();

  if ($cari_nik['jumlah_data'] == 1) {
  	// nik di temukan 
  	$value = 1;
	  	$cari_absen = $db->query("SELECT COUNT(*) as jumlah_data FROM presensi p  INNER JOIN daftar_karyawan dk ON p.nik = dk.nik WHERE jam_pulang IS NULL AND p.nik = '$nik'  ")->fetch_array();
	 	if ($cari_absen['jumlah_data'] > 0) {
	 		// sudah masuk
	 		$value = 2;
	 	}
	 	else {
	 		//sudah pulang
	 		$value = 3;
	 	}
  }
  else {
  //nik tidak ada 
  	$value = 0;
  }



  echo json_encode(array("value"=>$value));
  mysqli_close($db);
}