<?php
SESSION_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];
?>

<div class="profile-container">

    <?php if(!empty($user['foto'])): ?>
        <img src="Uploads/<?php echo $user['foto']; ?>" alt="">
    <?php endif; ?>

    <h2><?php echo $user['username']; ?></h2>
    <p><?php echo $user['email']; ?></p>
    <p>Role : <?php echo $user['role']; ?></p>

    <a href="process/logout.php">
        <button>Log Out</button>
    </a>

</div>