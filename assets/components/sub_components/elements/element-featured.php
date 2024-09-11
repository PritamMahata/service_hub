<?php
$src = "SELECT *FROM SERVICES WHERE sdiscount = 5";
$res = mysqli_query($conn, $src);
$rec = mysqli_fetch_assoc($res);
?>

<div class="element-featured container">
  <div class="showcase-wrapper has-scrollbar">
    <div class="showcase-container" style="padding:10px;">
      <div class="showcase">
        <div class="showcase-banner">
          <img src="<?php echo $rec['simage'] ?>" class="showcase-img">
        </div>
        <div class="showcase-content">
          <a href="#">
            <h3 class="showcase-title" style="font-size: 1.6rem;"> <?php echo $rec['sname'] ?> </h3>
          </a>
          <p class="showcase-desc" style="font-size: 1rem;"> <?php echo $rec['sdes'] ?> </p>
          <div class="showcase-rating">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star-outline"></ion-icon>
            <ion-icon name="star-outline"></ion-icon>
          </div>
          <div class="price-box">
            <h6>
              <p class="discount"><?php echo $rec['sdiscount'] ?>% Discount</p>
            </h6>
            <p class="price">$<?php echo $rec['sprice'] ?></p>
            <del>$1052</del>
          </div>

          <div class="countdown-box">
            <p class="countdown-desc">Hurry up!</p>
            <div class="countdown">
              <div class="countdown-content">
                <p class="display-number">23</p>
                <p class="display-text">Hrs</p>
              </div>
              <div class="countdown-content">
                <p class="display-number">59</p>
                <p class="display-text">Mins</p>
              </div>
              <div class="countdown-content">
                <p class="display-number">40</p>
                <p class="display-text">Secs</p>
              </div>

            </div>
          </div>

          <div class="container" style="margin:30px 0">
            <ul>
              <li class="showcase-list">
                <div class="sidebyside">
                  <ion-icon name="chevron-forward"></ion-icon>
                  <p> Providers will be fully vaccinated and follow all necessary hygiene and safety protocols.</p>
                </div>
              </li>
              <li class="showcase-list">
                <div class="sidebyside">
                  <ion-icon name="chevron-forward"></ion-icon>
                  <p>Technicians verified with adequate training in deep cleaning techniques.</p>
                </div>
              </li>
              <li class="showcase-list">
                <div class="sidebyside">
                  <ion-icon name="chevron-forward"></ion-icon>
                  <p>Provide detailed service report, including future cleaning or maintenance suggestions.</p>
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