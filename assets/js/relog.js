function test() {
  let e = document.getElementById("acc_type");
  let check = document.getElementById("check");
  let value = e.value;
  let text = e.options[e.selectedIndex].text;
  // console.log(value);
  // console.log(text);
  if (value == 2) {
    check.style.display = "block";
  } else {
    check.style.display = "none";
  }
}
//password show hide
let leye_btn = document.getElementById("leye_btn");
let password = document.getElementById("password");

function lshowHide() {
  if (password.type === "password") {
    password.type = "text";
    leye_btn.innerText = "visibility";
  } else {
    password.type = "password";
    leye_btn.innerText = "visibility_off";
  }
};

let spassword = document.getElementById("spassword");
let scpassword = document.getElementById("scpassword");
let seye_btn = document.getElementById("seye_btn");

//Show/Hide Password
function sshowHide() {
  let passwordField = document.getElementById('spassword');
  let eyeIcon = document.getElementById('seye_btn');
  if (passwordField.type === "password") {
    passwordField.type = "text";
    eyeIcon.innerHTML = "visibility";
  } else {
    passwordField.type = "password";
    eyeIcon.innerHTML = "visibility_off";
  }
}
function scshowHide() {
  let confirmPasswordField = document.getElementById('scpassword');
  let eyeIconc = document.getElementById('sceye_btn');
  if (confirmPasswordField.type === "password") {
    confirmPasswordField.type = "text";
    eyeIconc.innerHTML = "visibility";
  } else {
    confirmPasswordField.type = "password";
    eyeIconc.innerHTML = "visibility_off";
  }
}


const mobileMenuOpenBtn = document.querySelectorAll(
  "[data-mobile-menu-open-btn]"
);
const mobileMenu = document.querySelectorAll("[data-mobile-menu]");
const mobileMenuCloseBtn = document.querySelectorAll(
  "[data-mobile-menu-close-btn]"
);

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
