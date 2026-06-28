<?php
include 'auth_admin.php';
include '../database/koneksi.php';

$pageTitle = "Orders - Admin ZENVORA";

/** @var mysqli $conn */

/* Update status */
if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    mysqli_query($conn, "
        UPDATE orders
        SET status = '$status'
        WHERE id = '$order_id'
    ");

    header("Location: orders.php");
    exit;
}

$query = mysqli_query($conn, "
    SELECT
        orders.*,
        users.username
    FROM orders
    JOIN users ON orders.user_id = users.id
    ORDER BY orders.id DESC
");

include 'adminHeader.php';
include 'adminNavbar.php';
?>

<section class="orders-section">
    <div class="orders-header">
        <h1>Kelola Pesanan</h1>
    </div>

    <div class="orders-table-wrapper">
        <table class="orders-table">
            <thead>
                <tr>
                    <th>ID Order</th>
                    <th>User</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Update Status</th>
                    <th>Detail</th>
                </tr>
            </thead>

            <tbody>
                <?php while($order = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?= $order['id']; ?></td>

                    <td><?= htmlspecialchars($order['username']); ?></td>

                    <td>Rp <?= number_format($order['total_harga']); ?></td>

                    <td><?= date('d M Y, H:i', strtotime($order['order_date'])); ?></td>

                    <td>
                        <span class="status-badge <?= strtolower($order['status']); ?>">
                            <?= ucfirst($order['status']); ?>
                        </span>
                    </td>

                    <td>
                        <form method="POST" class="status-form">
                            <input
                                type="hidden"
                                name="order_id"
                                value="<?= $order['id']; ?>"
                            >

                            <select name="status">
                                <option value="pending" <?= $order['status'] == 'pending' ? 'selected' : ''; ?>>
                                    Pending
                                </option>
                                <option value="diproses" <?= $order['status'] == 'diproses' ? 'selected' : ''; ?>>
                                    Diproses
                                </option>
                                <option value="dikirim" <?= $order['status'] == 'dikirim' ? 'selected' : ''; ?>>
                                    Dikirim
                                </option>
                                <option value="selesai" <?= $order['status'] == 'selesai' ? 'selected' : ''; ?>>
                                    Selesai
                                </option>
                            </select>

                            <button type="submit" name="update_status">
                                Update
                            </button>
                        </form>
                    </td>

                    <td>
                        <a class="detail-btn" href="order_detail.php?id=<?= $order['id']; ?>">
                            Lihat
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

</body>
</html>