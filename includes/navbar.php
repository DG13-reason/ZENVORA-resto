<?php 
session_start();
include 'header.php';
?>

<nav class="navbar">
    <div class="nav-logo">
        <a href="/ZENVORA-resto/index.php">
            <img src="assets/images/LOGO/ZENVORA.jpeg" alt="logo">
            <h2>ZENVORA <span>Resto</span></h2>
        </a>
    </div>

    <div class="nav-links">
        <a class="nav-user mobile-nav-user" href="profile.php">
            <i data-feather="user"></i>
            <span>Profile</span>
        </a>
        <ul>
            <li><a class="btn-navLinks" href="/ZENVORA-resto/index.php">Home</a></li>
            <li><a class="btn-navLinks" href="/ZENVORA-resto/menu.php">Menu</a></li>
            <li><a class="btn-navLinks" href="/ZENVORA-resto/about.php">About Us</a></li>
        </ul>
    </div>

    <div class="nav-right">

        <a class="btn-cart" href="/ZENVORA-resto/cart.php">
            <i data-feather="shopping-cart"></i>
        </a>

        <?php if(isset($_SESSION['user'])): ?>

            <a class="nav-user logged-in" href="profile.php">

                <?php  if(!empty($_SESSION['user']['foto'])): ?>
                    <img src="uploads/<?php echo $_SESSION['user']['foto']; ?>" class="usr-photo" alt="user">
        
                <?php else: ?>
                    <div class="default-user">
                        <i data-feather="user"></i>
                    </div>
                <?php endif; ?>
            </a>
        
        <?php else: ?>

            <button class="nav-user login-btn" id="openPopup">
                <i data-feather="user"></i>
            </button>

        <?php endif; ?>

        <div class="toggle-menu" id="menuToggle">
            <i data-feather="menu"></i>
        </div>
    </div>
</nav>

<div class="popup-container" id="popup">
    <div class="popup-box">
        <button class="close-popup" id="closePopup">
            &times;
        </button>

        <div class="form-box login-form">
            <h2>Login</h2>

            <form action="/ZENVORA-resto/process/login_process.php" method="post">
                <input type="email" name="email" placeholder="email" required>
                <input type="password" name="password" placeholder="password" required>
                <button type="submit">Login</button>
            </form>

            <p>Don't have an account? <span id="showRegister">Register</span></p>
        </div>
        
        <div class="form-box register-form">
            <h2>Register</h2>
            <form action="/ZENVORA-resto/process/register_process.php" method="post" enctype="multipart/form-data">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <label>Upload Photo (Optional)</label>
                <input type="file" name="foto">
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <span id="showLogin">Login</span></p>
        </div>
    </div>
</div>