<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    unset($_SESSION['cart'][$id]);

    header("Location: cart.php");
    exit;
}

if (isset($_GET['tambah'])) {
    $id = $_GET['tambah'];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty']++;
    }

    header("Location: cart.php");
    exit;
}

if (isset($_GET['kurang'])) {
    $id = $_GET['kurang'];

    if (
        isset($_SESSION['cart'][$id]) &&
        $_SESSION['cart'][$id]['qty'] > 1
    ) {
        $_SESSION['cart'][$id]['qty']--;
    }

    header("Location: cart.php");
    exit;
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container">

<h2>🛒 Keranjang Pesanan</h2>

<?php if (empty($_SESSION['cart'])): ?>

<p>Keranjang masih kosong</p>

<a href="menu.php" class="btn checkout">
Kembali ke Menu
</a>

<?php else: ?>

<table>

<tr>
<th>Menu</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Subtotal</th>
<th>Aksi</th>
</tr>

<?php
$total = 0;

foreach ($_SESSION['cart'] as $id => $item):

$subtotal = $item['harga'] * $item['qty'];

$total += $subtotal;
?>

<tr>

<td><?= $item['nama'] ?></td>

<td>
Rp <?= number_format($item['harga']) ?>
</td>

<td>

<a class="btn kurang"
href="?kurang=<?= $id ?>">
-
</a>

<?= $item['qty'] ?>

<a class="btn tambah"
href="?tambah=<?= $id ?>">
+
</a>

</td>

<td>
Rp <?= number_format($subtotal) ?>
</td>

<td>

<a class="btn hapus"
href="?hapus=<?= $id ?>">
Hapus
</a>

</td>

</tr>

<?php endforeach; ?>

</table>

<h3>
Total: Rp <?= number_format($total) ?>
</h3>

<a href="process/checkout_process.php" class="btn checkout">
Checkout
</a>

<?php endif; ?>

</div>

<?php include 'includes/footer.php'; ?>