<?php
include "auth_admin.php";
include "../database/koneksi.php";

$pageTitle = "Kelola Meja";
/** @var mysqli $conn */


$query = mysqli_query($conn, "SELECT * FROM meja ORDER BY area, nomor_meja");

include "adminHeader.php";
include "adminNavbar.php";
?>

<section class="admin-meja">

    <h1>Kelola Meja</h1>
    <a href="tambah_meja.php" class="btn-tambah">
        + Tambah Meja
    </a>
    <table class="admin-table">
        <tr>
            <th>No</th>
            <th>Area</th>
            <th>Nomor Meja</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no=1;
        while($row=mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['area'] ?></td>
            <td><?= $row['nomor_meja'] ?></td>
            <td>
                <?php if($row['status']=="Kosong"){ ?>
                <span class="status-kosong">
                Kosong
                </span>

                <?php }else{ ?>

                <span class="status-terisi">
                Terisi
                </span>

                <?php 
                } 
                ?>      
            </td>
            <td>
                <a class="btn-edit" href="edit_meja.php?id=<?= $row['id'] ?>">Edit</a>
                |
                <a class="btn-hapus" href="hapus_meja.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus meja ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</section>

</body>
</html>