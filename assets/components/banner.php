  <!-- BANNER -->
  <div class="banner">
    <div class="container">
      <div class="slider-container has-scrollbar">
        <div class="slider-item">
          <img loading="lazy" src="./assets/images/banner-1.jpg" class="banner-img">
          <div class="banner-content">
            <h2 class="banner-title" id="hotline"></h2>
          </div>
        </div>
        <div class="slider-item">
          <img loading="lazy" src="./assets/images/banner-2.jpg" class="banner-img">
          <div class="banner-content">
            <h2 class="banner-title" id="hotline">
              <h2>
          </div>
        </div>
        <div class="slider-item">
          <img loading="lazy" src="./assets/images/banner-3.jpg" class="banner-img">
          <div class="banner-content">
            <h2 class="banner-title" id="hotline">
              <h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    let hotlines = [
      "Your One-Stop Solution for Service Needs!",
      "Book Smarter, Live Better!",
      "Convenience at Your Fingertips!",
      "Simplify Your Schedule, Amplify Your Life!",
      "Effortless Booking, Exceptional Service!",
      "Unlock a World of Services, Anytime, Anywhere!",
      "Book with Ease, Enjoy with Peace!",
      "Where Service Meets Simplicity!",
      "Your Trusted Partner in Booking Services!",
      "The Fast Track to Hassle-Free Service!",
    ];

    const hotlineElements = document.querySelectorAll("#hotline");
    let index = 0;

    function updateHotline() {
      hotlineElements.forEach(element => {
        element.innerHTML = `${hotlines[index]}`;
        index = (index + 1) % hotlines.length;
      });
      index = (index + 1) % hotlines.length;
    }
    updateHotline();
    setInterval(updateHotline, 10000);
  </script>