<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
include 'db.php';



$nik = $_POST['nik'];
$password = $_POST['password'];
$nama = $_POST['nama'];


$query_karyawan = $db->query("SELECT COUNT(*) AS jumlah_data FROM daftar_karyawan WHERE nik = '$nik' ");

$daftar_karyawan = $query_karyawan->fetch_array();

	if ($daftar_karyawan['jumlah_data'] >0 ) {

		echo "0";
	}
	else {


		$sql = "INSERT INTO daftar_karyawan (nik,password,nama) VALUES ('$nik','$password','$nama')";


			if ($db->query($sql) === TRUE) {
			    echo "1";
			} else {
			    echo "Error: " . $sql . "<br>" . $db->error;
			}

		$db->close();
		}

	}



?>