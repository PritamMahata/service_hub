<!-- NOTIFICATION TOAST -->
<div class="notification-toast" data-toast>
  <button class="toast-close-btn" data-toast-close>
    <ion-icon name="close-outline"></ion-icon>
  </button>
  <div class="toast-detail">
    <!-- <p class="toast-message"></p> -->
      <?php if ($msg != '' && $showAlert) {
        echo $msg;
      } ?>
    <!-- <p class="toast-title"> Rose Gold Earrings </p>
    <p class="toast-meta">
      <time datetime="PT2M">2 Minutes</time> ago
    </p> -->
  </div>
</div>