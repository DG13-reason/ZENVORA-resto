<?php
include 'auth_admin.php';
include '../database/koneksi.php';

$pageTitle = "Detail Pesanan - Admin ZENVORA";

/** @var mysqli $conn */

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID order tidak ditemukan.");
}

$order_id = (int) $_GET['id'];

/* Ambil data pesanan + user */
$orderQuery = mysqli_query($conn, "
    SELECT 
        orders.*,
        users.username,
        users.email
    FROM orders
    JOIN users ON orders.user_id = users.id
    WHERE orders.id = $order_id
");

if (!$orderQuery || mysqli_num_rows($orderQuery) == 0) {
    die("Pesanan tidak ditemukan.");
}

$order = mysqli_fetch_assoc($orderQuery);

/* Ambil item pesanan */
$detailQuery = mysqli_query($conn, "
    SELECT
        order_details.*,
        menus.nama_menu
    FROM order_details
    JOIN menus ON order_details.menu_id = menus.id
    WHERE order_details.order_id = $order_id
");

include 'adminHeader.php';
include 'adminNavbar.php';
?>

<section class="order-detail-section">
    <div class="order-detail-header">
        <h1>Detail Pesanan</h1>
        <a href="orders.php" class="back-btn">← Kembali</a>
    </div>

    <div class="order-info-card">
        <h2>Informasi Pesanan</h2>
        <div class="order-info-grid">
            <p><strong>ID Order:</strong> <?= $order['id']; ?></p>
            <p><strong>Username:</strong> <?= htmlspecialchars($order['username']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($order['email']); ?></p>
            <p><strong>Tanggal:</strong> <?= date('d M Y, H:i', strtotime($order['order_date'])); ?></p>
            <p><strong>Status:</strong> <?= ucfirst($order['status']); ?></p>
            <p><strong>Total Harga:</strong> Rp <?= number_format($order['total_harga']); ?></p>
        </div>
    </div>

    <div class="order-items-card">
        <h2>Item Pesanan</h2>

        <table class="order-detail-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php while($item = mysqli_fetch_assoc($detailQuery)): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($item['nama_menu']); ?></td>
                    <td>Rp <?= number_format($item['harga']); ?></td>
                    <td><?= $item['quantity']; ?></td>
                    <td>Rp <?= number_format($item['subtotal']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

</body>
</html>