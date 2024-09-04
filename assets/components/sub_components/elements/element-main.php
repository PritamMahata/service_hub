<?php
include './env/config.php';
$sql = "SELECT * FROM services";
$result = $conn->query($sql);
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

</div>
<script>
    function goToDetails(serviceId) {
        window.location.href = "serviceView.php?serviceId=" + serviceId;
    }
</script>