<?php
include 'database/koneksi.php';

if(isset($_GET['area'])){

    $area = mysqli_real_escape_string($conn, $_GET['area']);

    $query = mysqli_query($conn, "
        SELECT *
        FROM meja
        WHERE area='$area'
        AND status='Kosong'
        ORDER BY nomor_meja ASC
    ");

    echo '<option value="">Pilih Nomor Meja</option>';

    while($row = mysqli_fetch_assoc($query)){

        echo '<option value="'.$row['nomor_meja'].'">'.$row['nomor_meja'].'</option>';

    }
}
?>