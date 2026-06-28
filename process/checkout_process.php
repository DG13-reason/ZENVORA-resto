<?php
session_start();

if(!isset($_SESSION['user'])){
    echo "<script>
    alert('Silakan login!');
    window.location='../index.php?showLogin=1';
    </script>";
    exit;
}

if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
    echo "<script>
    alert('Keranjang masih kosong!');
    window.location='../cart.php';
    </script>";
    exit;
}

header("Location: ../payments.php");
exit;