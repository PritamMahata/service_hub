<div class="sidebar  has-scrollbar" data-mobile-menu>
  <div class="sidebar-category">
    <div class="sidebar-top">
      <h2 class="sidebar-title">Category</h2>
      <button class="sidebar-close-btn" data-mobile-menu-close-btn>
        <ion-icon name="close-outline"></ion-icon>
      </button>
    </div>

    <?php
    $sql = "SELECT c.cname AS category_name, s.subcatname AS subcategory_name 
FROM category c 
LEFT JOIN sub_category s ON c.cid = s.category_id 
ORDER BY c.cname, s.subcatname";

    $result = $conn->query($sql);
    $categories = [];
    while ($row = $result->fetch_assoc()) {
      $categories[$row['category_name']][] = $row['subcategory_name'];
    }

    // Display in HTML
    echo '<ul class="sidebar-menu-category-list">';
    foreach ($categories as $category_name => $subcategories) {
      echo '<li class="sidebar-menu-category">';
      echo '<button class="sidebar-accordion-menu" data-accordion-btn>';
      echo '<div class="menu-title-flex">';
      echo '<img src="./assets/images/icons/' . strtolower(str_replace(' ', '-', $category_name)) . '.png" width="20" height="20" class="menu-title-img">';
      echo '<p class="menu-title">' . htmlspecialchars($category_name) . '</p>';
      echo '</div>';
      echo '<div>';
      echo '<ion-icon name="add-outline" class="add-icon"></ion-icon>';
      echo '<ion-icon name="remove-outline" class="remove-icon"></ion-icon>';
      echo '</div>';
      echo '</button>';

      // Check if there are subcategories to display
      if (!empty($subcategories[0])) {
        echo '<ul class="sidebar-submenu-category-list" data-accordion>';
        foreach ($subcategories as $subcategory_name) {
          if ($subcategory_name) { // Make sure subcategory is not empty
            echo '<li class="sidebar-submenu-category">';
            echo '<a href="#" class="sidebar-submenu-title">';
            echo '<p class="product-name">' . htmlspecialchars($subcategory_name) . '</p>';
            echo '</a>';
            echo '</li>';
          }
        }
        echo '</ul>';
      }

      echo '</li>';
    }
    echo '</ul>';

    // $conn->close();

    ?>

    <!-- <ul class="sidebar-menu-category-list">
      <li class="sidebar-menu-category">
        <button class="sidebar-accordion-menu" data-accordion-btn>
          <div class="menu-title-flex">
            <img src="./assets/images/icons/cable.png" width="20" height="20"
              class="menu-title-img">
            <p class="menu-title">category1</p>
          </div>
          <div>
            <ion-icon name="add-outline" class="add-icon"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
          </div>
        </button>
        <ul class="sidebar-submenu-category-list" data-accordion>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="sidebar-menu-category">
        <button class="sidebar-accordion-menu" data-accordion-btn>
          <div class="menu-title-flex">
            <img src="./assets/images/icons/paint-roller.png" class="menu-title-img" width="20"
              height="20">
            <p class="menu-title">category2</p>
          </div>
          <div>
            <ion-icon name="add-outline" class="add-icon"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
          </div>
        </button>
        <ul class="sidebar-submenu-category-list" data-accordion>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="sidebar-menu-category">
        <button class="sidebar-accordion-menu" data-accordion-btn>
          <div class="menu-title-flex">
            <img src="./assets/images/icons/plumber.png" class="menu-title-img" width="20"
              height="20">
            <p class="menu-title">category3</p>
          </div>
          <div>
            <ion-icon name="add-outline" class="add-icon"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
          </div>
        </button>
        <ul class="sidebar-submenu-category-list" data-accordion>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="sidebar-menu-category">
        <button class="sidebar-accordion-menu" data-accordion-btn>
          <div class="menu-title-flex">
            <img src="./assets/images/icons/sign.png" class="menu-title-img" width="20"
              height="20">
            <p class="menu-title">category4</p>
          </div>
          <div>
            <ion-icon name="add-outline" class="add-icon"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
          </div>
        </button>
        <ul class="sidebar-submenu-category-list" data-accordion>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="sidebar-menu-category">
        <button class="sidebar-accordion-menu" data-accordion-btn>
          <div class="menu-title-flex">
            <img src="./assets/images/icons/home.png" class="menu-title-img" width="20"
              height="20">
            <p class="menu-title">category5</p>
          </div>
          <div>
            <ion-icon name="add-outline" class="add-icon"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
          </div>
        </button>
        <ul class="sidebar-submenu-category-list" data-accordion>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="sidebar-menu-category">
        <button class="sidebar-accordion-menu" data-accordion-btn>
          <div class="menu-title-flex">
            <img src="./assets/images/icons/electronics.png" class="menu-title-img" width="20"
              height="20">

            <p class="menu-title">category6</p>
          </div>

          <div>
            <ion-icon name="add-outline" class="add-icon"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
          </div>

        </button>

        <ul class="sidebar-submenu-category-list" data-accordion>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
        </ul>

      </li>
      <li class="sidebar-menu-category">
        <button class="sidebar-accordion-menu" data-accordion-btn>
          <div class="menu-title-flex">
            <img src="./assets/images/icons/car-wash.png" class="menu-title-img" width="20" height="20">
            <p class="menu-title">category7</p>
          </div>
          <div>
            <ion-icon name="add-outline" class="add-icon"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
          </div>
        </button>
        <ul class="sidebar-submenu-category-list" data-accordion>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
          <li class="sidebar-submenu-category">
            <a href="#" class="sidebar-submenu-title">
              <p class="product-name">sub category</p>
            </a>
          </li>
        </ul>
      </li>
    </ul> -->

  </div>
  <div class="product-showcase">
    <h3 class="showcase-heading">Lorem ipsum</h3>
    <div class="showcase-wrapper">
      <div class="showcase-container">
        <div class="showcase">
          <a href="#" class="showcase-img-box">
            <img src="./assets/images/services/img_1.jpg" width="75" height="75"
              class="showcase-img">
          </a>
          <div class="showcase-content">

            <a href="#">
              <h4 class="showcase-title">Lorem ipsum</h4>
            </a>

            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
            </div>

            <div class="price-box">
              <del>$5.00</del>
              <p class="price">$4.00</p>
            </div>

          </div>
        </div>
        <div class="showcase">
          <a href="#" class="showcase-img-box">
            <img src="./assets/images/services/img_2.jpg" class="showcase-img"
              width="75" height="75">
          </a>
          <div class="showcase-content">
            <a href="#">
              <h4 class="showcase-title">Lorem ipsum</h4>
            </a>
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-half-outline"></ion-icon>
            </div>

            <div class="price-box">
              <del>$17.00</del>
              <p class="price">$7.00</p>
            </div>

          </div>

        </div>
        <div class="showcase">
          <a href="#" class="showcase-img-box">
            <img src="./assets/images/services/img_3.jpg" class="showcase-img" width="75"
              height="75">
          </a>
          <div class="showcase-content">
            <a href="#">
              <h4 class="showcase-title">Lorem ipsum</h4>
            </a>
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-half-outline"></ion-icon>
            </div>
            <div class="price-box">
              <del>$5.00</del>
              <p class="price">$3.00</p>
            </div>

          </div>

        </div>
        <div class="showcase">
          <a href="#" class="showcase-img-box">
            <img src="./assets/images/services/img_4.jpg" class="showcase-img" width="75"
              height="75">
          </a>
          <div class="showcase-content">

            <a href="#">
              <h4 class="showcase-title">Lorem ipsum</h4>
            </a>
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
            </div>

            <div class="price-box">
              <del>$15.00</del>
              <p class="price">$12.00</p>
            </div>

          </div>

        </div>
      </div>
    </div>

  </div>

</div>