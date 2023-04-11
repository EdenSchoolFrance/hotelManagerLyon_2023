//open and close burger menu
const btnOpenMenu = document.querySelector(".open");
const btnCloseMenu = document.querySelector(".close");
const menu = document.querySelector(".menu");

btnOpenMenu.addEventListener("click", () => {
  menu.classList.add("opened-menu");
});
btnCloseMenu.addEventListener("click", () => {
  menu.classList.remove("opened-menu");
});

//open and close form to add client
const btnOpenAddClient = document.querySelector("#btnAddClient");
const btnCloseAddClient = document.querySelector("#btnCloseClient");
const formAddClient = document.querySelector("#addClient");

btnOpenAddClient.addEventListener("click", () => {
  formAddClient.classList.remove("close");
  formAddClient.classList.add("open");
});
btnCloseAddClient.addEventListener("click", () => {
  formAddClient.classList.remove("open");
  formAddClient.classList.add("close");
});
