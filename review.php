<?php
session_start();
include "database/koneksi.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

if(
    !isset($_GET['order']) ||
    !isset($_GET['menu'])
){
    header("Location: history.php");
    exit;
}

$order_id = (int)$_GET['order'];
$menu_id  = (int)$_GET['menu'];
$user_id  = $_SESSION['user']['id'];

$cek = mysqli_query($conn,"
SELECT
    o.id,
    o.status,
    od.menu_id,
    m.nama_menu,
    m.gambar
FROM orders o
JOIN order_details od
ON o.id = od.order_id
JOIN menus m
ON od.menu_id = m.id
WHERE
o.id='$order_id'
AND
o.user_id='$user_id'
AND
od.menu_id='$menu_id'
AND
o.status='selesai'
");

if(mysqli_num_rows($cek)==0){
    echo "<script>
        alert('Pesanan tidak valid.');
        window.location='history.php';
    </script>";
    exit;
}

$data = mysqli_fetch_assoc($cek);

$cekReview = mysqli_query($conn,"
SELECT id
FROM reviews
WHERE
order_id='$order_id'
AND
menu_id='$menu_id'
AND
user_id='$user_id'
");

if(mysqli_num_rows($cekReview)>0){
    echo "<script>
        alert('Menu ini sudah Anda review.');
        window.location='detail_pesanan.php?id=$order_id';
    </script>";
    exit;
}

include "includes/header.php";
include "includes/navbar.php";
?>

<section class="review-container">

    <h2>Berikan Ulasan</h2>
    <div class="review-menu">
        <img src="assets/images/Menu/<?= $data['gambar']; ?>">
        <h3><?= htmlspecialchars($data['nama_menu']); ?></h3>
    </div>

    <form
    action="process/review_process.php"
    method="POST">
        <input
        type="hidden"
        name="order_id"
        value="<?= $order_id; ?>">
        <input
        type="hidden"
        name="menu_id"
        value="<?= $menu_id; ?>">
        <label>Rating</label>
        <select
        name="rating"
        required>
            <option value="">Pilih Rating</option>
            <option value="5">★★★★★ (5)</option>
            <option value="4">★★★★☆ (4)</option>
            <option value="3">★★★☆☆ (3)</option>
            <option value="2">★★☆☆☆ (2)</option>
            <option value="1">★☆☆☆☆ (1)</option>
        </select>
        <label>Ulasan</label>
        <textarea
        name="ulasan"
        rows="5"
        placeholder="Bagaimana pengalaman Anda?"
        required></textarea>
        <button type="submit">
            Kirim Ulasan
        </button>
    </form>
</section>

<?php include "includes/footer.php"; ?>