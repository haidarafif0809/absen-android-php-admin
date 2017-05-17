<?php
require_once('db.php');
include 'function.php';

//untuk yang android

if($_SERVER['REQUEST_METHOD']=='POST'){


$nik = $_POST['nik'];
$password = $_POST['password'];
$lokasi = $_POST['lokasi'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$jam_sekarang =  date("H:i:s");
$tanggal_sekarang = date('Y-m-d');
$waktu_sekarang = date('Y-m-d H:i:s');

$image = $_POST['image'];
$nama_foto = generateRandomString();
$path = "image/$nama_foto.png";


$cek = $db->query("SELECT * FROM daftar_karyawan where nik='$nik' AND password = '$password' ");

 $data = mysqli_fetch_array($cek);
$jumlah = mysqli_num_rows($cek);

$cek_absen_masuk = $db->query("SELECT * FROM presensi where jam_pulang IS NULL AND nik ='$nik' ");

$jumlah_absen_masuk = mysqli_num_rows($cek_absen_masuk);



if ($jumlah == 0)
{
	
//password atau nik salah
echo "0";



}
elseif ($jumlah_absen_masuk > 0 ) {
	// sudah melakukan absen
	echo "2";
}
else {
				
	//berhasil melakukan absen			
	
	$db->query(" INSERT INTO  presensi (nik,jam_masuk,tanggal_masuk,waktu_masuk,lokasi_absen_masuk,latitude_masuk,longitude_masuk,gambar) values
('$nik','$jam_sekarang','$tanggal_sekarang','$waktu_sekarang','$lokasi','$latitude','$longitude','$path')");

	// upload foto
	 file_put_contents($path,base64_decode($image));
	
	$db->query("UPDATE daftar_karyawan SET status='masuk' WHERE nik='$nik'");

echo "1";
} 



}





?>

