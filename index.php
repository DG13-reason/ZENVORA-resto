<?php
session_start();

if(isset($_SESSION['user'])){
    echo "Selamat datang " . $_SESSION['user']['username'];
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

$makanan = [
    ["Nasi Goreng",20000,"assets/images/Menu/Nasgor.png"],
    ["Bakso",15000,"assets/images/Menu/bakso.png"],
    ["Mie Ayam",15000,"assets/images/Menu/MieAyam.png"]
];

$minuman = [
    ["Jus Alpukat",12000,"assets/images/Menu/jusAlpukat.png"],
    ["Kopi",10000,"assets/images/Menu/kopi.jpg"]
];

$snack = [
    ["French Fries",12000,"assets/images/Menu/French Fries.jpg"],
    ["Sandwich",15000,"assets/images/Menu/Sandwich.jpg"]
];
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
            <?php foreach($makanan as $item){ ?>
            <div class="menu-card main">
                <div class="menu-img">
                    <img src="<?=  $item[2] ?>" alt="<?= $item[0] ?>">
                </div>
                <div class="menu-desc">
                    <div class="tittle">
                        <h3><?= $item[0] ?></h3>
                        <div class="rating">
                            <i data-feather="star"></i>
                            <span>4.5</span>
                        </div>
                    </div>
                    <p>Rp <?= number_format($item[1],0,',','.') ?></p>
                </div>
                <form method="POST">
                    
                    <div class="menu-footer">
                    <button type="submit" name="cart"  class="cart-btn">
                        <i data-feather="shopping-cart"></i>
                    </button>

                    <button class="pesan-btn">pesan</button>
                </div>
                </form>
                
            </div>
            <?php } ?>

            <?php foreach($minuman as $item){ ?>
            <div class="menu-card drinks">
                <div class="menu-img">
                    <img src="<?=  $item[2] ?>" alt="<?= $item[0] ?>">
                </div>
                <div class="menu-desc">
                    <div class="tittle">
                        <h3><?= $item[0] ?></h3>
                        <div class="rating">
                            <i data-feather="star"></i>
                            <span>4.5</span>
                        </div>
                    </div>
                    <p>Rp <?= number_format($item[1],0,',','.') ?></p>
                </div>
                <form method="POST">

                    <div class="menu-footer">
                    <button type="submit" name="cart"  class="cart-btn">
                        <i data-feather="shopping-cart"></i>
                    </button>

                    <button class="pesan-btn">pesan</button>
                </div>
                </form>
                
            </div>
            <?php } ?>

            <?php foreach($snack as $item){ ?>
            <div class="menu-card desserts">
                <div class="menu-img">
                    <img src="<?=  $item[2] ?>" alt="<?= $item[0] ?>">
                </div>
                <div class="menu-desc">
                    <div class="tittle">
                        <h3><?= $item[0] ?></h3>
                        <div class="rating">
                            <i data-feather="star"></i>
                            <span>4.5</span>
                        </div>
                    </div>
                    <p>Rp <?= number_format($item[1],0,',','.') ?></p>
                </div>
                <form method="POST">
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



<?php include 'includes/footer.php'; ?>
