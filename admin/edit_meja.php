<?php

include "auth_admin.php";
include "../database/koneksi.php";

/** @var mysqli $conn */


$id=$_GET['id'];

$data=mysqli_fetch_assoc(

mysqli_query($conn,"
SELECT * FROM meja
WHERE id='$id'
")

);

$pageTitle="Edit Meja";

include "adminHeader.php";
include "adminNavbar.php";
?>

<section class="edit-meja">

<h1>Edit Meja</h1>

<form method="POST">

<label>Area</label>

<select name="area">

<option <?= $data['area']=="Indoor"?"selected":"" ?>>Indoor</option>

<option <?= $data['area']=="Outdoor"?"selected":"" ?>>Outdoor</option>

<option <?= $data['area']=="VIP"?"selected":"" ?>>VIP</option>

</select>

<br><br>

<label>Nomor Meja</label>

<input
type="text"
name="nomor_meja"
value="<?= $data['nomor_meja'] ?>">

<br><br>

<label>Status</label>

<select name="status">

<option <?= $data['status']=="Kosong"?"selected":"" ?>>Kosong</option>

<option <?= $data['status']=="Terisi"?"selected":"" ?>>Terisi</option>

</select>

<br><br>

<button
type="submit"
name="update">

Update

</button>

</form>

</section>

</body>
</html>

<?php

if(isset($_POST['update'])){

$area=$_POST['area'];

$nomor=$_POST['nomor_meja'];

$status=$_POST['status'];

mysqli_query($conn,"
UPDATE meja

SET

area='$area',

nomor_meja='$nomor',

status='$status'

WHERE id='$id'
");

echo "

<script>

alert('Data berhasil diupdate');

window.location='meja.php';

</script>

";

}

?>