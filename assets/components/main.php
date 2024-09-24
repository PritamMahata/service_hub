<main>
  <!-- element -->
  <div class="element-container">
    <div class="container">
      <?php
      require_once('sub_components/slidebar.php');
      ?>
      <div class="element-box">
        <?php
        require_once('sub_components/elements/element-main.php');
        // require_once('sub_components/elements/element-minimal.php');
        if (!isset($_GET['search'])) {
          require_once('sub_components/elements/element-featured.php');
        }
        ?>
      </div>
    </div>
  </div>
</main>