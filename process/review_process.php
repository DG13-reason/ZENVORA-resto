<?php
session_start();
include "../database/koneksi.php";

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] != "POST"){
    header("Location: ../history.php");
    exit;
}

$user_id  = $_SESSION['user']['id'];
$order_id = (int)$_POST['order_id'];
$menu_id  = (int)$_POST['menu_id'];
$rating   = (int)$_POST['rating'];
$komentar = mysqli_real_escape_string($conn, trim($_POST['ulasan']));

$cekOrder = mysqli_query($conn,"
SELECT o.id
FROM orders o
JOIN order_details od
ON o.id = od.order_id
WHERE
o.id='$order_id'
AND
o.user_id='$user_id'
AND
od.menu_id='$menu_id'
AND
o.status='selesai'
");

if(mysqli_num_rows($cekOrder)==0){

    echo "<script>
    alert('Pesanan tidak valid.');
    window.location='../history.php';
    </script>";
    exit;

}


$cekReview = mysqli_query($conn,"
SELECT id
FROM reviews
WHERE
order_id='$order_id'
AND
menu_id='$menu_id'
AND
user_id='$user_id'
");

if(mysqli_num_rows($cekReview)>0){

    echo "<script>
    alert('Anda sudah memberikan ulasan.');
    window.location='../detail_pesanan.php?id=$order_id';
    </script>";
    exit;

}


$simpan = mysqli_query($conn,"
INSERT INTO reviews
(order_id,menu_id,user_id,rating,komentar,created_at)
VALUES
('$order_id','$menu_id','$user_id','$rating','$komentar',NOW())
");

if($simpan){
    echo "<script>
    alert('Terima kasih atas ulasan Anda!');
    window.location='../detail_pesanan.php?id=$order_id';
    </script>";
}else{
    die("Gagal menyimpan review : ".mysqli_error($conn));
}
?>