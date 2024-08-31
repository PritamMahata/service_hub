<?php
session_start();
$isLoggedIn = isset($_SESSION['uid']);
?>
<header>
  <div class="header-main">
    <div class="container">
      <a href="./index.php" class="header-logo">
        <img src="./assets/images/logo/logo.png" width="120" height="36">
      </a>
      <div class="header-search-container">
        <input type="search" name="search" class="search-field" placeholder="Search your service...">
        <button class="search-btn">
          <ion-icon name="search-outline"></ion-icon>
        </button>
      </div>
      <div class="header-user-actions">
        <!-- wishlist -->
        <!-- <button class="action-btn">
          <ion-icon name="heart"></ion-icon>
          <span class="count">5</span>
        </button> -->
        <button class="action-btn">
          <ion-icon name="cart"></ion-icon>
          <span class="count">2</span>
        </button>

        <?php if ($isLoggedIn) { ?>
          <button class="action-btn" onclick="window.location.href = './logout.php'">
            <ion-icon name="log-out-outline"></ion-icon>
          </button>
        <?php } else { ?>
          <button class="action-btn" onclick="window.location.href = './login.php'">
            <ion-icon name="log-in-outline"></ion-icon>
          </button>
        <?php } ?>

        <!-- <button class="action-btn">
          <ion-icon name="person-circle-outline"></ion-icon>
        </button> -->


      </div>
    </div>
  </div>
  <?php
  require_once('sub_components/menubar/menubar.php');
  ?>
</header>