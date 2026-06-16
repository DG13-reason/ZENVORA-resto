<?php
include 'auth_admin.php';
include '../database/koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM menus WHERE id='$id'"
    )
);

$kategori = mysqli_query(
    $conn,
    "SELECT * FROM categories"
);

if(isset($_POST['update'])){

    $category_id = $_POST['category_id'];
    $nama_menu = $_POST['nama_menu'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($conn,"
        UPDATE menus
        SET
        category_id='$category_id',
        nama_menu='$nama_menu',
        deskripsi='$deskripsi',
        harga='$harga',
        stok='$stok'
        WHERE id='$id'
    ");

    header("Location: menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
</head>
<body>

<h1>Edit Menu</h1>

<form method="POST">

<label>Kategori</label>
<br>

<select name="category_id">

<?php while($kat = mysqli_fetch_assoc($kategori)): ?>

<option
    value="<?= $kat['id']; ?>"
    <?= $kat['id']==$data['category_id']
        ? 'selected'
        : ''; ?>
>
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
    value="<?= $data['nama_menu']; ?>">

<br><br>

<label>Deskripsi</label>
<br>

<textarea
    name="deskripsi"
    rows="5"
    cols="40"><?= $data['deskripsi']; ?></textarea>

<br><br>

<label>Harga</label>
<br>

<input
    type="number"
    name="harga"
    value="<?= $data['harga']; ?>">

<br><br>

<label>Stok</label>
<br>

<input
    type="number"
    name="stok"
    value="<?= $data['stok']; ?>">

<br><br>

<button
    type="submit"
    name="update">
    Update
</button>

</form>

</body>
</html>