const menuBtn = document.getElementById("menu-btn");
const header = document.querySelector(".header");
const main = document.querySelector(".main");
const searchBtn = document.querySelector(".bx-search");
const dropDown = document.querySelector(".dropdown-content");
const downBtn = document.querySelector(".bx-chevron-down");

menuBtn.addEventListener("click", () => {
  header.toggleAttribute("data-small");
  main.toggleAttribute("data-small");
  searchBtn.addEventListener("click", () => {
    header.removeAttribute("data-small");
    main.removeAttribute("data-small");
  });
});

downBtn.addEventListener("click", () => {
  if (header.hasAttribute("data-small") === false) {
    dropDown.toggleAttribute("data-down");
    downBtn.classList.toggle("bx-chevron-up");
  }
});
