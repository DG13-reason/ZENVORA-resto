<?php
session_start();
include "database/koneksi.php";

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit;
}

$user = $_SESSION['user'];

include "includes/header.php";
include "includes/navbar.php";
?>

<section class="edit-profile-container">

    <div class="edit-profile-card">

        <h1>Edit Profile</h1>

        <form action="process/edit_profile_process.php"
        method="POST"
        enctype="multipart/form-data">

            <div class="foto-area">

                <?php if(!empty($user['foto'])){ ?>

                    <img src="uploads/profile/<?= $user['foto']; ?>">

                <?php }else{ ?>

                    <div class="default-profile">
                        <i data-feather="user"></i>
                    </div>

                <?php } ?>

                <input
                type="file"
                name="foto"
                accept="image/*">

            </div>

            <div class="input-group">

                <label>Username</label>

                <input
                type="text"
                name="username"
                value="<?= $user['username']; ?>"
                required>

            </div>

            <div class="input-group">

                <label>Email</label>

                <input
                type="email"
                name="email"
                value="<?= $user['email']; ?>"
                required>

            </div>

            <div class="input-group">

                <label>Password Baru</label>

                <input
                type="password"
                name="password"
                placeholder="Kosongkan jika tidak ingin mengganti">

            </div>

            <button
            type="submit"
            class="btn-save">

                Simpan Perubahan

            </button>

        </form>

    </div>

</section>

<?php
include "includes/footer.php";
?>