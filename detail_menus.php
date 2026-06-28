<?php
session_start();
include 'database/koneksi.php';

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header("Location: menu.php");
    exit;
}

$id = (int)$_GET['id'];

$menu = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT menus.*,
IFNULL(AVG(reviews.rating),0) AS rata_rating,
COUNT(reviews.id) AS total_review
FROM menus
LEFT JOIN reviews
ON menus.id = reviews.menu_id
WHERE menus.id='$id'
GROUP BY menus.id
"));

if(!$menu){
    echo "<script>
        alert('Menu tidak ditemukan!');
        window.location='menu.php';
    </script>";
    exit;
}

$reviews = mysqli_query($conn,"
SELECT reviews.*, users.username
FROM reviews
JOIN users
ON reviews.user_id = users.id
WHERE reviews.menu_id='$id'
ORDER BY reviews.created_at DESC
");


include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="detail-menu">

    <div class="detail-card">
        <div class="detail-image">
            <img src="assets/images/Menu/<?= $menu['gambar']; ?>" alt="<?= $menu['nama_menu']; ?>">
        </div>
        <div class="detail-info">
            <h2><?= htmlspecialchars($menu['nama_menu']); ?></h2>
            <h3>
                Rp <?= number_format($menu['harga'],0,',','.'); ?>
            </h3>
            <div class="rating-box">
                ⭐ <?= number_format($menu['rata_rating'],1); ?>
                (<?= $menu['total_review']; ?> Review)
            </div>
            <p>
                <?= nl2br(htmlspecialchars($menu['deskripsi'])); ?>
            </p>
            <div class="footer-menu">
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $menu['id'] ?>">
                    <input type="hidden" name="nama" value="<?= $menu['nama_menu'] ?>">
                    <input type="hidden" name="harga" value="<?= $menu['harga'] ?>">
                    <button type="submit" name="cart" class="cart-btn">
                        <i data-feather="shopping-cart"></i>
                    </button>
                </form>
                <a href="payments.php?id=<?= $menu['id']; ?>" class="btn-order">
                    Pesan Sekarang
                </a>
            </div>    
        </div>
    </div>
    <hr>
    <h2>Ulasan Pelanggan</h2>
    <?php if(mysqli_num_rows($reviews)>0){ ?>
        <?php while($r=mysqli_fetch_assoc($reviews)){ ?>
            <div class="review-item">
                <h4><?= htmlspecialchars($r['username']); ?></h4>
                <div class="review-star">
                    ⭐ <?= $r['rating']; ?>/5
                </div>
                <p>
                    <?= nl2br(htmlspecialchars($r['komentar'])); ?>
                </p>
            </div>
        <?php } ?>
    <?php }else{ ?>
        <p class="review-info">
            Belum ada ulasan untuk menu ini.
        </p>
    <?php } ?>
</section>

<?php include 'includes/footer.php'; ?>