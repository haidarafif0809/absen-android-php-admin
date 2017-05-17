<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
	 $image = $_POST['image'];
	 $nik = $_POST['nik'];
	 
	 require_once('db.php');
	 
	 $sql ="SELECT id FROM photos ORDER BY id ASC";
	 
	 $res = $db->query($sql);
	 
	 $id = 0;
	 
	 while($row = mysqli_fetch_array($res)){
	 $id = $row['id'];
	 }
	 
	 $path = "image/$id.png";
	 
	 $actualpath = "http://192.168.1.16/android/$path";
	 
	 $sql = "INSERT INTO photos (image,nik) VALUES ('$actualpath','$nik')";

	if ($db->query($sql) === TRUE) {
	     file_put_contents($path,base64_decode($image));
		 echo "Successfully Uploaded";
	} 
	else {
	     
	     echo "Error: " . $sql . "<br>" . $db->error;
	}

	$db->close();

}