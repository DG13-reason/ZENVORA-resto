<?php
include "auth_admin.php";
include "../database/koneksi.php";

$pageTitle = "Dashboard - Admin ZENVORA";
/** @var mysqli $conn */

$totalMenu =  mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM menus")
);

$totalUser = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM users")
);

$totalMeja = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM meja")
);

include 'adminHeader.php';
include 'adminNavbar.php'
?>


    
    <section class="admin-sect">
        <h1>Dashboard Admin</h1>
        <h3>Selamat datang <span><?= $_SESSION['user']['username']; ?></span></h3>
        <div class="admin-kategori">
            <li><a href="menu.php">Kelola Menu</a></li>
            <li><a href="orders.php">Kelola Pesanan</a></li>
            <li><a href="users.php">Kelola User</a></li>  
            <li><a href="meja.php">Kelola Meja</a></li>
        </div>

        <div class="admin-info">
            <h2>Total Menu : <span><?= $totalMenu ?></span></h2>
            <h2>Total User : <span><?= $totalUser ?></span></h2>
            <h2>Total Meja : <span><?= $totalMeja ?></span></h2>
        </div> 

    </section>
</body>
</html>



