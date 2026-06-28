<?php
include "auth_admin.php";
include "../database/koneksi.php";

$pageTitle = "Tambah Meja";
/** @var mysqli $conn */


include "adminHeader.php";
include "adminNavbar.php";
?>

<section class="tambah-meja">

<h1>Tambah Meja</h1>

<form action="tambah_meja.php" method="POST">

<label>Area</label>

<select name="area" required>

<option value="">Pilih Area</option>

<option>Indoor</option>

<option>Outdoor</option>

<option>VIP</option>

</select>

<br><br>

<label>Nomor Meja</label>

<input
type="text"
name="nomor_meja"
placeholder="Contoh A01"
required>

<br><br>

<label>Status</label>

<select name="status">

<option>Kosong</option>

<option>Terisi</option>

</select>

<br><br>

<button type="submit" name="simpan">

Simpan

</button>

</form>

</section>

</body>
</html>

<?php

if(isset($_POST['simpan'])){

$area=$_POST['area'];

$nomor=$_POST['nomor_meja'];

$status=$_POST['status'];

mysqli_query($conn,"
INSERT INTO meja(area,nomor_meja,status)

VALUES

('$area','$nomor','$status')
");

echo "

<script>

alert('Meja berhasil ditambahkan');

window.location='meja.php';

</script>

";

}

?>