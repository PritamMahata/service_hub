<?php require_once('./assets/components/sub_components/menubar/desktop_nav/desktop_nav.php'); 
  ?>
<div class="mobile-bottom-navigation">
  <button class="action-btn" data-mobile-menu-open-btn>
    <ion-icon name="menu-outline"></ion-icon>
  </button>
  <button class="action-btn">
    <ion-icon name="cart"></ion-icon>
    <span class="count">0</span>
  </button>
  <button class="action-btn" onclick="window.location.href='./index.php'">
    <ion-icon name="home-outline"></ion-icon>
  </button>

  <?php
      if ($isLoggedIn) { ?>
        <button class="action-btn" onclick="window.location.href = './task.php'">
          <ion-icon name="calendar"></ion-icon>
          <span class="count">2</span>
        </button>
      <?php } else { ?>
        <button class="action-btn" onclick="window.location.href = './login.php'">
          <ion-icon name="log-in"></ion-icon>
        </button>
      <?php }
      ?>
  <!-- <button class="action-btn">
    <ion-icon name="heart"></ion-icon>
    <span class="count">0</span>
  </button> -->

  <button class="action-btn" data-mobile-menu-open-btn>
    <ion-icon name="grid-outline"></ion-icon>
  </button>
</div>

<?php require_once('./assets/components/sub_components/menubar/mobile_nav/mobile_nav.php');?>