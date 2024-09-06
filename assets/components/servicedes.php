<?php
$serviceID = $_GET['serviceId'];
$sql = "SELECT * FROM services WHERE sid = $serviceID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "0 results";
}
?>

<div class="element-featured container">
    <div class="showcase-wrapper has-scrollbar">
        <div class="showcase-container" style="padding:10px;">
            <div class="showcase">
                <div class="showcase-banner">
                    <img src="<?php echo $row["simage"]?>" class="showcase-img">
                </div>
                <div class="showcase-content">
                    <a href="#">
                        <h3 class="showcase-title" style="font-size: 1.6rem;"><?php echo $row["sname"] ?></h3>
                    </a>
                    <p class="showcase-desc" style="font-size: 1rem;"><?php echo $row["sdes"] ?></p>
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
                        <?php
                        // echo "<p class='price'>$" . (($row['sprice']) - ((int)($row['sdiscount']) / 100) * (int)($row['sprice'])) . "</p>";
                        // echo "<del>$" . htmlspecialchars($row['sprice']) . "</del>";
                        ?>
                        <p class="price"><?php echo "$" . (($row['sprice']) - ((int)($row['sdiscount']) / 100) * (int)($row['sprice'])) ?></p>
                        <del><?php echo "$" . $row['sprice'] ?></del>
                    </div>
                    <div class="countdown-box">
                        <p class="countdown-desc">Date Available</p>
                        <div class="countdown">
                            <?php
                            $count = date("j");
                            $date = new DateTime();
                            $stopDay = 10;
                            $startDayOfYear = (int)$date->format('z') + 1;
                            $targetDayOfYear = $startDayOfYear + $stopDay - 1;
                            while ((int)$date->format('z') + 1 != $targetDayOfYear) {
                                echo '
                                <div class="countdown-content">
                                    <p class="display-number">' . $date->format('jS') . '</p>
                                    <p class="display-text">' . $date->format('M') . '</p>
                                </div>
                                ';
                                $date->modify('+1 day');
                            }
                            ?>
                        </div>
                    </div>
                    <div class="countdown-box">
                        <p class="countdown-desc">Time Available</p>
                        <div class="countdown">
                            <div class="countdown-content">
                                <p class="display-number">9:00 AM - 12:00 PM</p>
                            </div>
                            <div class="countdown-content">
                                <p class="display-number">12:00 PM - 3:00 PM</p>
                            </div>
                            <div class="countdown-content">
                                <p class="display-number">3:00 PM - 5:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="container" style="margin:30px 0">
                        <ul>
                            <?php
                            $features = explode(',', $row['sfeatures']);
                            foreach ($features as $variable) { ?>
                                <li class="showcase-list">
                                    <div class="sidebyside">
                                        <ion-icon name="chevron-forward"></ion-icon>
                                        <p> <?php echo $variable ?></p>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="sidebyside" style="justify-content: center; margin-top: 16px; ">
                        <button class="add-cart-btn" name="book_btn" id="book_btn">Book now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let book_btn = document.getElementById('book_btn');
    book_btn.addEventListener('click', function() {
        modal.classList.remove('closed');
    });
</script>