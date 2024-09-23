<?php
?>
<div class="mobile-bottom-navigation">
  <button class="action-btn" data-mobile-menu-open-btn>
    <ion-icon name="menu-outline"></ion-icon>
  </button>
  <button class="action-btn" onclick="window.location.href = './task.php'">
    <ion-icon name="calendar"></ion-icon>
    <span class="count"><?php echo mysqli_num_rows($result); ?></span>
  </button>
  <button class="action-btn" onclick="window.location.href='./index.php'">
    <ion-icon name="home"></ion-icon>
  </button>
  <button class="action-btn" onclick="window.location.href = './profile.php'">
    <ion-icon name="person-circle-outline"></ion-icon>
  </button>
  <button class="action-btn" data-mobile-menu-open-btn>
    <ion-icon name="grid-outline"></ion-icon>
  </button>
</div>
<?php require_once('./assets/components/sub_components/menubar/mobile_nav/mobile_nav.php'); ?>