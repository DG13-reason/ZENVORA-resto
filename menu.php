<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// TAMBAH KE KERANJANG
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

// DATA MAKANAN
$makanan = [
    ["Nasi Goreng",20000,"assets/images/nasigoreng.png"],
    ["Bakso",15000,"assets/images/bakso.png"],
    ["Mie Ayam",15000,"assets/images/mieayam.png"],
    ["Nila Bakar",25000,"assets/images/nilabakar.jpg"],
    ["Rawon",25000,"assets/images/rawon.jpg"],
    ["Sate Lilit",15000,"assets/images/satelilit.jpg"],
    ["Seafood Mix",35000,"assets/images/seafoodmix.jpg"],
    ["Steak",55000,"assets/images/steak.jpg"]
];

// DATA SNACK
$snack = [
    ["French Fries",12000,"assets/images/kentang.png"],
    ["Risol Mayo",15000,"assets/images/Risol.png"],
    ["Sandwich",15000,"assets/images/sandwich.jpg"],
    ["Pancake",12000,"assets/images/pancake.jpg"]
];

// DATA MINUMAN
$minuman = [
    ["Jus Alpukat",12000,"assets/images/jusalpukat.png"],
    ["Kopi",10000,"assets/images/kopi.jpg"],
    ["Boba Matcha",15000,"assets/images/matcha.png"],
    ["Boba Taro",15000,"assets/images/bobataro.jpg"]
];
?>

<section class="menu-section">

    <div class="menu-search">
        <input type="text" placeholder="Cari menu...">
    </div>

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

            <?php foreach($makanan as $item){ ?>

            <div class="menu-card">

                <img src="<?= $item[2] ?>" alt="<?= $item[0] ?>">

                <div class="menu-info">

                    <h4><?= $item[0] ?></h4>

                    <p>
                        Rp <?= number_format($item[1],0,',','.') ?>
                    </p>

                    <form method="POST">

                        <input type="hidden"
                                name="id"
                                value="<?= $item[0] ?>">

                        <input type="hidden"
                                name="nama"
                                value="<?= $item[0] ?>">

                        <input type="hidden"
                                name="harga"
                                value="<?= $item[1] ?>">

                        <button
                            type="submit"
                            name="cart"
                            class="btn-cart">

                            🛒 Tambah Keranjang

                        </button>

                    </form>

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

            <?php foreach($snack as $item){ ?>

            <div class="menu-card">

                <img src="<?= $item[2] ?>" alt="<?= $item[0] ?>">

                <div class="menu-info">

                    <h4><?= $item[0] ?></h4>

                    <p>
                        Rp <?= number_format($item[1],0,',','.') ?>
                    </p>

                    <form method="POST">

                        <input type="hidden"
                                name="id"
                                value="<?= $item[0] ?>">

                        <input type="hidden"
                                name="nama"
                                value="<?= $item[0] ?>">

                        <input type="hidden"
                                name="harga"
                                value="<?= $item[1] ?>">

                        <button
                            type="submit"
                            name="cart"
                            class="btn-cart">

                            🛒 Tambah Keranjang

                        </button>

                    </form>

                </div>

            </div>

            <?php } ?>

        </div>

    </div>

    <!-- MINUMAN -->
    <!-- MINUMAN -->
    <div class="kategori minuman">

        <h3 class="judul-kategori">
            🥤 Minuman
        </h3>

        <div class="kategori-grid">

            <?php foreach($minuman as $item){ ?>

            <div class="menu-card">

                <img src="<?= $item[2] ?>" alt="<?= $item[0] ?>">

                <div class="menu-info">

                    <h4><?= $item[0] ?></h4>

                    <p>
                        Rp <?= number_format($item[1],0,',','.') ?>
                    </p>

                    <form method="POST">

                        <input type="hidden"
                            name="id"
                            value="<?= $item[0] ?>">

                        <input type="hidden"
                            name="nama"
                            value="<?= $item[0] ?>">

                        <input type="hidden"
                            name="harga"
                            value="<?= $item[1] ?>">

                        <button
                            type="submit"
                            name="cart"
                            class="btn-cart">

                            🛒 Tambah Keranjang

                        </button>

                    </form>

                </div>

            </div>

            <?php } ?>

        </div>

    </div>

</section>

<?php
include 'includes/footer.php';   
?>
