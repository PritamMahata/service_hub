<?php
include './env/config.php';
$sql = "SELECT * FROM services";
$result = $conn->query($sql);
$end = 8;
?>
<div class="element-main">
    <div class="container">
        <div class="element-split">
            <h2 class="title">Our Services</h2>
            <a href="./category.php">
                <h2 class="title">view all >></h2>
            </a>
        </div>
    </div>

    <!-- offers -->
    <!--<p class="showcase-badge">15%</p>
    <p class="showcase-badge angle black">sale</p>
    <p class="showcase-badge angle pink">new</p> 
    -->

    <div class="element-grid">
        <?php
        if ($result->num_rows > 0) {
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                $end = isset($end) ? $end : $row;
                if ($count >= $end) {
                    break;
                }
                echo "<div class='showcase' onclick='goToDetails(" . $row['sid'] . ")'>";
                echo "<div class='showcase-banner'>";
                echo "<img src='" . htmlspecialchars($row['simage']) . "' width='300' class='element-img default'>";
                // echo "<p class='showcase-badge'>" . htmlspecialchars($row['sdiscount']) . "</p>";
                if (isset($row['sdiscount'])) {
                    echo "<p class='showcase-badge'>" . ($row['sdiscount']) . "%" . "</p>";
                    // echo "<p class='showcase-badge'>" . gettype((int)($row['sdiscount'])) . "%" . "</p>";
                }
                echo "<div class='showcase-actions'>";
                echo "<button class='btn-action'>";
                echo "<ion-icon name='heart-outline'></ion-icon>";
                echo "</button>";
                echo "<button class='btn-action'>";
                echo "<ion-icon name='eye-outline'></ion-icon>";
                echo "</button>";
                echo "<button class='btn-action'>";
                echo "<ion-icon name='bag-add-outline'></ion-icon>";
                echo "</button>";
                echo "</div>";
                echo "</div>";
                echo "<div class='showcase-content'>";
                echo "<a href='#' class='showcase-category'>" . htmlspecialchars($row['sname']) . "</a>";
                echo "<h3>";
                echo "<a href='#' class='showcase-title'>" . htmlspecialchars($row['sdes']) . "</a>";
                echo "</h3>";
                echo "<div class='showcase-rating'>";
                $i = 0;
                for ($i; $i < htmlspecialchars($row['srating']); $i++) {
                    echo "<ion-icon name='star'></ion-icon>";
                }
                for ($i; $i < 5; $i++) {
                    echo "<ion-icon name='star-outline'></ion-icon>";
                }
                echo "</div>";
                echo "<div class='price-box'>";
                echo "<p class='price'>$" . (($row['sprice']) - ((int)($row['sdiscount']) / 100) * (int)($row['sprice'])) . "</p>";
                echo "<del>$" . htmlspecialchars($row['sprice']) . "</del>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                $count++;
            }
        } else {
            echo "No services found.";
        }
        $conn->close();
        ?>
    </div>
    <!-- <div class="element-grid">
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_1.jpg" width="300"
                    class="element-img default">
                <p class="showcase-badge">15%</p>
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <a href="#">
                    <h3 class="showcase-title">Lorem ipsum dolor sit amet consecrate</h3>
                </a>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$48.00</p>
                    <del>$75.00</del>
                </div>
            </div>
        </div>
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_2.jpg" class="element-img default" width="300">
                <p class="showcase-badge angle black">sale</p>
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <h3>
                    <a href="#" class="showcase-title">Lorem ipsum dolor sit amet consecrate</a>
                </h3>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$45.00</p>
                    <del>$56.00</del>
                </div>
            </div>
        </div>
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_3.jpg" class="element-img default" width="300">
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <h3>
                    <a href="#" class="showcase-title">Lorem ipsum dolor sit amet consecrate</a>
                </h3>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$58.00</p>
                    <del>$65.00</del>
                </div>
            </div>
        </div>
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_4.jpg"
                    class="element-img default" width="300">
                <p class="showcase-badge angle pink">new</p>
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <h3>
                    <a href="#" class="showcase-title">Lorem ipsum dolor sit amet consecrate</a>
                </h3>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$25.00</p>
                    <del>$35.00</del>
                </div>
            </div>
        </div>
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_5.jpg"
                    class="element-img default" width="300">
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <h3>
                    <a href="#" class="showcase-title">Lorem ipsum dolor sit amet consecrate</a>
                </h3>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$99.00</p>
                    <del>$105.00</del>
                </div>
            </div>
        </div>
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_6.jpg"
                    class="element-img default" width="300">
                <p class="showcase-badge angle black">sale</p>
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <h3>
                    <a href="#" class="showcase-title">Lorem ipsum dolor sit amet consecrate</a>
                </h3>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$150.00</p>
                    <del>$170.00</del>
                </div>
            </div>
        </div>
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_7.jpg"
                    class="element-img default" width="300">
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <h3>
                    <a href="#" class="showcase-title">Lorem ipsum dolor sit amet consecrate</a>
                </h3>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$100.00</p>
                    <del>$120.00</del>
                </div>
            </div>
        </div>
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_8.jpg"
                    class="element-img default" width="300">
                <p class="showcase-badge angle black">sale</p>
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <h3>
                    <a href="#" class="showcase-title">Lorem ipsum dolor sit amet consecrate</a>
                </h3>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$25.00</p>
                    <del>$30.00</del>
                </div>
            </div>
        </div>
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_9.jpg"
                    class="element-img default" width="300">
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <h3>
                    <a href="#" class="showcase-title">Lorem ipsum dolor sit amet consecrate</a>
                </h3>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$32.00</p>
                    <del>$45.00</del>
                </div>
            </div>
        </div>
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_10.jpg"
                    class="element-img default" width="300">
                <p class="showcase-badge angle black">sale</p>
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <h3>
                    <a href="#" class="showcase-title">Lorem ipsum dolor sit amet consecrate</a>
                </h3>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$58.00</p>
                    <del>$64.00</del>
                </div>
            </div>
        </div>
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_11.jpg"
                    class="element-img default" width="300">
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <h3>
                    <a href="#" class="showcase-title">Lorem ipsum dolor sit amet consecrate</a>
                </h3>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$50.00</p>
                    <del>$65.00</del>
                </div>
            </div>
        </div>
        <div class="showcase">
            <div class="showcase-banner">
                <img src="./assets/images/services/img_12.jpg"
                    class="element-img default" width="300">
                <p class="showcase-badge angle black">sale</p>
                <div class="showcase-actions">
                    <button class="btn-action">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    <button class="btn-action">
                        <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <div class="showcase-content">
                <a href="#" class="showcase-category">Service Name</a>
                <h3>
                    <a href="#" class="showcase-title">Lorem ipsum dolor sit amet consecrate</a>
                </h3>
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <div class="price-box">
                    <p class="price">$78.00</p>
                    <del>$85.00</del>
                </div>
            </div>
        </div>
    </div> -->
</div>
<script>
    function goToDetails(serviceId) {
        window.location.href = "serviceView.php?serviceId=" + serviceId;
    }
</script>