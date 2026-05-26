<?php
session_start();
include './database/Koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * From users Where email='$email'");

$user = mysqli_fetch_assoc($query);

if($user){
    if(password_verify($password, $user['password'])){
        $_SESSION['$user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'role' => $user['role'],
            'foto' => $user['foto']
        ];

        header("location: ../index.php");
        exit;
    }
}

echo "email atau password salah";
?>