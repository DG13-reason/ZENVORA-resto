<?php
session_start();
include "database/koneksi.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];

$query = mysqli_query($conn,"
SELECT *
FROM orders
WHERE user_id='$user_id'
ORDER BY created_at DESC
");

include "includes/header.php";
include "includes/navbar.php";
?>

<section class="history-container">

    <h1>History Pesanan</h1>

    <?php if(mysqli_num_rows($query) > 0){ ?>

    <table class="history-table">

        <thead>

            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

        <?php
        $no=1;
        while($row=mysqli_fetch_assoc($query)){
        ?>

        <tr>

            <td><?= $no++; ?></td>

            <td>
                <?= date("d M Y H:i",strtotime($row['created_at'])); ?>
            </td>

            <td>
                Rp <?= number_format($row['total_harga'],0,',','.'); ?>
            </td>

            <td>

                <span class="status <?= strtolower($row['status']); ?>">
                    <?= $row['status']; ?>
                </span>

            </td>

            <td>

                <a href="detail_pesanan.php?id=<?= $row['id']; ?>" class="btn-detail">
                    Detail
                </a>

            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

    <?php }else{ ?>

        <div class="empty-history">
            Anda belum memiliki riwayat pesanan.
        </div>

    <?php } ?>

</section>

<?php include "includes/footer.php"; ?>