<?php
session_start();
include 'database/koneksi.php';

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

    header("Location: cart.php");
    exit;
}

include 'includes/header.php';
include 'includes/navbar.php';

$makanan = mysqli_query($conn, "SELECT * FROM menus Where category_id= 1 LIMIT 3");
$minuman = mysqli_query($conn, "SELECT * FROM menus Where category_id= 2 LIMIT 3");
$snack = mysqli_query($conn, "SELECT * FROM menus Where category_id= 3 LIMIT 3");
?>


<section class="search-sect">
    <div class="search-menu">
        <input type="text" placeholder="searching menu">
        <button>
            <i data-feather="search"></i>
        </button>
    </div>
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
            <?php while($item = mysqli_fetch_assoc($makanan)){ ?>
            <div class="menu-card main">
                <div class="menu-img">
                    <img src="assets/images/Menu/<?= $item['gambar']; ?>" alt="<?= $item['nama_menu']; ?>">
                </div>
                <div class="menu-desc">
                    <div class="tittle">
                        <h3><?= $item['nama_menu'] ?></h3>
                        <div class="rating">
                            <i data-feather="star"></i>
                            <span>4.5</span>
                        </div>
                    </div>
                    <p>Rp <?= number_format($item['harga'],0,',','.'); ?></p>
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
                        <div class="rating">
                            <i data-feather="star"></i>
                            <span>4.5</span>
                        </div>
                    </div>
                    <p>Rp <?= number_format($item['harga'],0,',','.'); ?></p>
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <input type="hidden" name="nama" value="<?= $item['nama_menu'] ?>">
                    <input type="hidden" name="harga" value="<?= $item['harga'] ?>">
                    <div class="menu-footer">
                    <button type="submit" name="cart"  class="cart-btn">
                        <i data-feather="shopping-cart"></i>
                    </button>

                    <button type="submit" class="pesan-btn">pesan</button>
                </div>
                </form>
                
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
                        <div class="rating">
                            <i data-feather="star"></i>
                            <span>4.5</span>
                        </div>
                    </div>
                    <p>Rp <?= number_format($item['harga'],0,',','.'); ?></p>
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <input type="hidden" name="nama" value="<?= $item['nama_menu'] ?>">
                    <input type="hidden" name="harga" value="<?= $item['harga'] ?>">
                    <div class="menu-footer">
                    <button type="submit" name="cart"  class="cart-btn">
                        <i data-feather="shopping-cart"></i>
                    </button>

                    <button class="pesan-btn">pesan</button>
                </div>
                </form>
                
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
