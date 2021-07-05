<?php
// buat koneksi dengan database mysql
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "user_level";
$koneksi = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
 
//periksa koneksi, tampilkan pesan kesalahan jika gagal
if(!$koneksi){
die ("Koneksi database gagal: ".mysqli_connect_errno().
" - ".mysqli_connect_error());
     }
?>