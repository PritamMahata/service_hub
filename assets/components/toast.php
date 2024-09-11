<!-- NOTIFICATION TOAST -->
<?php
function toast($state, $msg)
{
?>
  <audio id="warning">
    <source src="./assets/sound/error2.mp3" type="audio/mp3">
  </audio>
  <audio id="success">
    <source src="./assets/sound/correct2.mp3" type="audio/mp3">
  </audio>
  <div class="notification-toast" data-toast>
    <button class="toast-close-btn" data-toast-close>
      <ion-icon name="close-outline"></ion-icon>
    </button>
    <div class="toast-detail">
      <h3 id="text"></h3>
    </div>
  </div>
  <script>
    const toast = document.querySelector('[data-toast]');
    const text = document.getElementById('text');
    const toastClose = document.querySelector('[data-toast-close]');
    text.innerText = "<?php echo $msg; ?>";
    toast.style.display = "block";
    if (<?php echo "'" . $state . "'" ?> == 'danger') {
      document.getElementById('warning').play();
      text.style.color = "<?php echo 'red'; ?>";
    } else {
      text.style.color = "<?php echo 'green'; ?>";
      document.getElementById('success').play();
    }
    toastClose.addEventListener('click', () => {
      toast.style.display = "none";
    });
  </script>
<?php
}
?>