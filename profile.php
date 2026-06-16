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
            <?php if(!empty($user['foto'])): ?>
            <img src="Uploads/<?php echo $user['foto']; ?>" alt="">
            <?php endif; ?>
        </div>

    
        <div class="profile-desc">
            <h2>Username : <?php echo $user['username']; ?></h2>
            <h3>Email: <?php echo $user['email']; ?></h3>
            <h3>Role : <?php echo $user['role']; ?></h3>
            <a href="#"><h3>History</h3></a>

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