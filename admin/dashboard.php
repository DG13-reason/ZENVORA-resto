<?php

use Dom\Mysql;

include "auth_admin.php";
include "../database/koneksi.php";

$totalMenu =  mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM menus")
);

$totalUser = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM users")
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>

<h1>Dashboard Admin</h1>

<h3>Selamat datang <?= $_SESSION['user']['username']; ?></h3>

<div>
    <h2>Total Menu: <?= $totalMenu ?></h2>
    <h2>Total User: <?= $totalUser ?></h2>
</div>

<hr>

<a href="menu.php">Kelola Menu</a><br><br>
<a href="orders.php">Kelola Pesanan</a><br><br>
<a href="users.php">Kelola User</a>

</body>
</html>



