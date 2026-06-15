<?php 
session_start();
include '../database/koneksi.php';

if(!isset($_SESSION['user'])) {
    echo "<script>alert('Silahkan Login Terlebih dahulu!'); 
    history.back();</script>";
    exit;
}

if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>alert('keranjang masih kosong!');
    window.location='../cart.php';</script>";
    exit;
}

$user_id = $_SESSION['user']['id'];
$total_harga = 0;

foreach ($_SESSION['cart'] as $item) {
    $harga = (int)$item['harga'];
    $qty = (int)$item['qty'];

    $total_harga += ($harga * $qty);
}

$queryOrder = "INSERT INTO orders (user_id, total_harga, order_date, status)
                VALUES ('$user_id', '$total_harga', NOW(), 'Pending')";

if(mysqli_query($conn, $queryOrder)) {
    $order_id = mysqli_insert_id($conn);

    foreach ($_SESSION['cart'] as $menu_id => $item) {
        $harga = (int)$item['harga'];
        $qty = (int)$item['qty'];
        $subtotal = $harga * $qty;

        $queryDetail = "INSERT INTO order_details
                        (order_id, menu_id, quantity, harga, subtotal)
                        VALUES
                        ('$order_id', '$menu_id', '$qty', '$harga', '$subtotal')";

        mysqli_query($conn, $queryDetail);
    }

    unset($_SESSION['cart']);
    echo "<script>
            alert('Pesanan berhasil dibuat!');
            window.location='../cart.php';
        </script>";
} else {
    echo "<script>
            alert('Gagal checkout!');
            window.location='../cart.php';
        </script>";
}
?>