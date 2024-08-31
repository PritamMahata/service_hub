"use strict";

// hot lines
// let hotlines = [
//   "Your One-Stop Solution for Service Needs!",
//   "Book Smarter, Live Better!",
//   "Convenience at Your Fingertips!",
//   "Simplify Your Schedule, Amplify Your Life!",
//   "Effortless Booking, Exceptional Service!",
//   "Unlock a World of Services, Anytime, Anywhere!",
//   "Book with Ease, Enjoy with Peace!",
//   "Where Service Meets Simplicity!",
//   "Your Trusted Partner in Booking Services!",
//   "The Fast Track to Hassle-Free Service!",
// ];
// const hotline = document.getElementById("hotline");
// let index = 0;
// function updateHotline() {
//   hotline.innerHTML = `<h2>${hotlines[index]}</h2>`;
//   index = (index + 1) % hotlines.length;
// }
// updateHotline();
// setInterval(updateHotline, 10000);

// modal variables
const modal = document.querySelector("[data-modal]");
const modalCloseBtn = document.querySelector("[data-modal-close]");
const modalCloseOverlay = document.querySelector("[data-modal-overlay]");

// modal function
// const modalCloseFunc = function () {
//   modal.classList.add("closed");
// };
//
// // modal eventListener
// modalCloseOverlay.addEventListener("click", modalCloseFunc);
// modalCloseBtn.addEventListener("click", modalCloseFunc);



// mobile menu variables
const mobileMenuOpenBtn = document.querySelectorAll("[data-mobile-menu-open-btn]");
const mobileMenu = document.querySelectorAll("[data-mobile-menu]");
const mobileMenuCloseBtn = document.querySelectorAll("[data-mobile-menu-close-btn]");

const overlay = document.querySelector("[data-overlay]");
for (let i = 0; i < mobileMenuOpenBtn.length; i++) {
  // mobile menu function
  const mobileMenuCloseFunc = function () {
    mobileMenu[i].classList.remove("active");
    overlay.classList.remove("active");
  };

  mobileMenuOpenBtn[i].addEventListener("click", function () {
    mobileMenu[i].classList.add("active");
    overlay.classList.add("active");
  });

  mobileMenuCloseBtn[i].addEventListener("click", mobileMenuCloseFunc);
  overlay.addEventListener("click", mobileMenuCloseFunc);
}



// accordion variables
const accordionBtn = document.querySelectorAll("[data-accordion-btn]");
const accordion = document.querySelectorAll("[data-accordion]");

for (let i = 0; i < accordionBtn.length; i++) {
  accordionBtn[i].addEventListener("click", function () {
    const clickedBtn = this.nextElementSibling.classList.contains("active");

    for (let i = 0; i < accordion.length; i++) {
      if (clickedBtn) break;

      if (accordion[i].classList.contains("active")) {
        accordion[i].classList.remove("active");
        accordionBtn[i].classList.remove("active");
      }
    }

    this.nextElementSibling.classList.toggle("active");
    this.classList.toggle("active");
  });
}
