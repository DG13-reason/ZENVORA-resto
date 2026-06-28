<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'database/koneksi.php';

if (!isset($_SESSION['user'])) {
    echo "<script>
        alert('Silakan login terlebih dahulu!');
        window.location.href='index.php?showLogin=1';
    </script>";
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM menus");

if(isset($_SESSION['user'])){
    $username = $_SESSION['user']['username'];
}

if(isset($_POST['cart'])){

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

include "../ZENVORA-resto/includes/header.php";
include "../ZENVORA-resto/includes/navbar.php";

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
AND menus.nama_menu LIKE '%$keyword%'
GROUP BY menus.id
");

$snack = mysqli_query($conn,"
SELECT menus.*,
IFNULL(AVG(reviews.rating),0) AS rata_rating,
COUNT(reviews.id) AS total_review
FROM menus
LEFT JOIN reviews
ON menus.id = reviews.menu_id
WHERE menus.category_id = 3
AND menus.nama_menu LIKE '%$keyword%'
GROUP BY menus.id
");

$minuman = mysqli_query($conn,"
SELECT menus.*,
IFNULL(AVG(reviews.rating),0) AS rata_rating,
COUNT(reviews.id) AS total_review
FROM menus
LEFT JOIN reviews
ON menus.id = reviews.menu_id
WHERE menus.category_id = 2
AND menus.nama_menu LIKE '%$keyword%'
GROUP BY menus.id
");
?>

<section class="menu-section">

    <form method="GET" class="menu-search">
        <input type="text" name="search" placeholder="searching menu" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        <?php if(isset($_GET['search']) && $_GET['search']!=""){ ?>
            <a href="menu.php" class="reset-search">Reset</a>
        <?php } ?>
    </form>

    <h2 class="menu-title">MENU RESTORAN</h2>

    <p class="menu-subtitle">
        Pilih makanan favoritmu dari berbagai pilihan lezat kami.
    </p>

    <div class="menu-kategori">

        <button type="button" class="active" onclick="filterMenu('all', this)">
            Semua
        </button>

        <button type="button" onclick="filterMenu('makanan', this)">
            Makanan Berat
        </button>

        <button type="button" onclick="filterMenu('snack', this)">
            Snack
        </button>

        <button type="button" onclick="filterMenu('minuman', this)">
            Minuman
        </button>

    </div>

    <!-- MAKANAN -->
    <div class="kategori makanan">
        <h3 class="judul-kategori">
            🍛 Makanan Berat
        </h3>

        <div class="kategori-grid">
            <?php while($item = mysqli_fetch_assoc($makanan)){ ?>
            <div class="menu-card">
                <img src="assets/images/Menu/<?= $item['gambar']; ?>" alt="<?= $item['nama_menu']; ?>">
                <div class="menu-info">
                    <h4><?= $item['nama_menu'] ?></h4>
                    <p>
                        Rp <?= number_format($item['harga'],0,',','.') ?>
                    </p>
                    <div class="rating">
                        <i data-feather="star" class="star"></i>
                        <span>
                            <?= number_format($item['rata_rating'],1); ?>
                            (<?= $item['total_review']; ?>)
                        </span>
                        <a href="detail_menus.php?id=<?= $item['id']; ?>">Detail</a>
                    </div>
                </div>
                <div class="menu-footer">
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <input type="hidden" name="nama" value="<?= $item['nama_menu'] ?>">
                        <input type="hidden" name="harga" value="<?= $item['harga'] ?>">
                        <button type="submit" name="cart" class="btn-cart">
                            <i data-feather="shopping-cart"></i>
                        </button>
                    </form>
                    <a href="payments.php?id=<?= $item['id']; ?>" class="pesan-btn">Pesan</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- SNACK -->
    <div class="kategori snack">
        <h3 class="judul-kategori">
            🍟 Snack
        </h3>
        <div class="kategori-grid">
            <?php while($item = mysqli_fetch_assoc($snack)){ ?>
            <div class="menu-card">
                <img src="assets/images/Menu/<?= $item['gambar']; ?>" alt="<?= $item['nama_menu']; ?>">
                <div class="menu-info">
                    <h4><?= $item['nama_menu'] ?></h4>
                    <p>
                        Rp <?= number_format($item['harga'],0,',','.'); ?>
                    </p>
                    <div class="rating">
                        <i data-feather="star" class="star"></i>
                        <span>
                            <?= number_format($item['rata_rating'],1); ?>
                            (<?= $item['total_review']; ?>)
                        </span>
                        <a href="detail_menus.php?id=<?= $item['id']; ?>">Detail</a>
                    </div>
                </div>
                <div class="menu-footer">
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <input type="hidden" name="nama" value="<?= $item['nama_menu'] ?>">
                        <input type="hidden" name="harga" value="<?= $item['harga'] ?>">
                        <button type="submit" name="cart" class="btn-cart">
                            <i data-feather="shopping-cart"></i>
                        </button>
                    </form>
                    <a href="payments.php?id=<?= $item['id']; ?>" class="pesan-btn">Pesan</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- MINUMAN -->
    <div class="kategori minuman">
        <h3 class="judul-kategori">
            🥤 Minuman
        </h3>
        <div class="kategori-grid">
            <?php while($item = mysqli_fetch_assoc($minuman)){ ?>
            <div class="menu-card">
                <img src="assets/images/Menu/<?= $item['gambar']; ?>" alt="<?= $item['nama_menu']; ?>">
                <div class="menu-info">
                    <h4><?= $item['nama_menu'] ?></h4>
                    <p>
                        Rp <?= number_format($item['harga'],0,',','.'); ?>
                    </p>
                    <div class="rating">
                        <i data-feather="star" class="star"></i>
                        <span>
                            <?= number_format($item['rata_rating'],1); ?>
                            (<?= $item['total_review']; ?>)
                        </span>
                        <a href="detail_menus.php?id=<?= $item['id']; ?>">Detail</a>
                    </div>
                </div>
                <div class="menu-footer">
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <input type="hidden" name="nama" value="<?= $item['nama_menu'] ?>">
                        <input type="hidden" name="harga" value="<?= $item['harga'] ?>">
                        <button type="submit" name="cart" class="btn-cart">
                            <i data-feather="shopping-cart"></i>
                        </button>
                    </form>
                    <a href="payments.php?id=<?= $item['id']; ?>" class="pesan-btn">Pesan</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php
include "../ZENVORA-resto/includes/footer.php";   
?>

