// hot lines
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
const hotline = document.getElementById("hotline");
let index = 0;
function updateHotline() {
  hotline.innerHTML = `<h2>${hotlines[index]}</h2>`;
  index = (index + 1) % hotlines.length;
}
updateHotline();
setInterval(updateHotline, 10000);
