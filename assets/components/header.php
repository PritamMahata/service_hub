<header>
  <div class="header-main">
    <div class="container">
      <a href="#" class="header-logo">
        <img src="./assets/images/logo/logo.png" width="120" height="36">
      </a>
      <div class="header-search-container">
        <input type="search" name="search" class="search-field" placeholder="Search your service...">
        <button class="search-btn">
          <ion-icon name="search-outline"></ion-icon>
        </button>
      </div>
      <div class="header-user-actions">
        <button class="action-btn">
          <ion-icon name="heart"></ion-icon>
          <span class="count">5</span>
        </button>
        <button class="action-btn">
          <ion-icon name="cart"></ion-icon>
          <span class="count">2</span>
        </button>
        <button class="action-btn">
          <ion-icon name="person-circle-outline"></ion-icon>
        </button>
      </div>
    </div>
  </div>
  <?php
  require_once('sub_components/menubar/menubar.php');
  ?>
</header>