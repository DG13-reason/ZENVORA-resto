<?php
session_start();
include "../database/koneksi.php";

if(!isset($_SESSION['user'])){
    header("Location:../index.php");
    exit;
}

$id = $_SESSION['user']['id'];

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$foto = $_SESSION['user']['foto'];

if(isset($_FILES['foto']) && $_FILES['foto']['name']!=""){

    $namaFoto = time()."_".$_FILES['foto']['name'];

    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        "../uploads/profile/".$namaFoto
    );

    $foto = $namaFoto;
}

if($password!=""){
    $password = password_hash($password,PASSWORD_DEFAULT);

    mysqli_query($conn,"
    UPDATE users
    SET

    username='$username',
    email='$email',
    password='$password',
    foto='$foto'

    WHERE id='$id'
    ");

}else{

    mysqli_query($conn,"
    UPDATE users
    SET

    username='$username',
    email='$email',
    foto='$foto'

    WHERE id='$id'
    ");

}

$user = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT *
FROM users
WHERE id='$id'
"));

$_SESSION['user']=$user;

header("Location:../profile.php");
exit;