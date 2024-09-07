<?php
if (isset($_SESSION['email'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}
?>
<header>
    <div class="header-main">
        <div class="container">
            <a href="./index.php" class="header-logo">
                <img src="./assets/images/logo/logo.png" width="120" height="36">
            </a>
            <div class="header-search-container">
                <form action="category.php" method="GET">
                    <input type="search" name="search" class="search-field" placeholder="Search your service...">
                    <button class="search-btn" type="submit">
                        <span class="material-symbols-rounded" name="search-outline">search</span>
                    </button>
                </form>
            </div>
            <div class="header-user-actions">
                <?php
                if ($isLoggedIn) { ?>
                    <button class="action-btn" onclick="window.location.href = './task.php'">
                        <ion-icon name="calendar"></ion-icon>
                        <span class="count">2</span>
                    </button>
                    <button class="action-btn" onclick="window.location.href = './profile.php'">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </button>
                <?php } else { ?>
                    <button class="action-btn sidebyside relog_btn" onclick="window.location.href = './signup.php'">
                        <span class="material-symbols-rounded" style= "font-size: 1.9rem;">person_add</span>

                        <h6 class="relog_text">Sign Up</h6>
                    </button>
                    <button class="action-btn sidebyside relog_btn" onclick="window.location.href = './login.php'">
                        <span class="material-symbols-rounded" style= "font-size: 1.9rem;">login</span>
                        <h6 class="relog_text">Login</h6>
                    </button>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <?php
    require_once('sub_components/menubar/menubar.php');
    ?>
</header>