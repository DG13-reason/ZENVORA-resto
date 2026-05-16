<?php include 'header.php';?>

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

        <a class="btn-cart" href="">
            <i data-feather="shopping-cart"></i>
        </a>

        <a class="nav-user" href="profile.php">
            <i data-feather="user"></i>
        </a>

        <div class="toggle-menu" id="menuToggle">
            <i data-feather="menu"></i>
        </div>
    </div>

    
</nav>