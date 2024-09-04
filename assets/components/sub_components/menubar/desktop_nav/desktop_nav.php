<?php
require_once('./env/config.php');
$sql = "SELECT category.cname AS category_name, sub_category.subcatname AS subcategory_name FROM category
        JOIN sub_category ON category.cid = sub_category.category_id
        ORDER BY category.cname ASC, sub_category.subcatname ASC;";
$result = $conn->query($sql);
?>
<nav class="desktop-navigation-menu">
  <div class="container">
    <ul class="desktop-menu-category-list">
      <li class="menu-category">
        <a href="index.php" class="menu-title">Home</a>
      </li>
      <li class="menu-category">
        <a href="./category.php" class="menu-title">Categories</a>
      </li>

      <?php
      $categories = [];
      while ($row = $result->fetch_assoc()) {
        $categories[$row['category_name']][] = $row['subcategory_name'];
      }

      // Display in HTML
      $count = 0;
      foreach ($categories as $category_name => $subcategories) {
        if ($count >= 5) {
          break;
        }
        echo '<li class="menu-category">';
        echo '<a href="#" class="menu-title">' . htmlspecialchars($category_name) . '</a>';
        $count++;
        // Check if there are subcategories to display
        if (!empty($subcategories[0])) {
          echo '<ul class="dropdown-list">';
          foreach ($subcategories as $subcategory_name) {
            echo '<li class="dropdown-item"><a href="#">' . htmlspecialchars($subcategory_name) . '</a></li>';
          }
          echo '</ul>';
        }

        echo '</li>';
      }

      $conn->close();


      ?>

      <!-- <li class="menu-category">
        <a href="#" class="menu-title">category1</a>
        <ul class="dropdown-list">
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
        </ul>
      </li>
      <li class="menu-category">
        <a href="#" class="menu-title">category2</a>
        <ul class="dropdown-list">
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
        </ul>
      </li>
      <li class="menu-category">
        <a href="#" class="menu-title">category3</a>
        <ul class="dropdown-list">
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
        </ul>
      </li>
      <li class="menu-category">
        <a href="#" class="menu-title">category4</a>
        <ul class="dropdown-list">
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
          <li class="dropdown-item">
            <a href="#">sub category</a>
          </li>
        </ul>
      </li>
      <li class="menu-category">
        <a href="#" class="menu-title">category5</a>
      </li>
      <li class="menu-category">
        <a href="#" class="menu-title">category6</a>
      </li> -->
    </ul>
  </div>
</nav>