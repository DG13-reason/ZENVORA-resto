<?php
include "auth_admin.php";
include "../database/koneksi.php";

/** @var mysqli $conn */

$pageTitle = "Edit Menu";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM menus WHERE id='$id'")
);

$kategori = mysqli_query(
    $conn,
    "SELECT * FROM categories"
);

if(isset($_POST['update'])){

    $category_id = $_POST['category_id'];
    $nama_menu   = $_POST['nama_menu'];
    $deskripsi   = $_POST['deskripsi'];
    $harga       = $_POST['harga'];
    $stok        = $_POST['stok'];

    // gambar lama
    $gambar = $data['gambar'];

    // jika upload gambar baru
    if(isset($_FILES['gambar']) && $_FILES['gambar']['name'] != ""){

        $gambar = time()."_".$_FILES['gambar']['name'];

        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            "../assets/images/Menu/".$gambar
        );
    }

    mysqli_query($conn,"
        UPDATE menus SET

        category_id='$category_id',
        nama_menu='$nama_menu',
        deskripsi='$deskripsi',
        harga='$harga',
        gambar='$gambar',
        stok='$stok'

        WHERE id='$id'
    ");

    echo "
    <script>
        alert('Menu berhasil diperbarui');
        window.location='menu.php';
    </script>
    ";
}

include "adminHeader.php";
include "adminNavbar.php";
?>

<section class="edit-menu">

    <h1>Edit Menu</h1>

    <form method="POST" enctype="multipart/form-data">

        <label>Kategori</label>

        <select name="category_id" required>

            <?php while($kat=mysqli_fetch_assoc($kategori)){ ?>

            <option
                value="<?= $kat['id']; ?>"
                <?= $kat['id']==$data['category_id'] ? "selected" : ""; ?>>

                <?= $kat['nama_kategori']; ?>

            </option>

            <?php } ?>

        </select>

        <label>Nama Menu</label>

        <input
            type="text"
            name="nama_menu"
            value="<?= htmlspecialchars($data['nama_menu']); ?>"
            required>

        <label>Deskripsi</label>

        <textarea
            name="deskripsi"
            rows="5"
            required><?= htmlspecialchars($data['deskripsi']); ?></textarea>

        <label>Gambar Saat Ini</label>

        <img
            src="../assets/images/Menu/<?= $data['gambar']; ?>"
            width="180">

        <label>Ganti Gambar</label>

        <input
            type="file"
            name="gambar"
            accept="image/*">

        <label>Harga</label>

        <input
            type="number"
            name="harga"
            value="<?= $data['harga']; ?>"
            required>

        <label>Stok</label>

        <input
            type="number"
            name="stok"
            value="<?= $data['stok']; ?>"
            required>

        <button
            type="submit"
            name="update">

            Update Menu

        </button>

    </form>

</section>

</body>
</html>