<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){

	include 'db.php';



	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = $db->query("SELECT * FROM daftar_karyawan WHERE nik = '$username' AND password = '$password' AND tipe_user = 'admin'");

	$data_user = mysqli_num_rows($sql);
	if ($data_user == 1) {
		# code...
		echo 1;

	}
	else {
		echo 0;
	}


	$db->close();
}

?>