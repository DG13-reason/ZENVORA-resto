<?php
include 'auth_admin.php';
include '../database/koneksi.php';

$pageTitle = "Hapus Menu - Admin ZENVORA";
/** @var mysqli $conn */

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM menus WHERE id='$id'"
    )
);

if(!empty($data['gambar'])){

    $file = "../uploads/".$data['gambar'];

    if(file_exists($file)){
        unlink($file);
    }
}

mysqli_query(
    $conn,
    "DELETE FROM menus WHERE id='$id'"
);

header("Location: menu.php");
exit;