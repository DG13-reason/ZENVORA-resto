<?php
include 'auth_admin.php';
include '../database/koneksi.php';

$pageTitle = "Tambah Menu - Admin ZENVORA";

/** @var mysqli $conn */

$kategori = mysqli_query($conn,
    "SELECT * FROM categories"
);

if(isset($_POST['simpan'])){

    $category_id = $_POST['category_id'];
    $nama_menu = $_POST['nama_menu'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "../assets/images/Menu/".$gambar
    );

    mysqli_query($conn,"
        INSERT INTO menus
        (
            category_id,
            nama_menu,
            deskripsi,
            harga,
            gambar,
            stok
        )
        VALUES
        (
            '$category_id',
            '$nama_menu',
            '$deskripsi',
            '$harga',
            '$gambar',
            '$stok'
        )
    ");

    header("Location: menu.php");
    exit;
}

include 'adminHeader.php';
include 'adminNavbar.php';
?>

<section class="tambah-sect">
    <h1>Tambah Menu</h1>
    <a href="menu.php">
        <button>Kembali</button>
    </a>

    <form method="POST" enctype="multipart/form-data">
        <label>Kategori</label>
        <select name="category_id" required>
            <option value="">
                -- Pilih Kategori --
            </option>
            <?php while($kat = mysqli_fetch_assoc($kategori)): ?>
                <option value="<?= $kat['id']; ?>">
                    <?= $kat['nama_kategori']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Nama Menu</label>
        <input type="text" name="nama_menu" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="5" cols="40"></textarea>

        <label>Harga</label>
        <input type="number" name="harga" required>

        <label>Stok</label>
        <input type="number" name="stok" required>

        <label>Gambar</label>
        <input type="file" name="gambar" required>

        <button type="submit" name="simpan"> Simpan </button>
    </form>
</section>
</body>
</html>