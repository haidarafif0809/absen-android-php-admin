<?php 

$db = new mysqli('localhost','root','','absen_android');
date_default_timezone_set("Asia/Jakarta");

function tanggal_mysql($tanggal2){

 $date= date_create($tanggal2);
 $date_format = date_format($date,"Y-m-d");
 return $date_format;
}
 ?>