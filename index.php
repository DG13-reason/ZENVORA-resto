<?php
session_start();

if(isset($_SESSION['user'])){
    echo "Selamat datang " . $_SESSION['user']['username'];
}
?>

<?php include 'includes/header.php'; ?>

<?php include 'includes/navbar.php'; ?>


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
            <div class="menu-card main">
                <div class="menu-img">
                    <img src="assets/images/Menu/Bakso.png" alt="">
                </div>
                <div class="menu-desc">
                    <div class="tittle">
                        <h3>Bakso</h3>
                        <div class="rating">
                            <i data-feather="star"></i>
                            <span>4.5</span>
                        </div>
                    </div>
                    <p>Bakso dengan daging premium</p>
                    <span>Rp25.000</span>
                </div>
                <div class="menu-footer">
                    <button class="cart-btn">
                        <i data-feather="shopping-cart"></i>
                    </button>

                    <button class="pesan-btn">pesan</button>
                </div>
            </div>
            <div class="menu-card main">
                <div class="menu-img">
                    <img src="assets/images/Menu/Bakso.png" alt="">
                </div>
                <div class="menu-desc">
                    <div class="tittle">
                        <h3>Bakso</h3>
                        <div class="rating">
                            <i data-feather="star"></i>
                            <span>4.5</span>
                        </div>
                    </div>
                    <p>Bakso dengan daging premium</p>
                    <span>Rp25.000</span>
                </div>
                <div class="menu-footer">
                    <button class="cart-btn">
                        <i data-feather="shopping-cart"></i>
                    </button>

                    <button class="pesan-btn">pesan</button>
                </div>
            </div>

            <div class="menu-card drinks">
                <div class="menu-img">
                    <img src="assets/images/Menu/Bakso.png" alt="">
                </div>
                <div class="menu-desc">
                    <div class="tittle">
                        <h3>Bakso</h3>
                        <div class="rating">
                            <i data-feather="star"></i>
                            <span>4.5</span>
                        </div>
                    </div>
                    <p>Bakso dengan daging premium</p>
                    <span>Rp25.000</span>
                </div>
                <div class="menu-footer">
                    <button class="cart-btn">
                        <i data-feather="shopping-cart"></i>
                    </button>

                    <button class="pesan-btn">pesan</button>
                </div>
            </div>

            <div class="menu-card desserts">
                <div class="menu-img">
                    <img src="assets/images/Menu/Bakso.png" alt="">
                </div>
                <div class="menu-desc">
                    <div class="tittle">
                        <h3>Bakso</h3>
                        <div class="rating">
                            <i data-feather="star"></i>
                            <span>4.5</span>
                        </div>
                    </div>
                    <p>Bakso dengan daging premium</p>
                    <span>Rp25.000</span>
                </div>
                <div class="menu-footer">
                    <button class="cart-btn">
                        <i data-feather="shopping-cart"></i>
                    </button>

                    <button class="pesan-btn">pesan</button>
                </div>
            </div>
        </div>

        
    </div>

</section>



<?php include 'includes/footer.php'; ?>
