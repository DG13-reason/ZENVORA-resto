<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$pass = "";
$db   = "ZENVORA_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn){
    echo "Koneksi berhasil";
}else{
    echo "Koneksi gagal : " . mysqli_connect_error();
}

?>