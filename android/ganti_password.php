<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
include 'db.php';



$nik = $_POST['nik'];
$password_baru = $_POST['password_baru'];
$password_lama = $_POST['password_lama'];



$sql = $db->query("SELECT * FROM daftar_karyawan WHERE nik = '$nik' AND password = '$password_lama'");

$data_user = mysqli_num_rows($sql);

if ($data_user == 0) {
	echo "2";
	//usernya salah password
}
elseif ($data_user == 1 ) {
	# code...

	$sql = "UPDATE daftar_karyawan SET password = '$password_baru' WHERE nik = '$nik'";


	if ($db->query($sql) === TRUE) {
	    echo "1";
	} else {
	    echo "Error: " . $sql . "<br>" . $db->error;
	}

}



$db->close();

}

?>