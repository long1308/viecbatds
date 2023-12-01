// click__menu__desktop
const menuMore = document.querySelector(".menu__more");
const navSub = document.querySelector(".nav__sub");

let isOpen = false;

menuMore.addEventListener("click", () => {
  if (isOpen) {
    navSub.style.maxHeight = "0";
    isOpen = false;
  } else {
    navSub.style.maxHeight = "375px"; // You can set a suitable value
    isOpen = true;
  }
});

// slide__banner

$(document).ready(function () {
  $(".slide").slick(
    {
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      prevArrow: false,
      nextArrow: false,
    }
  );
  $(".tab__option__jobs").slick({
    prevArrow: $(".prev"),
    nextArrow: $(".next"),
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".box__slide__content__tab").slick({
    prevArrow: false,
    nextArrow: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    // autoplay: true,
    // autoplaySpeed: 3000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".box__slide__jobs").slick({
    prevArrow: false,
    nextArrow: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: $(".prev__1"),
    nextArrow: $(".next__1"),
  });
  $(".box__slider__ntd").slick({
    prevArrow: false,
    nextArrow: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    // prevArrow: $(""),
    // nextArrow: $(""),
    autoplay: false,
    arrow: true,
    dots: true
  });
});

// tab__employer
function showTab(index) {
  const tabs = document.querySelectorAll(".nav-tabs li");
  const tabPanes = document.querySelectorAll(".tab-pane");

  // Remove 'active' class from all tabs
  tabs.forEach((tab) => tab.classList.remove("active"));

  // Add 'active' class to the selected tab
  tabs[index].classList.add("active");

  // Add 'active' class to the selected tab pane
  tabPanes.forEach((pane) => pane.classList.remove("active"));
  tabPanes[index].classList.add("active");
}

document.addEventListener("DOMContentLoaded", function () {
  // Lấy tất cả các phần tử có class "tabUse"
  var tabUses = document.querySelectorAll(".tabUse");

  // Lấy phần tử có class "left__profileUse"
  var leftProfileUse = document.querySelector(".left__profileUse");

  // Thêm lắng nghe sự kiện click cho mỗi tabUse
  tabUses.forEach(function (tabUse) {
    tabUse.addEventListener("click", function () {
      // Lấy chỉ số của tabUse đã nhấp chuột
      var tabIndex = Array.from(tabUses).indexOf(tabUse);

      // Lấy tất cả các phần tử có class "left__profileUse"
      var leftProfileUses = document.querySelectorAll(".left__profileUse");

      // Ẩn tất cả các phần tử left__profileUse
      leftProfileUses.forEach(function (profileUse) {
        profileUse.classList.remove("active");
      });

      // Hiển thị phần tử left__profileUse tương ứng với tab đã nhấp chuột bằng cách thêm class "active"
      leftProfileUses[tabIndex].classList.add("active");
    });
  });
});

function togglePasswordVisibility(button) {
  var passwordInput = button.previousElementSibling;
  var isPasswordVisible = passwordInput.type === "text";

  // Đổi trạng thái của input giữa text và password
  passwordInput.type = isPasswordVisible ? "password" : "text";

  // Đổi biểu tượng của nút chuyển đổi
  button.innerHTML = isPasswordVisible
    ? '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"/></svg>'
    : '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"/></svg>';
}
function scrollToTop() {
  // Sử dụng window.scrollTo để cuộn lên đầu trang
  window.scrollTo({
      top: 0,
      behavior: 'smooth' // Tạo hiệu ứng cuộn mượt
  });
}