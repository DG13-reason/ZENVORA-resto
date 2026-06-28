<?php
session_start();
include 'database/koneksi.php';

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header("Location: history.php");
    exit;
}

$id_order = (int)$_GET['id'];

$order = mysqli_query($conn,"
SELECT *
FROM orders
WHERE id='$id_order'
");

$data_order = mysqli_fetch_assoc($order);

if(!$data_order){
    header("Location: history.php");
    exit;
}

$detail = mysqli_query($conn,"
SELECT
    od.*,
    m.nama_menu,
    m.gambar
FROM order_details od
JOIN menus m
ON od.menu_id = m.id
WHERE od.order_id='$id_order'
");

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="detail-container">

    <h2>Detail Pesanan</h2>
    <div class="detail-info">
        <p><b>ID Order :</b> <?= $data_order['id']; ?></p>
        <p><b>Status :</b> <?= ucfirst($data_order['status']); ?></p>
        <p><b>Total :</b> Rp <?= number_format($data_order['total_harga'],0,',','.'); ?></p>
        <p><b>Tanggal :</b> <?= $data_order['created_at']; ?></p>
    </div>
    <hr>
    <table>
        <tr>
            <th>Menu</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($detail)){ ?>
        <tr>
            <td><?= htmlspecialchars($row['nama_menu']); ?></td>
            <td>
                Rp <?= number_format($row['harga'],0,',','.'); ?>
            </td>
            <td><?= $row['quantity']; ?></td>
            <td>
                Rp <?= number_format($row['subtotal'],0,',','.'); ?>
            </td>
            <td>
            <?php
            if(isset($_SESSION['user']) && $data_order['status']=="selesai"){
                $user = $_SESSION['user']['id'];
                $cekReview = mysqli_query($conn,"
                SELECT id
                FROM reviews
                WHERE
                order_id='$id_order'
                AND menu_id='".$row['menu_id']."'
                AND user_id='$user'
                ");
                if(mysqli_num_rows($cekReview)==0){
            ?>
                    <a class="review-btn"
                    href="review.php?order=<?= $id_order; ?>&menu=<?= $row['menu_id']; ?>">
                        ⭐ Beri Review
                    </a>
            <?php
                }else{
                    echo "<span class='done'>✔ Sudah Direview</span>";
                }
            }else{
                echo "-";
            }
            ?>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a href="history.php" class="back-btn">
        ← Kembali
    </a>
</div>

<?php include 'includes/footer.php'; ?>