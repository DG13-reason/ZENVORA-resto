<?php
session_start();

include 'database/Koneksi.php';

if (isset($_POST['cart'])) {

$id = $_POST['id'];

if (isset($_SESSION['cart'][$id])) {

$_SESSION['cart'][$id]['qty']++;

} else {

$_SESSION['cart'][$id] = [
'nama' => $_POST['nama'],
'harga' => $_POST['harga'],
'qty' => 1
];

}

header("Location: cart.php");
exit;

}

$query =
mysqli_query(
$conn,
"SELECT * FROM menu"
);

include 'includes/header.php';
include 'includes/navbar.php';
?>

<style>

.container{
width:90%;
margin:auto;
padding:30px;
}

.judul{
text-align:center;
margin-bottom:30px;
}

.menu-grid{
display:grid;
grid-template-columns:
repeat(auto-fit,minmax(250px,1fr));

gap:20px;
}

.card{

background:white;

padding:20px;

border-radius:10px;

box-shadow:
0 2px 10px rgba(0,0,0,.1);

text-align:center;

}

.card h3{
margin-bottom:10px;
}

.harga{

color:#007bff;

font-weight:bold;

margin-bottom:15px;

}

.btn{

background:#28a745;

color:white;

border:none;

padding:10px 18px;

border-radius:8px;

cursor:pointer;

}

.btn:hover{

opacity:.9;

}

</style>

<div class="container">

<h1 class="judul">
🍽 Daftar Menu
</h1>

<div class="menu-grid">

<?php while($row = mysqli_fetch_assoc($query)): ?>

<div class="card">

<h3>
<?= $row['nama_menu'] ?>
</h3>

<div class="harga">

Rp
<?= number_format($row['harga']) ?>

</div>

<form method="POST">

<input
type="hidden"
name="id"
value="<?= $row['id'] ?>">

<input
type="hidden"
name="nama"
value="<?= $row['nama_menu'] ?>">

<input
type="hidden"
name="harga"
value="<?= $row['harga'] ?>">

<button
type="submit"
name="cart"
class="btn">

Tambah Keranjang

</button>

</form>

</div>

<?php endwhile; ?>

</div>

</div>

<?php include 'includes/footer.php'; ?>