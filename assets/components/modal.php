<?php include_once './env/config.php';
require_once('./assets/components/toast.php');
$showAlert = false;
$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : '';
$fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : '';
$mname = isset($_SESSION['mname']) ? $_SESSION['mname'] : '';
$lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : '';
// $con_num = isset($_SESSION['con_num']) ? $_SESSION['con_num'] : '';
// $address = isset($_SESSION['address']) ? $_SESSION['address'] : '';
$serviceID = isset($_GET['serviceId']) ? $_GET['serviceId'] : '';


function generateOrderID($length = 8)
{
  $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $orderID = '';
  $charactersLength = strlen($characters);

  for ($i = 0; $i < $length; $i++) {
    $orderID .= $characters[rand(0, $charactersLength - 1)];
  }
  return $orderID;
}



function generateHappyCode($length = 6)
{
  $characters = '0123456789';
  $happyCode = '';
  $charactersLength = strlen($characters);

  for ($i = 0; $i < $length; $i++) {
    $happyCode .= $characters[rand(0, $charactersLength - 1)];
  }
  return $happyCode;
}

if (isset($_POST['ok'])) {
  if ($_SESSION['isLogin']) {
    $issue = $_POST['issue'];
    $baddress = $_POST['baddress'];
    $bphone = $_POST['bphone'];
    $date = $_POST['rd1'];
    $time = $_POST['rd2'];
    $orderID = generateOrderID();
    $happyCode = generateHappyCode();
    $sql = "SELECT * FROM services WHERE sid = '$serviceID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    } else {
      echo "0 results";
    }
    $providerId = $row['created_by'];
    $sql = "INSERT INTO bookings (order_id, user_id, provider_id, service_id,issue, baddress,bphone, arrival_date, booking_date, status ,happy_code) VALUES ('$orderID', '$uid', '$providerId', '$serviceID','$issue','$baddress','$bphone','$date,$time', current_timestamp(), 'pending','$happyCode')";
    if ($conn->query($sql) === TRUE) {
      toast("success", "Booking Registered Sucessfully");
      echo "<script>
             setInterval(()=>{
                window.location='serviceView.php?serviceId=$serviceID';
              },3000);
            </script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo '<script> window.location = "login.php"</script>';
  }
}

?>

<div class="modal closed" data-modal>
  <div class="modal-close-overlay" data-modal-overlay></div>
  <div class="modal-content">
    <button class="modal-close-btn" data-modal-close>
      <ion-icon name="close-outline"></ion-icon>
    </button>
    <div class="newsletter">
      <form method="POST">
        <div class="newsletter-header">
          <h3 class="newsletter-title">SCHEDULE YOUR SERVICE</h3>
          <!-- <p class="newsletter-desc"> Subscribe the <b>service hub</b> to get latest service and discount update. </p> -->
        </div>
        <div class="row_field">
          <label class="newsletter-title">Name</label>
          <input type="text" name="email" class="email-field " placeholder="Name" autocomplete="on" value="<?php echo $fname . " " . $mname . " " . $lname ?>" readonly>
        </div>
        <div class="col_field">
          <div class="row_field">
            <label class="newsletter-title">Contact Number</label>
            <input type="number" name="bphone" class="email-field" placeholder="Contact Number" required>
          </div>
          <div class="row_field">
            <label class="newsletter-title">Alternate Number</label>
            <input type="number" name="alt_num" class="email-field" placeholder="(optional)">
          </div>
        </div>
        <div class="row_field">
          <label class="newsletter-title">Issue (optional)</label>
          <textarea name="issue" rows="4" cols="50"></textarea>
        </div>
        <div class="row_field">
          <label class="newsletter-title">Address</label>
          <textarea name="baddress" rows="4" cols="50" required></textarea>
        </div>

        <div class="row_field">
          <br> <label class="newsletter-title">SELECT SLOT</label>
          <label class="newsletter-title">Select Date</label>
          <div class="card">
            <div class="content">
              <?php
              $count = date("j");
              $date = new DateTime();
              $stopDay = 9;
              $startDayOfYear = (int)$date->format('z') + 1;
              $targetDayOfYear = $startDayOfYear + $stopDay - 1;
              while ((int)$date->format('z') + 1 != $targetDayOfYear) {
                echo '<input type="radio" name="rd1" id="_' . $date->format('j') + 1 . '" value = "' . $date->format('j') + 1 . $date->format('S') . " " . $date->format('M') . '" required>';
                $date->modify('+1 day');
                $count++;
              }
              $date = new DateTime();
              while ((int)$date->format('z') + 1 != $targetDayOfYear) {
                echo
                '<label for="_' . $date->format('j') + 1 . '" class="box __' . $date->format('j') + 1 . '">
                <div class="plan">
                <div class="yearly">' . $date->format('j') + 1 . $date->format('S') . '</div>
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
          <label class="newsletter-title">Select Time</label>
          <div class="card">
            <div class="content">
              <input type="radio" name="rd2" id="_32" value="9:00 AM - 12:00 PM" required>
              <input type="radio" name="rd2" id="_33" value="12:00 PM - 3:00 PM" required>
              <input type="radio" name="rd2" id="_34" value="3:00 PM - 5:00 PM" required>
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
          <button type="reset" name="ok" class="btn-newsletter disable" CloseBtn>Cancel</button>
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
  const CloseBtn = document.querySelector("[CloseBtn]");
  // modal function
  const modalCloseFunc = function() {
    modal.classList.add("closed");
  };

  // modal eventListener
  modalCloseOverlay.addEventListener("click", modalCloseFunc);
  modalCloseBtn.addEventListener("click", modalCloseFunc);
  CloseBtn.addEventListener("click", modalCloseFunc);
</script>