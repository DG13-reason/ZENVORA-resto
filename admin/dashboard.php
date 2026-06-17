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
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <nav class="navbar-admin">
        <div class="nav-logo">
            <a href="/ZENVORA-resto/index.php">
                <img src="../assets/images/LOGO/ZENVORA.jpeg" alt="logo">
                <h2>ZENVORA <span>Resto</span></h2>
            </a>
        </div> 
        <div class="nav-admin">
            <a href="dashboard.php">
                <h2>Dashboard <span>Admin</span></h2>
            </a>          
        </div>

    </nav>
    
    <section class="admin-sect">
        <h1>Dashboard <span>Admin</span></h1>
        <h3>Selamat datang <?= $_SESSION['user']['username']; ?></h3>
        <div class="admin-kategori">
            <li><a href="menu.php">Kelola Menu</a></li>
            <li><a href="orders.php">Kelola Pesanan</a></li>
            <li><a href="users.php">Kelola User</a></li>
        </div>

        <div>
            <h2>Total Menu: <?= $totalMenu ?></h2>
            <h2>Total User: <?= $totalUser ?></h2>
        </div> 

    </section>





</body>
</html>



