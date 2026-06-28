<?php
include 'auth_admin.php';
include '../database/koneksi.php';

$pageTitle = "Menu - Admin ZENVORA";

/** @var mysqli $conn */

$query = mysqli_query($conn,"
    SELECT
        menus.*,
        categories.nama_kategori
    FROM menus
    JOIN categories
    ON menus.category_id = categories.id
    ORDER BY menus.id DESC
");

include 'adminHeader.php';
include 'adminNavbar.php'
?>

<section class="admin-menu">
    <h1>Kelola Menu</h1>
    <a href="tambah_menu.php">
        <button>Tambah Menu</button>
    </a>

    <div class="admin-table">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Nama Menu</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>

            <?php while($menu = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td class="menus-id"><?= $menu['id']; ?></td>
                <td>
                    <img src="../assets/images/Menu/<?= $menu['gambar']; ?>">
                </td>
                <td><?= $menu['nama_menu']; ?></td>
                <td><?= $menu['nama_kategori']; ?></td>
                <td>Rp <?= number_format($menu['harga']); ?></td>
                <td><?= $menu['stok']; ?></td>
                <td>
                    <a href="edit_menu.php?id=<?= $menu['id']; ?>">Edit</a>
                    <a href="hapus_menu.php?id=<?= $menu['id']; ?>"onclick="return confirm('Hapus menu ini?')"><span>Hapus</span></a>
                </td>
            </tr>

            <?php endwhile; ?>
        </table>
    </div>
</section>


</body>
</html>