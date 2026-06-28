<?php
session_start();
require_once ('../database/koneksi.php');

/** @var mysqli $conn */

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$role = "user";
$foto = '';

if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ''){
    $foto = time() . '_' . $_FILES['foto']['name'];
    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        '../Uploads/profile/' . $foto
    );
}

$query = "INSERT INTO users
(username,email,password,role,foto)

VALUES

('$username','$email','$password','$role','$foto')";

mysqli_query($conn, $query);

header("Location: ../index.php");
exit;
?>