

include 'includes/header.php';
include 'includes/navbar.php';

<section class="menu-section">

    <div class="menu-search">
        <input type="text" placeholder="searching">
    </div>

    <h2 class="menu-title">MAKANAN</h2>
    <p class="menu-subtitle">
        Pilih makanan favoritmu dari berbagai pilihan lezat kami.
    </p>

    <div class="menu-kategori">
        <button class="active">Semua</button>
        <button>Makanan Berat</button>
        <button>Snack</button>
        <button>Minuman</button>
    </div>

    <!-- MAKANAN BERAT -->
    <h3 class="judul-kategori">Makanan Berat</h3>

    <div class="menu-grid">

        <!-- 12 Menu Makanan -->
        <?php
        $makanan = [
            ["Nasi Goreng","Rp20.000","img/nasigoreng.png"],
            ["Bakso","Rp15.000","img/bakso.png"],
            ["Mie Ayam","Rp15.000","img/mieayam.png"],
            ["Nila Bakar","Rp25.000","img/nilabakar.jpg"],
            ["Rawon","Rp25.000","img/rawon.jpg"],
            ["Sate Lilit","Rp15.000","img/satelilit.jpg"],
            ["Seafood Mix","Rp35.000","img/seafoodmix.jpg"],
            ["Steak","Rp55.000","img/steak.jpg"],
            ["Plecing Kangkung","Rp10.000","img/plecingkangkung.jpg"],
            ["Ayam Betutu","Rp35.000","img/ayambetutu.jpg"],
            ["Capcay","Rp20.000","img/capcay.jpg"],
            ["Spagetti","Rp25.000","img/spagetti.jpg"]
        ];

        foreach($makanan as $item){
            echo "
            <div class='menu-card'>
                <img src='{$item[2]}' alt='{$item[0]}'>
                <div class='menu-info'>
                    <h4>{$item[0]}</h4>
                    <p>{$item[1]}</p>
                </div>
            </div>";
        }
        ?>
    </div>

    <!-- MINUMAN -->
    <h3 class="judul-kategori">Minuman</h3>

    <div class="menu-grid">

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

        foreach($minuman as $item){
            echo "
            <div class='menu-card'>
                <img src='{$item[2]}' alt='{$item[0]}'>
                <div class='menu-info'>
                    <h4>{$item[0]}</h4>
                    <p>{$item[1]}</p>
                </div>
            </div>";
        }
        ?>
    </div>

    <!-- DESSERT -->
    <h3 class="judul-kategori">Dessert</h3>

    <div class="menu-grid">

        <?php
        $dessert = [
            ["Panna Cotta","Rp17.000","img/pannacotta.jpg"],
            ["Strawberry Parfait","Rp15.000","img/parfait.jpg"],
            ["Fried Ice Cream","Rp10.000","img/friedicecream.jpg"],
            ["Semifreddo","Rp17.000","img/semifreddo.jpg"],
            ["Pancake","Rp12.000","img/pancake.jpg"],
            ["Risol Mayo","Rp15.000","img/Risol.png"],
            ["French Fries","Rp12.000","img/kentang.png"],
            ["Sandwich","Rp15.000","img/sandwich.jpg"],
            ["Brownie Tiramisu","Rp14.000","img/brownietiramisu.jpg"],
            ["Momo","Rp16.000","img/momo.jpg"],
            ["Gyoza","Rp16.000","img/gyoza.jpg"],
            ["Salted Caramel Ice Cream Squares","Rp15.000","img/saltedcaramel.jpg"]
        ];

        foreach($dessert as $item){
            echo "
            <div class='menu-card'>
                <img src='{$item[2]}' alt='{$item[0]}'>
                <div class='menu-info'>
                    <h4>{$item[0]}</h4>
                    <p>{$item[1]}</p>
                </div>
            </div>";
        }
        ?>
    </div>

</section>

<?php
include 'includes/footer.php';
?>


include 'includes/footer.php'