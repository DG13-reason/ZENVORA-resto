<?php
session_start();
include 'database/koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM menus");

if(isset($_SESSION['user'])){
    $username = $_SESSION['user']['username'];
}

if(isset($_POST['cart'])){

    if(!isset($_SESSION['user'])){
        header("Location: ?showLogin=1");
        exit;
    }

    $id = $_POST['id'];

    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['qty']++;
    }else{
        $_SESSION['cart'][$id] = [
            'nama'  => $_POST['nama'],
            'harga' => $_POST['harga'],
            'qty'   => 1
        ];
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

include 'includes/header.php';
include 'includes/navbar.php';

$keyword = "";
if(isset($_GET['search']) && $_GET['search'] != ""){
    $keyword = mysqli_real_escape_string($conn, $_GET['search']);
}

$makanan = mysqli_query($conn,"
SELECT menus.*,
IFNULL(AVG(reviews.rating),0) AS rata_rating,
COUNT(reviews.id) AS total_review
FROM menus
LEFT JOIN reviews
ON menus.id = reviews.menu_id
WHERE menus.category_id = 1
AND (
    menus.nama_menu LIKE '%$keyword'
    OR menus.deskripsi LIKE '%$keyword%'
)
GROUP BY menus.id
HAVING total_review >= 3
AND rata_rating >= 4
ORDER BY rata_rating DESC,total_review DESC
LIMIT 3
");

$minuman = mysqli_query($conn,"
SELECT menus.*,
IFNULL(AVG(reviews.rating),0) AS rata_rating,
COUNT(reviews.id) AS total_review
FROM menus
LEFT JOIN reviews
ON menus.id = reviews.menu_id
WHERE menus.category_id = 1
GROUP BY menus.id
HAVING total_review >= 3
AND rata_rating >= 4
ORDER BY rata_rating DESC,total_review DESC
LIMIT 3
");

$snack = mysqli_query($conn,"
SELECT menus.*,
IFNULL(AVG(reviews.rating),0) AS rata_rating,
COUNT(reviews.id) AS total_review
FROM menus
LEFT JOIN reviews
ON menus.id = reviews.menu_id
WHERE menus.category_id = 1
GROUP BY menus.id
HAVING total_review >= 3
AND rata_rating >= 4
ORDER BY rata_rating DESC,total_review DESC
LIMIT 3
");
?>


<section class="search-sect">
    <form action="menu.php" method="GET" class="search-menu">
        <input type="text" name="search" placeholder="searching menu" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" required>
        <button type="submit">
            <i data-feather="search"></i>
        </button>
        <?php if(isset($_GET['search']) && $_GET['search']!=""){ ?>
            <a href="index.php" class="reset-search">Reset</a>
        <?php } ?>
    </form>
</section>

<section class="banner-sect">
    <div class="banner-slider">
        <div class="info-track">
            <div class="info-banner">
                <img src="assets/images/BANNER/1.png" alt="">
            </div>
            <div class="info-banner">
                <img src="assets/images/BANNER/2.png" alt="">
            </div>
            <div class="info-banner">
                <img src="assets/images/BANNER/3.png" alt="">
            </div>
        </div>

        <button class="prev">
            <i data-feather="chevron-left"></i>
        </button>
        <button class="next">
            <i data-feather="chevron-right"></i>
        </button>
    </div>
</section>

<section class="menu-recomend">
    <div class="menu-recomend-tittle">
        <h2>Recomendations Menu</h2>
    </div>
    <div class="menu">
        <div class="menu-filter main">
            <button class="filter-btn active" data-category="main">
                Main Course
            </button>
            <button class="filter-btn" data-category="drinks">
                Drinks
            </button>
            <button class="filter-btn" data-category="desserts">
                Dessert & Snack
            </button>
        </div>
        
        <div class="menu-container">
        <?php if(mysqli_num_rows($makanan) > 0){ ?>
            <?php while($item = mysqli_fetch_assoc($makanan)){ ?>
            <div class="menu-card main">
                <div class="menu-img">
                    <img src="assets/images/Menu/<?= $item['gambar']; ?>" alt="<?= $item['nama_menu']; ?>">
                </div>
                <div class="menu-desc">
                    <div class="tittle">
                        <h3><?= $item['nama_menu'] ?></h3>
                    </div>
                    <p>Rp <?= number_format($item['harga'],0,',','.'); ?></p>
                    <div class="rating">
                        <i data-feather="star"></i>
                        <span>
                            <?= number_format($item['rata_rating'],1) ?>
                            (<?= $item['total_review'] ?>)
                        </span>
                        <a href="detail_menus.php?id=<?= $item['id']; ?>">Detail</a>
                    </div>
                </div>

                <div class="menu-footer">
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <input type="hidden" name="nama" value="<?= $item['nama_menu'] ?>">
                        <input type="hidden" name="harga" value="<?= $item['harga'] ?>">
                    
                        <button type="submit" name="cart"  class="cart-btn">
                            <i data-feather="shopping-cart"></i>
                        </button>
                    </form>
                    <a href="payments.php?id=<?= $item['id']; ?>" class="pesan-btn">pesan</a>
                </div>
            </div>
            <?php } ?>

            <?php while($item = mysqli_fetch_assoc($minuman)){ ?>
            <div class="menu-card drinks">
                <div class="menu-img">
                    <img src="assets/images/Menu/<?= $item['gambar']; ?>" alt="<?= $item['nama_menu']; ?>">
                </div>
                <div class="menu-desc">
                    <div class="tittle">
                        <h3><?= $item['nama_menu'] ?></h3>
                    </div>
                    <p>Rp <?= number_format($item['harga'],0,',','.'); ?></p>
                    <div class="rating">
                        <i data-feather="star"></i>
                        <span>
                            <?= number_format($item['rata_rating'],1) ?>
                            (<?= $item['total_review'] ?>)
                        </span>
                        <a href="detail_menus.php?id=<?= $item['id']; ?>">Detail</a>
                    </div>
                </div>
                <div class="menu-footer">
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <input type="hidden" name="nama" value="<?= $item['nama_menu'] ?>">
                        <input type="hidden" name="harga" value="<?= $item['harga'] ?>">
                    
                        <button type="submit" name="cart"  class="cart-btn">
                            <i data-feather="shopping-cart"></i>
                        </button>
                    </form>
                    <a href="payments.php?id=<?= $item['id']; ?>" class="pesan-btn">pesan</a>
                </div>
                
            </div>
            <?php } ?>
        
            <?php while($item = mysqli_fetch_assoc($snack)){ ?>
            <div class="menu-card desserts">
                <div class="menu-img">
                    <img src="assets/images/Menu/<?= $item['gambar']; ?>" alt="<?= $item['nama_menu']; ?>">
                </div>
                <div class="menu-desc">
                    <div class="tittle">
                        <h3><?= $item['nama_menu'] ?></h3>
                    </div>
                    <p>Rp <?= number_format($item['harga'],0,',','.'); ?></p>
                    <div class="rating">
                        <i data-feather="star"></i>
                        <span>
                            <?= number_format($item['rata_rating'],1) ?>
                            (<?= $item['total_review'] ?>)
                        </span>
                        <a href="detail_menus.php?id=<?= $item['id']; ?>">Detail</a>
                    </div>
                </div>
                <div class="menu-footer">
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <input type="hidden" name="nama" value="<?= $item['nama_menu'] ?>">
                        <input type="hidden" name="harga" value="<?= $item['harga'] ?>">
                    
                        <button type="submit" name="cart"  class="cart-btn">
                            <i data-feather="shopping-cart"></i>
                        </button>
                    </form>
                    <a href="payments.php?id=<?= $item['id']; ?>" class="pesan-btn">pesan</a>
                </div>
                
            </div>
            <?php } ?>
        <?php }else{ ?>
            <div class="empty-recommendation">
                Belum ada menu rekomendasi
            </div>
        <?php } ?> 
        </div>
        
    </div>
    
</section>

<?php if(isset($_GET['showLogin']) && $_GET['showLogin'] == 1): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const popup = document.getElementById('popup');
    if (popup) {
        popup.classList.add('active');
    }
});
</script>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
