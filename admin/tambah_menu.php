<?php
include 'auth_admin.php';
include '../database/koneksi.php';

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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
</head>
<body>

<h1>Tambah Menu</h1>

<form method="POST" enctype="multipart/form-data">

<label>Kategori</label>
<br>

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

<br><br>

<label>Nama Menu</label>
<br>

<input
    type="text"
    name="nama_menu"
    required>

<br><br>

<label>Deskripsi</label>
<br>

<textarea
    name="deskripsi"
    rows="5"
    cols="40">
</textarea>

<br><br>

<label>Harga</label>
<br>

<input
    type="number"
    name="harga"
    required>

<br><br>

<label>Stok</label>
<br>

<input
    type="number"
    name="stok"
    required>

<br><br>

<label>Gambar</label>
<br>

<input
    type="file"
    name="gambar"
    required>

<br><br>

<button
    type="submit"
    name="simpan">
    Simpan
</button>

</form>

</body>
</html>