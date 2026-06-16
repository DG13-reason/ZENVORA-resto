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

// ================= MAKANAN =================
$makanan = [
    ["Nasi Goreng",20000,"assets/images/Menu/Nasgor.png"],
    ["Bakso",15000,"assets/images/Menu/Bakso.png"],
    ["Mie Ayam",15000,"assets/images/Menu/MieAyam.png"],
    ["Nila Bakar",25000,"assets/images/Menu/nila bakar.jpg"],
    ["Rawon",25000,"assets/images/Menu/rawon.jpg"],
    ["Sate Lilit",15000,"assets/images/Menu/sate lilit.jpg"],
    ["Seafood Mix",35000,"assets/images/Menu/seafood mix.jpg"],
    ["Steak",55000,"assets/images/Menu/steak.jpg"],
    ["Plecing Kangkung",10000,"assets/images/Menu/plecing kangkung.jpg"],
    ["Ayam Betutu",35000,"assets/images/Menu/ayam betutu.jpg"],
    ["Capcay",20000,"assets/images/Menu/capcay.jpg"],
    ["Spageti",25000,"assets/images/Menu/spageti.jpg"]
];

// ================= MINUMAN =================
$minuman = [
    ["Alpukat Kocok",12000,"assets/images/Menu/JusAlpukat.png"],
    ["Kopi",10000,"assets/images/Menu/Kopi.jpg"],
    ["Boba Matcha Latte",15000,"assets/images/Menu/Matcha.png"],
    ["Boba Taro",15000,"assets/images/Menu/Boba taro.jpg"],
    ["Jus Mangga",13000,"assets/images/Menu/jus mangga.jpg"],
    ["The Red Oriental",17000,"assets/images/Menu/lacy.jpg"],
    ["Es Teler",15000,"assets/images/Menu/EsTeler.png"],
    ["Boba Brown Sugar",15000,"assets/images/Menu/boba brown sugar.jpg"],
    ["Lemon Tea",13000,"assets/images/Menu/lemontea.jpg"],
    ["Smoothies Strawberry",16000,"assets/images/Menu/smootis.jpg"],
    ["Choco Hazelnut Frappe",20000,"assets/images/Menu/coco hazelnut.jpg"],
    ["Lychee White Blossom",16000,"assets/images/Menu/lacy.jpg"]
];

// ================= DESSERT & CEMILAN =================
$dessert = [
    ["Panna Cotta",17000,"assets/images/Menu/panna cota.jpg"],
    ["Strawberry Parfait",13000,"assets/images/Menu/strawberry parfait.jpg"],
    ["Fried Ice Cream",10000,"assets/images/Menu/fried ice cream.jpg"],
    ["Semifreddo",17000,"assets/images/Menu/semifreddo.jpg"],
    ["Pancake",12000,"assets/images/Menu/pancake.jpg"],
    ["Risol Mayo",15000,"assets/images/Menu/Risol.jpg"],
    ["French Fries",12000,"assets/images/Menu/Kentang.png"],
    ["Sandwich",15000,"assets/images/Menu/sandwich.jpg"],
    ["Brownie Tiramisu",14000,"assets/images/Menu/Brownis.png"],
    ["Momo",16000,"assets/images/Menu/momo.jpg"],
    ["Gyoza",16000,"assets/images/Menu/gyoza.jpg"],
    ["Salted Caramel Ice Cream",15000,"assets/images/Menu/ice cream salt caramel.jpg"]
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

