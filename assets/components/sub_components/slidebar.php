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
                            if ($subcategory_name) {
                    ?>
                <li class="sidebar-submenu-category">
                    <a href="<?php echo "./category.php?search=" . htmlspecialchars($subcategory_name) ?>" class="sidebar-submenu-title">
        <?php echo '<p class="product-name">' . htmlspecialchars($subcategory_name) . '</p>';
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
        <h3 class="showcase-heading">Bestselling Services</h3>
        <div class="showcase-wrapper">
            <div class="showcase-container">
                <?php
                $sql = "SELECT *FROM SERVICES WHERE srating >= 4 LIMIT 4";
                $res = mysqli_query($conn, $sql);
                for ($a = 1; $a <= 4; $a++) {
                    while ($row = mysqli_fetch_assoc($res)) { ?>

                        <div class="showcase" onclick="window.location = './category.php?search=<?php echo $row['sname'] ?>'">
                            <a href="#" class="showcase-img-box">
                                <img src="<?php echo $row['simage'] ?>" width="75" height="75"
                                    class="showcase-img">
                            </a>
                            <div class="showcase-content">

                                <a href="#">
                                    <h4 class="showcase-title"><?php echo $row['sname'] ?></h4>
                                </a>

                                <div class="showcase-rating">
                                    <?php
                                    $i = 0;
                                    for ($i; $i < htmlspecialchars($row['srating']); $i++) {
                                        echo "<ion-icon name='star'></ion-icon>";
                                    }
                                    for ($i; $i < 5; $i++) {
                                        echo "<ion-icon name='star-outline'></ion-icon>";
                                    }
                                    ?>
                                </div>

                                <div class="price-box">
                                    <del>
                                        <p class="price">₹<?php echo $row['sprice'] ?></p>
                                    </del>
                                    <?php echo "<p class='price'>₹" . (($row['sprice']) - ((int)($row['sdiscount']) / 100) * (int)($row['sprice'])) . "</p>"; ?>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>

            </div>
        </div>

    </div>

</div>