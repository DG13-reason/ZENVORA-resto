<?php
session_start();

include '../database/koneksi.php';

/** @var mysqli $conn */

$login = mysqli_real_escape_string($conn, $_POST['login']);
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email ='$login' OR username='$login'");

$user = mysqli_fetch_assoc($query);

if($user){
    if(password_verify($password, $user['password'])){
        $_SESSION['user'] = [
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

echo "
<script>
    alert('Email atau password salah!');
    window.location.href='../index.php';
</script>";
?>