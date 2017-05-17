<?php session_start();

	include 'android/db.php';



	$username = $_POST['nik'];
	$password = $_POST['password'];

	$sql = $db->query("SELECT * FROM daftar_karyawan WHERE nik = '$username' AND password = '$password' AND tipe_user = 'admin'");

	$data_user = mysqli_num_rows($sql);
	if ($data_user == 1) {
		# code...

		$_SESSION['username'] = $username;
		header('location:index.php');

	}
	else {
		$_SESSION['error'] = 'Username atau Password yang anda masukkan salah!';
		header('location:login.php');

	}


	$db->close();


?>