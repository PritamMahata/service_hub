<div class="modal closed" data-modal>
  <div class="modal-close-overlay" data-modal-overlay></div>
  <div class="modal-content">
    <button class="modal-close-btn" data-modal-close>
      <ion-icon name="close-outline"></ion-icon>
    </button>
    <div class="newsletter">
      <form method="POST">
        <div class="newsletter-header">
          <h3 class="newsletter-title">Checkout</h3>
          <!-- <p class="newsletter-desc"> Subscribe the <b>service hub</b> to get latest service and discount update. </p> -->
        </div>
        <div class="row_field">
          <label class="newsletter-title">E-mail ID </label>
          <input type="email" name="email" class="email-field" placeholder="E-mail ID" value="<?php echo $email ?>" required>
        </div>
        <div class="col_field">
          <div class="row_field">
            <label class="newsletter-title">Contact Number</label>
            <input type="number" name="con_num" class="email-field" placeholder="Contact Number" required>
          </div>
          <div class="row_field">
            <label class="newsletter-title">Alternate Number</label>
            <input type="number" name="alt_num" class="email-field" placeholder="Alternate Number" required>
          </div>
        </div>
        <div class="row_field">
          <label class="newsletter-title">Address</label>
          <textarea id="w3review" name="address" rows="4" cols="50"></textarea>
        </div>

        <div class="row_field">
          <label class="newsletter-title">Select Slot</label>
          <label class="newsletter-title">Select Date</label>
          <div class="card">
            <div class="content">

              <?php
              $count = date("j");
              $date = new DateTime();
              $stopDay = 10;
              $startDayOfYear = (int)$date->format('z') + 1;
              $targetDayOfYear = $startDayOfYear + $stopDay - 1;
              for ($i = $count; $i <= $stopDay; $i++) {
                echo '<input type="radio" name="rd1" id="_' . $i . '" required>';
              }
              while ((int)$date->format('z') + 1 != $targetDayOfYear) {
                echo
                '<label for="_' . $count . '" class="box __' . $count . ' style="background: #ddd; margin: 5px; padding: 10px 12px; display: flex; border-radius: 5px; border: 2px solid transparent; cursor: pointer; transition: all 0.25s ease; min-width: fit-content;"">
                <div class="plan">
                <div class="yearly">' . $date->format('jS') . '</div>
                <div class="yearly">' . $date->format('M') . '</div>
                </div> 
                </label>';
                $date->modify('+1 day');
                $count++;
              }
              ?>

            </div>
          </div>
        </div>


        <div class="row_field">
          <label class="newsletter-title">Select Date</label>
          <div class="card">
            <div class="content">
              <input type="radio" name="rd2" id="_32">
              <input type="radio" name="rd2" id="_33">
              <input type="radio" name="rd2" id="_34">

              <label for="_32" class="box __32">
                <div class="plan">
                  <span class="yearly">9:00 AM - 12:00 PM</span>
                </div>
              </label>
              <label for="_33" class="box __33">
                <div class="plan">
                  <span class="yearly">12:00 PM - 3:00 PM</span>
                </div>
              </label>
              <label for="_34" class="box __34">
                <div class="plan">
                  <span class="yearly">3:00 PM - 5:00 PM</span>
                </div>
              </label>
            </div>
          </div>
        </div>



        <div class="container flex_div">
          <button type="reset" name="ok" class="btn-newsletter disable">Cancel</button>
          <button type="submit" name="ok" class="btn-newsletter">Book Now</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // modal variables
  const modal = document.querySelector("[data-modal]");
  const modalCloseBtn = document.querySelector("[data-modal-close]");
  const modalCloseOverlay = document.querySelector("[data-modal-overlay]");
  // modal function
  const modalCloseFunc = function() {
    modal.classList.add("closed");
  };

  // modal eventListener
  modalCloseOverlay.addEventListener("click", modalCloseFunc);
  modalCloseBtn.addEventListener("click", modalCloseFunc);
</script>