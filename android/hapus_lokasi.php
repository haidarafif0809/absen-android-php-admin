<?php 

include 'db.php';

$id = $_GET['id'];

$query_hapus = "DELETE FROM lokasi_absen WHERE id = '$id'";


if ($db->query($query_hapus) === TRUE) {
    echo "Berhasil Menghapus Lokasi Absen";
} else {
    echo "Error: " . $query_hapus . "<br>" . $db->error;
}

$db->close();
 ?>