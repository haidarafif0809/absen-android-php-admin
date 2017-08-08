<?php
require_once('db.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $search = $_POST['search'];
  $sql = "SELECT p.nik,p.waktu_masuk,dk.nama FROM presensi p  INNER JOIN daftar_karyawan dk ON p.nik = dk.nik WHERE jam_pulang IS NULL AND (p.nik LIKE '%$search%' OR dk.nama LIKE '%$search%') ";
  $res = mysqli_query($db,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
     array_push($result, array('waktu_masuk'=>$row['waktu_masuk'], 'nik'=>$row['nik'], 'nama' => $row['nama']));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($db);
}