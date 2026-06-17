<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

include "../ZENVORA-resto/includes/header.php";
include "../ZENVORA-resto/includes/navbar.php";

$makanan = mysqli_query($conn, "SELECT * FROM menus Where category_id= 1 ");
$minuman = mysqli_query($conn, "SELECT * FROM menus Where category_id= 2 ");
$snack = mysqli_query($conn, "SELECT * FROM menus Where category_id= 3");
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

            <?php while($item = mysqli_fetch_assoc($makanan)){ ?>

            <div class="menu-card">

                <img src="assets/images/Menu/<?= $item['gambar']; ?>" alt="<?= $item['nama_menu']; ?>">

                <div class="menu-info">

                    <h4><?= $item['nama_menu'] ?></h4>

                    <p>
                        Rp <?= number_format($item['harga'],0,',','.') ?>
                    </p>

                    <form method="POST">

                        <input type="hidden"
                                name="id"
                                value="<?= $item['id'] ?>">

                        <input type="hidden"
                                name="nama"
                                value="<?= $item['nama_menu'] ?>">

                        <input type="hidden"
                                name="harga"
                                value="<?= $item['harga'] ?>">

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

            <?php while($item = mysqli_fetch_assoc($snack)){ ?>

            <div class="menu-card">

                <img src="assets/images/Menu/<?= $item['gambar']; ?>" alt="<?= $item['nama_menu']; ?>">

                <div class="menu-info">

                    <h4><?= $item['nama_menu'] ?></h4>

                    <p>
                        Rp <?= number_format($item['harga'],0,',','.'); ?>
                    </p>

                    <form method="POST">

                        <input type="hidden"
                                name="id"
                                value="<?= $item['id'] ?>">

                        <input type="hidden"
                                name="nama"
                                value="<?= $item['nama_menu'] ?>">

                        <input type="hidden"
                                name="harga"
                                value="<?= $item['harga'] ?>">

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

            <?php while($item = mysqli_fetch_assoc($minuman)){ ?>

            <div class="menu-card">

                <img src="assets/images/Menu/<?= $item['gambar']; ?>" alt="<?= $item['nama_menu']; ?>">

                <div class="menu-info">

                    <h4><?= $item['nama_menu'] ?></h4>

                    <p>
                        Rp <?= number_format($item['harga'],0,',','.'); ?>
                    </p>

                    <form method="POST">

                        <input type="hidden"
                            name="id"
                            value="<?= $item['id'] ?>">

                        <input type="hidden"
                            name="nama"
                            value="<?= $item['nama_menu'] ?>">

                        <input type="hidden"
                            name="harga"
                            value="<?= $item['harga'] ?>">

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
include "../ZENVORA-resto/includes/footer.php";   
?>

