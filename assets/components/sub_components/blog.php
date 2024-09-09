<?php
    $src = "SELECT *FROM SERVICES WHERE sdiscount >= 15";
    $res = mysqli_query($conn, $src);
    $rec1 = mysqli_fetch_assoc($res);
    $rec2 = mysqli_fetch_assoc($res);
    $rec3 = mysqli_fetch_assoc($res);
    $rec4 = mysqli_fetch_assoc($res);
?>

<div class="blog">
      <div class="container">
        <div class="blog-container has-scrollbar">
          <div class="blog-card">
            <a href="#">
              <img loading="lazy" src="<?php echo $rec1['simage']?>"
                width="300" class="blog-banner">
            </a>
            <div class="blog-content">
              <h3><a href="#" class="blog-category"><?php echo $rec1['sname']?></a></h3>
              <a href="#">
                <h1 class="blog-title"><?php echo $rec1['sdes']?></h1>
              </a>
              <div class="price-box">
            <p class="price">$<?php echo $rec1['sprice']?></p>
              </div>
            </div>
          </div>

          <div class="blog-card">
            <a href="#">
              <img loading="lazy" src="<?php echo $rec2['simage']?>"
                width="300" class="blog-banner">
            </a>
            <div class="blog-content">
              <h3><a href="#" class="blog-category"><?php echo $rec2['sname']?></a></h3>
              <a href="#">
                <h1 class="blog-title"><?php echo $rec2['sdes']?></h1>
              </a>
              <div class="price-box">
            <p class="price">$<?php echo $rec2['sprice']?></p>
              </div>
            </div>
          </div>

          <div class="blog-card">
            <a href="#">
              <img loading="lazy" src="<?php echo $rec3['simage']?>"
                width="300" class="blog-banner">
            </a>
            <div class="blog-content">
              <h3><a href="#" class="blog-category"><?php echo $rec3['sname']?></a></h3>
              <a href="#">
                <h1 class="blog-title"><?php echo $rec3['sdes']?></h1>
              </a>
              <div class="price-box">
            <p class="price">$<?php echo $rec3['sprice']?></p>
              </div>
            </div>
          </div>

          <div class="blog-card">
            <a href="#">
              <img loading="lazy" src="<?php echo $rec4['simage']?>"
                width="300" class="blog-banner">
            </a>
            <div class="blog-content">
              <h3><a href="#" class="blog-category"><?php echo $rec4['sname']?></a></h3>
              <a href="#">
                <h1 class="blog-title"><?php echo $rec4['sdes']?></h1>
              </a>
              <div class="price-box">
            <p class="price">$<?php echo $rec4['sprice']?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>