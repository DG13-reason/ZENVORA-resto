<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}
?>

<?php include 'includes/header.php'; ?>

<?php include 'includes/navbar.php'; ?>

<div class="profile-container">

    <h1>
        Welcome,
        <?php echo $_SESSION['user']['username']; ?>
    </h1>

    <?php if(!empty($_SESSION['user']['foto'])): ?>

        <img 
            src="uploads/<?php echo $_SESSION['user']['foto']; ?>"
            class="profile-photo"
            alt="profile"
        >

    <?php else: ?>

        <p>User tidak memakai foto profile</p>

    <?php endif; ?>

    <br><br>

    <a href="logout.php">
        Logout
    </a>

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>