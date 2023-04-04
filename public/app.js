const btnOpenMenu = document.querySelector(".open");
const btnCloseMenu = document.querySelector(".close");
const menu = document.querySelector(".menu");

btnOpenMenu.addEventListener("click", () => {
  menu.classList.add("opened-menu");
});
btnCloseMenu.addEventListener("click", () => {
  menu.classList.remove("opened-menu");
});
