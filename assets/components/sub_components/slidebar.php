<div class="sidebar  has-scrollbar" data-mobile-menu>
    <div class="sidebar-category">
        <div class="sidebar-top">
            <h2 class="sidebar-title">Category</h2>
            <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                <span class="material-symbols-rounded">close</span>
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
        ?>
        <ul class="sidebar-menu-category-list">
            <?php
            foreach ($categories as $category_name => $subcategories) { ?>
            <li class="sidebar-menu-category">
                <button class="sidebar-accordion-menu" data-accordion-btn>
                    <div class="menu-title-flex">
                        <?php
                        echo '<img src="./assets/images/icons/' . strtolower(str_replace(' ', '-', $category_name)) . '.png" width="20" height="20" class="menu-title-img">';
                        echo '<p class="menu-title">' . htmlspecialchars($category_name) . '</p>'; ?>
                    </div>
                    <div>
                        <span class="material-symbols-rounded add-icon">keyboard_arrow_down</span>
                        <span class="material-symbols-rounded remove-icon">keyboard_arrow_up</span>
                    </div>
                </button>

                <?php
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