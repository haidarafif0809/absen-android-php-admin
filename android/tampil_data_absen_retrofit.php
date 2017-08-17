<?php 
include 'db.php';


$query_barang = $db->query("SELECT p.nik,p.waktu_masuk,dk.nama,p.gambar FROM presensi p  INNER JOIN daftar_karyawan dk ON p.nik = dk.nik WHERE jam_pulang IS NULL");


  $result = array();
  while($row = mysqli_fetch_array($query_barang)){
    array_push($result, array('waktu_masuk'=>$row['waktu_masuk'], 'nik'=>$row['nik'], 'nama' => $row['nama'],'foto_masuk' => $row['gambar']));
  }
  echo json_encode(array("value"=>1,"result"=>$result));

 ?>