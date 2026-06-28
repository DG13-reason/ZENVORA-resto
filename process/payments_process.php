<?php
session_start();
include "../database/koneksi.php";

/** @var mysqli $conn */


if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];

$payment_method = $_POST['payment_method'];
$total_harga = $_POST['total_harga'];

$proof_image = "";


if(isset($_FILES['proof_image']) && $_FILES['proof_image']['name'] != ""){

    $namaFile = time()."_".$_FILES['proof_image']['name'];

    $tmp = $_FILES['proof_image']['tmp_name'];

    move_uploaded_file($tmp,"../uploads/payment/".$namaFile);

    $proof_image = $namaFile;
}


mysqli_query($conn,"INSERT INTO orders(user_id,total_harga)
VALUES('$user_id','$total_harga')");

$order_id = mysqli_insert_id($conn);


if(isset($_POST['menu_id'])){

    $menu_id = $_POST['menu_id'];

    $menu = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT * FROM menus WHERE id='$menu_id'"));

    $qty = 1;

    $harga = $menu['harga'];

    $subtotal = $harga;

    mysqli_query($conn,"INSERT INTO order_details
    (order_id,menu_id,quantity,harga,subtotal)

    VALUES

    ('$order_id',
    '$menu_id',
    '$qty',
    '$harga',
    '$subtotal')");

    mysqli_query($conn,"UPDATE menus
    SET stok = stok - 1
    WHERE id='$menu_id'");

}


elseif(isset($_SESSION['cart'])){

    foreach($_SESSION['cart'] as $item){

        $menu_id = $item['id'];

        $qty = $item['qty'];

        $menu = mysqli_fetch_assoc(mysqli_query($conn,
        "SELECT * FROM menus
        WHERE id='$menu_id'"));

        $harga = $menu['harga'];

        $subtotal = $qty * $harga;

        mysqli_query($conn,"INSERT INTO order_details
        (order_id,menu_id,quantity,harga,subtotal)

        VALUES

        ('$order_id',
        '$menu_id',
        '$qty',
        '$harga',
        '$subtotal')");

        mysqli_query($conn,"UPDATE menus
        SET stok = stok-$qty
        WHERE id='$menu_id'");

    }

    unset($_SESSION['cart']);

}


mysqli_query($conn,"INSERT INTO payments
(order_id,payment_method,proof_image)

VALUES

('$order_id',
'$payment_method',
'$proof_image')");


header("Location: ../success.php");
exit;

?>