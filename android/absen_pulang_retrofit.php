<?php
require_once('db.php');
include 'function.php';

$jam_sekarang = date('H:i:s');
if($_SERVER['REQUEST_METHOD']=='POST'){

$nik = $_POST['nik'];
$password = $_POST['password'];
if (isset($_POST['keterangan'])) {
	$keterangan = $_POST['keterangan'];
}
else {
	$keterangan = "";
}
$lokasi = $_POST['lokasi'];

$tanggal_sekarang = date('Y-m-d');
$waktu_sekarang = date('Y-m-d H:i:s');
$latitude = $_POST['latitude'];
$longitude =  $_POST['longitude'];

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
  	   $response["value"] = 0;
       $response["message"] = "Nik Atau password Salah";
       echo json_encode($response);

}
elseif ($jumlah_absen_masuk == 0) {
	# code...
	   $response["value"] = 2;
       $response["message"] = "Anda Belum Absen Masuk atau sudah absen pulang!";
       echo json_encode($response);
}

else {
				
//berhasil absen pulang
	$sql = " UPDATE presensi SET jam_pulang= '$jam_sekarang',tanggal_pulang= '$tanggal_sekarang',waktu_pulang= '$waktu_sekarang',jam_kerja = timediff('$waktu_sekarang',waktu_masuk),lokasi_absen_pulang = '$lokasi',gambar_pulang = '$path', latitude_pulang = '$latitude' ,longitude_pulang = '$longitude' , keterangan_pulang = '$keterangan' where nik='$nik' and jam_pulang IS NULL"; 
if ($db->query($sql) === TRUE) {
		 file_put_contents($path,base64_decode($image));
			} else {
			    echo "Error: " . $sql . "<br>" . $db->error;
			}
		// upload foto
					
		$db->query("UPDATE daftar_karyawan SET `daftar_karyawan`.`status` ='pulang' WHERE nik='$nik'");	
	   $response["value"] = 1;
       $response["message"] = "Berhasil Absen Pulang";
       echo json_encode($response);
				
}


}

?>


