<?php
include 'auth_admin.php';
include '../database/koneksi.php';

/** Update status */
if(isset($_POST['update_status'])){

    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    mysqli_query($conn,
        "UPDATE orders
         SET status='$status'
         WHERE id='$order_id'"
    );

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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Pesanan</title>

    <style>
        table{
            width:100%;
            border-collapse:collapse;
        }

        th,td{
            border:1px solid #ddd;
            padding:10px;
            text-align:center;
        }

        th{
            background:#f5f5f5;
        }
    </style>
</head>
<body>

<h1>Kelola Pesanan</h1>

<a href="dashboard.php">← Dashboard</a>

<br><br>

<table>
    <tr>
        <th>ID Order</th>
        <th>User</th>
        <th>Total Harga</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
        <th>Detail</th>
    </tr>

    <?php while($order = mysqli_fetch_assoc($query)): ?>

    <tr>
        <td><?= $order['id']; ?></td>

        <td><?= $order['username']; ?></td>

        <td>
            Rp <?= number_format($order['total_harga']); ?>
        </td>

        <td><?= $order['order_date']; ?></td>

        <td><?= ucfirst($order['status']); ?></td>

        <td>

            <form method="POST">

                <input
                    type="hidden"
                    name="order_id"
                    value="<?= $order['id']; ?>"
                >

                <select name="status">

                    <option value="pending"
                        <?= $order['status']=='pending'?'selected':''; ?>>
                        Pending
                    </option>

                    <option value="diproses"
                        <?= $order['status']=='diproses'?'selected':''; ?>>
                        Diproses
                    </option>

                    <option value="dikirim"
                        <?= $order['status']=='dikirim'?'selected':''; ?>>
                        Dikirim
                    </option>

                    <option value="selesai"
                        <?= $order['status']=='selesai'?'selected':''; ?>>
                        Selesai
                    </option>

                </select>

                <button
                    type="submit"
                    name="update_status">
                    Update
                </button>

            </form>

        </td>

        <td>
            <a href="order_detail.php?id=<?= $order['id']; ?>">
                Lihat
            </a>
        </td>

    </tr>

    <?php endwhile; ?>

</table>

</body>
</html>