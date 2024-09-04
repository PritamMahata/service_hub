<nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>
  <div class="menu-top">
    <h2 class="menu-title">Menu</h2>
    <button class="menu-close-btn" data-mobile-menu-close-btn>
      <ion-icon name="close-outline"></ion-icon>
    </button>
  </div>
  <ul class="mobile-menu-category-list">
    <li class="menu-category">
      <a href="./index.php" class="menu-title">Home</a>
    </li>
    <li class="menu-category">
      <button class="accordion-menu" data-accordion-btn>
        <p class="menu-title">Lorem ipsum</p>
        <div>
          <ion-icon name="add-outline" class="add-icon"></ion-icon>
          <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
        </div>
      </button>
      <ul class="submenu-category-list" data-accordion>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
      </ul>
    </li>
    <li class="menu-category">
      <button class="accordion-menu" data-accordion-btn>
        <p class="menu-title">Lorem ipsum</p>
        <div>
          <ion-icon name="add-outline" class="add-icon"></ion-icon>
          <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
        </div>
      </button>
      <ul class="submenu-category-list" data-accordion>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
      </ul>
    </li>
    <li class="menu-category">
      <button class="accordion-menu" data-accordion-btn>
        <p class="menu-title">Lorem ipsum</p>
        <div>
          <ion-icon name="add-outline" class="add-icon"></ion-icon>
          <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
        </div>
      </button>
      <ul class="submenu-category-list" data-accordion>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
      </ul>
    </li>
    <li class="menu-category">
      <button class="accordion-menu" data-accordion-btn>
        <p class="menu-title">Lorem ipsum</p>
        <div>
          <ion-icon name="add-outline" class="add-icon"></ion-icon>
          <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
        </div>
      </button>
      <ul class="submenu-category-list" data-accordion>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
        <li class="submenu-category">
          <a href="#" class="submenu-title">Lorem ipsum</a>
        </li>
      </ul>
    </li>
    <li class="menu-category">
      <a href="#" class="menu-title">Lorem ipsum</a>
    </li>
    <li class="menu-category">
      <a href="#" class="menu-title">Lorem ipsum</a>
    </li>
  </ul>
  <div class="menu-bottom">
    <ul class="menu-social-container">
      <?php
      if ($isLoggedIn) { ?>
        <li>
          <a href="./profile.php" class="social-link">
            <ion-icon name="person-circle-outline"></ion-icon>
          </a>
        </li>
      <?php } else { ?>
        <li>
          <a href="./login.php" class="social-link">
            <ion-icon name="calendar-outline"></ion-icon>
          </a>
        </li>
        <li>
          <a href="./signup.php" class="social-link">
            <ion-icon name="calendar-outline"></ion-icon>
          </a>
        </li>
      <?php }
      ?>
    </ul>
  </div>
</nav>