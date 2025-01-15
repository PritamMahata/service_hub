<?php
// Assume $conn is your database connection

// Validate and sanitize the input
// if (!isset($_GET['serviceId']) || !is_numeric($_GET['serviceId'])) {
//     die("Invalid service ID.");
// }

$serviceID = intval($_GET['serviceId']); // Convert to integer for safety

// Use a prepared statement to prevent SQL injection
$sql = "SELECT * FROM services WHERE sid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $serviceID); // "i" specifies the parameter type as integer
$stmt->execute();
$result = $stmt->get_result();



// Close the statement and connection
$stmt->close();
$conn->close();

?>

<div class="element-featured container">
    <div class="showcase-wrapper has-scrollbar">
        <div class="showcase-container" style="padding:10px;">
            <?php
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); ?>
                <div class="showcase">
                    <div class="showcase-banner">
                        <img loading="lazy" src="<?php echo $row["simage"] ?>" class="showcase-img">
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
                            <p class="price"><?php echo "₹" . (($row['sprice']) - ((int)($row['sdiscount']) / 100) * (int)($row['sprice'])) ?></p>
                            <del><?php echo "₹" . $row['sprice'] ?></del>
                        </div>
                        <div class="countdown-box">
                            <p class="countdown-desc">Date Available</p>
                            <div class="countdown">
                                <?php
                                $date = new DateTime();
                                $date->modify('+1 day');
                                $stopDay = 9;
                                for ($i = 0; $i < $stopDay; $i++) {
                                    echo '
                                <div class="countdown-content">
                                    <p class="display-number">' . $date->format('j') . $date->format('S') . '</p>
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
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <button class="add-cart-btn" name="book_btn" id="book_btn" onclick="window.location.href = './login.php'">Book now</button>
                            <?php } else { ?>
                                <button class="add-cart-btn" name="book_btn" id="book_btn">Book now</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } else {
                echo "No Service Found";
            } ?>
        </div>
    </div>
</div>

<script>
    let book_btn = document.getElementById('book_btn');
    book_btn.addEventListener('click', function() {
        modal.classList.remove('closed');
    });
</script>