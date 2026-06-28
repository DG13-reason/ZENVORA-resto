<?php

include "auth_admin.php";
include "../database/koneksi.php";

/** @var mysqli $conn */

$id=$_GET['id'];

mysqli_query($conn,"
DELETE FROM meja
WHERE id='$id'
");

echo "

<script>

alert('Meja berhasil dihapus');

window.location='meja.php';

</script>

";