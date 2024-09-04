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
                    <img src="./assets/images/services/img_5.jpg" class="showcase-img">
                </div>
                <div class="showcase-content">
                    <a href="#">
                        <h3 class="showcase-title" style="font-size: 1.6rem;">Lorem ipsum dolor sit amet consecrate</h3>
                    </a>
                    <p class="showcase-desc" style="font-size: 1rem;"> Lorem ipsum dolor sit amet consecrate Lorem ipsum dolor dolor sit amet
                        consectetur Lorem ipsum dolor
                    </p>
                    <div class="showcase-rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                    <div class="price-box">
                        <p class="price">$150.00</p>
                        <del>$200.00</del>
                    </div>
                    <div class="countdown-box">
                        <p class="countdown-desc">Date Available</p>
                        <div class="countdown">
                            <div class="countdown-content">
                                <p class="display-number">03</p>
                                <p class="display-text">Aug</p>
                            </div>
                            <div class="countdown-content">
                                <p class="display-number">03</p>
                                <p class="display-text">Aug</p>
                            </div>
                            <div class="countdown-content">
                                <p class="display-number">03</p>
                                <p class="display-text">Aug</p>
                            </div>
                            <div class="countdown-content">
                                <p class="display-number">03</p>
                                <p class="display-text">Aug</p>
                            </div>
                        </div>
                    </div>

                    <div class="container" style="margin:30px 0">
                        <ul>
                            <li class="showcase-list">
                                <div class="sidebyside">
                                    <ion-icon name="chevron-forward"></ion-icon>
                                    <p> Lorem ipsum dolor sit amet consecrate</p>
                                </div>
                            </li>
                            <li class="showcase-list">
                                <div class="sidebyside">
                                    <ion-icon name="chevron-forward"></ion-icon>
                                    <p> Lorem ipsum dolor sit amet consecrate</p>
                                </div>
                            </li>
                            <li class="showcase-list">
                                <div class="sidebyside">
                                    <ion-icon name="chevron-forward"></ion-icon>
                                    <p> Lorem ipsum dolor sit amet consecrate</p>
                                </div>
                            </li>
                            <li class="showcase-list">
                                <div class="sidebyside">
                                    <ion-icon name="chevron-forward"></ion-icon>
                                    <p> Lorem ipsum dolor sit amet consecrate</p>
                                </div>
                            </li>

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