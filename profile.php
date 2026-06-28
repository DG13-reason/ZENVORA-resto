<?php
SESSION_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];

include "../ZENVORA-resto/includes/header.php";
include "../ZENVORA-resto/includes/navbar.php";
?>

<div class="profile-container">
    <h1>PROFILE</h1>
    <div class="profile-content">
        <div class="foto-profile">
            <?php if(!empty($user['foto'])){ ?>
                <img src="uploads/profile/<?= $user['foto']; ?>" alt="Profile">
            <?php }else{ ?>
            <div class="default-profile">
                <i data-feather="user"></i>
            </div>
            <?php } ?>
            <a href="edit_profile.php" class="edit-foto">
                Edit Profile
            </a>
        </div>

        <div class="profile-desc">
            <h2>Username : <?php echo $user['username']; ?></h2>
            <h3>Email: <?php echo $user['email']; ?></h3>
            <div class="profile-menu">
                <a href="history.php" class="btn-profile">History Pesanan</a>
                <a href="edit_profile.php" class="btn-profile">Edit Profile</a>
            </div>
            <h3>Role : <?php echo $user['role']; ?></h3>
            
            <div class="profile-log">
                <a href="process/logout.php">
                    <button>Log Out</button>
                </a>
            </div>
            
        </div>
    </div>
</div>

<?php 
include "../ZENVORA-resto/includes/footer.php";
?>