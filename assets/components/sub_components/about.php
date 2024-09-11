<?php
$src = "SELECT *FROM SERVICES WHERE sdiscount = 20";
$res = mysqli_query($conn, $src);
$rec = mysqli_fetch_assoc($res);
?>

<div>
    <div class="container">
        <div class="testimonials-box">
            <!-- TESTIMONIALS -->
            <div class="testimonial">
                <h2 class="title">About Us</h2>
                <div class="testimonial-card">
                    <div class="testimonial-main" id="scroll-container">
                        <div class="testimonial-card-details">
                            <img loading="lazy" src="https://avatars.githubusercontent.com/u/170951200" class="testimonial-banner" width="80"
                                height="80">
                            <p class="testimonial-name">Pritam Roy</p>
                            <p class="testimonial-title">has done the Database part of Website</p>
                        </div>
                        <div class="testimonial-card-details">
                            <img loading="lazy" src="https://avatars.githubusercontent.com/u/169791778" class="testimonial-banner" width="80"
                                height="80">
                            <p class="testimonial-name">Paramita Gupta</p>
                            <p class="testimonial-title">has done the UI Designing & some Front-end part of Website</p>
                        </div>
                        <div class="testimonial-card-details">
                            <img loading="lazy" src="https://avatars.githubusercontent.com/u/169755810" class="testimonial-banner" width="80"
                                height="80">
                            <p class="testimonial-name">Shristi Guha</p>
                            <p class="testimonial-title">has done the UI Desinging & Front-end part of Website</p>
                        </div>
                        <div class="testimonial-card-details">
                            <img loading="lazy" src="./assets/images/testimonial-2.jpg" class="testimonial-banner" width="80"
                                height="80">
                            <p class="testimonial-name">Pritam Mahata</p>
                            <p class="testimonial-title">has done the UI Designing, Front-end and Back-end part of Website</p>
                        </div>
                        <div class="testimonial-card-details">
                            <img loading="lazy" src="https://avatars.githubusercontent.com/u/178006439" class="testimonial-banner" width="80"
                                height="80">
                            <p class="testimonial-name">Samiulla Khan</p>
                            <p class="testimonial-title">has done the Database part of Website</p>
                        </div>
                        <div class="testimonial-card-details">
                            <img loading="lazy" src="./assets/images/testimonial-2.jpg" class="testimonial-banner" width="80"
                                height="80">
                            <p class="testimonial-name">Sundar Praksh Mandal</p>
                            <p class="testimonial-title">has done the Front-end part of Website</p>
                        </div>
                        <div class="testimonial-card-details">
                            <img loading="lazy" src="./assets/images/testimonial-1.jpg" class="testimonial-banner" width="80"
                                height="80">
                            <p class="testimonial-name">Sneha Kundu</p>
                            <p class="testimonial-title">has done the Testing part of Website</p>
                        </div>
                    </div>
                    <p class="testimonial-name">Sarvise Hub</p>
                    <p class="testimonial-title">Online Service Booking Website</p>
                    <img src="./assets/images/icons/quotes.svg" class="quotation-img" width="26">
                    <p class="testimonial-desc">Your stress-free Service Booking Hub!<br>With just a few clicks, you can book your desired service and then kick back — no worries, no stress.<br>Let us handle the rest...</p>
                    <!-- <p class="testimonial-desc"> Home Solutions,<br>One Click Away<br>Book . Relax . Repeat</p> -->
                </div>
            </div>
            <!-- CTA -->
            <div class="cta-container">
                <img loading="lazy" src="<?php echo $rec['simage'] ?>">
                <a href="#" class="cta-content">
                    <p class="discount"><?php echo $rec['sdiscount'] ?>% Discount</p>
                    <h2 class="cta-title"><?php echo $rec['sname'] ?></h2>
                    <p class="cta-text">Starting @ $<?php echo $rec['sprice'] ?></p>
                    <button class="cta-btn">Book now</button>
                </a>
            </div>
            <!-- SERVICE -->
            <div class="service">
                <h2 class="title">Our Service Commitments</h2>
                <div class="service-container">
                    <a href="#" class="service-item">
                        <div class="service-icon">
                            <span class="material-symbols-rounded">support_agent</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">24/7 Service</h3>
                            <p class="service-desc">For Order Over $100</p>
                        </div>
                    </a>
                    <a href="#" class="service-item">
                        <div class="service-icon">
                            <span class="material-symbols-rounded">rocket_launch</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Fastest Service</h3>
                            <p class="service-desc">fastest Service</p>
                        </div>
                    </a>
                    <a href="#" class="service-item">
                        <div class="service-icon">
                            <span class="material-symbols-rounded">call</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Best Online Support</h3>
                            <p class="service-desc">Hours: 8AM - 11PM</p>
                        </div>
                    </a>
                    <a href="#" class="service-item">
                        <div class="service-icon">
                            <span class="material-symbols-rounded">reply</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Cancel Policy</h3>
                            <p class="service-desc">Easy & Free Cancel</p>
                        </div>
                    </a>
                    <a href="#" class="service-item">
                        <div class="service-icon">
                            <span class="material-symbols-rounded">confirmation_number</span>

                        </div>
                        <div class="service-content">
                            <h3 class="service-title">30% money back</h3>
                            <p class="service-desc">For Order Over $100</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function scrollToMiddle() {
        const container = document.getElementById('scroll-container');
        const containerWidth = container.scrollWidth;
        const visibleWidth = container.clientWidth;
        const middlePosition = (containerWidth - visibleWidth) / 2;
        container.scrollLeft = middlePosition;
    }

    // Wait for the DOM to load before executing the scroll function
    document.addEventListener('DOMContentLoaded', () => {
        scrollToMiddle();
    });
</script>