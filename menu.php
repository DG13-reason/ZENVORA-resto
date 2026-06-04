<?php
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

        <button onclick="filterMenu('all')">
            Semua
        </button>

        <button onclick="filterMenu('makanan')">
            Makanan Berat
        </button>

        <button onclick="filterMenu('snack')">
            Snack
        </button>

        <button onclick="filterMenu('minuman')">
            Minuman
        </button>

    </div>

    <!-- MAKANAN -->
    <div class="kategori makanan">

        <h3 class="judul-kategori">
            🍛 Makanan Berat
        </h3>

        <div class="menu-grid">

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

        <div class="menu-grid">

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
    <div class="kategori minuman">

        <h3 class="judul-kategori">
            🥤 Minuman
        </h3>

<<<<<<< HEAD
        <?php
            $minuman = [
            ["Jus Alpukat","Rp12.000","/assets/images/Menu/JusAlpukat.png"],
            ["Kopi","Rp10.000","img/kopi.jpg"],
            ["Boba Matcha Latte","Rp15.000","img/Matcha.Png"],
            ["Boba Taro","Rp15.000","img/bobataro.jpg"],
            ["Jus Mangga","Rp13.000","img/jusmangga.jpg"],
            ["The Red Oriental","Rp17.000","img/redoriental.jpg"],
            ["Es Teler","Rp15.000","img/esteler.png"],
            ["Boba Brown Sugar","Rp15.000","img/brownsugar.jpg"],
            ["Lemon Tea","Rp13.000","img/lemontea.jpg"],
            ["Smoothies Strawberry","Rp16.000","img/smoothies.jpg"],
            ["Choco Hazelnut Frappe","Rp20.000","img/chocohazelnut.jpg"],
            ["Lychee White Blossom","Rp16.000","img/lychee.jpg"]
        ];
=======
<<<<<<< HEAD
        <div class="menu-grid">

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
=======
    <?php
    $minuman = [
        ["Jus Alpukat","Rp12.000","img/jusalpukat.png"],
        ["Kopi","Rp10.000","img/kopi.jpg"],
        ["Boba Matcha Latte","Rp15.000","img/Matcha.Png"],
        ["Boba Taro","Rp15.000","img/bobataro.jpg"],
        ["Jus Mangga","Rp13.000","img/jusmangga.jpg"],
        ["The Red Oriental","Rp17.000","img/redoriental.jpg"],
        ["Es Teler","Rp15.000","img/esteler.png"],
        ["Boba Brown Sugar","Rp15.000","img/brownsugar.jpg"],
        ["Lemon Tea","Rp13.000","img/lemontea.jpg"],
        ["Smoothies Strawberry","Rp16.000","img/smoothies.jpg"],
        ["Choco Hazelnut Frappe","Rp20.000","img/chocohazelnut.jpg"],
        ["Lychee White Blossom","Rp16.000","img/lychee.jpg"]
    ];
>>>>>>> 74210f57fd1f2ff6345a5c0f6e62cf07a3413849
>>>>>>> c55eba9823e6d29c60e4ce83bd3dc05d5d343c87

                </div>

            </div>

            <?php } ?>

        </div>

    </div>

</section>

<?php
<<<<<<< HEAD
include 'includes/footer.php';   
?>
=======
include 'includes/footer.php';
?>
>>>>>>> 74210f57fd1f2ff6345a5c0f6e62cf07a3413849
