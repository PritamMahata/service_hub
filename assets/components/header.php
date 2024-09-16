<?php
require_once('./env/config.php');
if (isset($_SESSION['email'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}
$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : 0;
$sql = "SELECT * FROM bookings where user_id = $uid;";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
<header class="header"> <br>
    <div class="header-main">
        <div class="container">
            <a href="./index.php" class="header-logo">
                <img src="./assets/images/logo/logo.png" width="120" height="36">
            </a>
            <div class="header-search-container">
                <form action="category.php" method="GET">
                    <input type="search" name="search" class="search-field" placeholder="Search your service...">
                    <button class="search-btn" type="submit">
                        <span class="material-symbols-rounded" name="search-outline">search</span>
                    </button>
                </form>
            </div>
            <div class="header-user-actions">
                <button class="action-btn sidebyside relog_btn" onclick="window.location.href = './index.php'">
                    <ion-icon name="home" style="font-size: 1.9rem; color: white;"></ion-icon>
                </button>
                <button class="action-btn sidebyside relog_btn" onclick="window.location.href = './category.php'">
                    <ion-icon name="grid" style="font-size: 1.9rem; color: white;"></ion-icon>
                </button>
                <?php
                if ($isLoggedIn) { ?>
                    <button class="action-btn sidebyside relog_btn" onclick="window.location.href = './task.php'">
                        <ion-icon name="calendar" style="font-size: 1.9rem; color: white;"></ion-icon>
                        <span class="count"><?php echo mysqli_num_rows($result); ?></span>
                    </button>
                    <button class="action-btn sidebyside relog_btn" onclick="window.location.href = './profile.php'">
                        <ion-icon name="person-circle-outline" style="font-size: 1.9rem; color: white;"></ion-icon>
                    </button>
                <?php } else { ?>
                    <button class="action-btn sidebyside relog_btn" onclick="window.location.href = './signup.php'">
                        <span class="material-symbols-rounded" style="font-size: 1.9rem; color: white;">person_add</span>
                        <!-- <h6 class="relog_text">Sign Up</h6> -->
                    </button>
                    <button class="action-btn sidebyside relog_btn" onclick="window.location.href = './login.php'">
                        <span class="material-symbols-rounded" style="font-size: 1.9rem; color: white;">login</span>
                        <!-- <h6 class="relog_text">Login</h6> -->
                    </button>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <?php
    require_once('sub_components/menubar/menubar.php');
    ?>
</header> <br>

<script>
    const placeholders = [
        "Home Services",
        "Beauty & Wellness",
        "Automotive",
        "Electronics Repair",
        "Cleaning Services",
        "Fitness & Training",
        "Health Care",
        "Pet Services",
        "Event Planning"
    ];

    const searchField = document.querySelector(".search-field");
    let placeholderIndex = 0;
    let charIndex = 0;
    const typingSpeed = 50; // Speed of typing in milliseconds
    const delayBetweenPlaceholders = 2000; // Delay between different placeholder texts in milliseconds

    function typePlaceholder() {
        const currentPlaceholder = placeholders[placeholderIndex];
        searchField.placeholder = currentPlaceholder.substring(0, charIndex); // Display part of the placeholder text

        if (charIndex < currentPlaceholder.length) {
            charIndex++;
            setTimeout(typePlaceholder, typingSpeed);
        } else {
            // Delay before typing the next placeholder
            setTimeout(() => {
                placeholderIndex = (placeholderIndex + 1) % placeholders.length; // Cycle through placeholders
                charIndex = 0;
                typePlaceholder();
            }, delayBetweenPlaceholders);
        }
    }

    // Start the animation
    typePlaceholder();
</script>