<div class="blog">
      <div class="container">
        <div class="blog-container has-scrollbar">
        
        <?php
          $sql = "SELECT *FROM SERVICES WHERE sdiscount >= 15 LIMIT 4";
          $res = mysqli_query($conn, $sql);
          for($a = 1; $a <= 4; $a++){
          while ($row = mysqli_fetch_assoc($res)) { ?>

          <div class="blog-card">
            <a href="#">
              <img loading="lazy" src="<?php echo $row['simage']?>"
                width="300" class="blog-banner">
            </a>
            <div class="blog-content">
              <h3><a href="#" class="blog-category"><?php echo $row['sname']?></a></h3>
              <a href="#">
                <h1 class="blog-title"><?php echo $row['sdes']?></h1>
              </a>
              <div class="price-box">
            <p class="price">$<?php echo $row['sprice']?></p>
              </div>
            </div>
          </div>

          <?php } } ?>
          
        </div>
      </div>
</div>