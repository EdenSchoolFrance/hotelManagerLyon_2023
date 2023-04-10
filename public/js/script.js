const encryptStorage = new EncryptStorage("storageType");

const formLabel = document.querySelectorAll("form.homepage label");
const formInput = document.querySelectorAll(
  "form.homepage input[type=text], form.homepage input[type=email]"
);

formInput.forEach((e) => {
  e.addEventListener("input", () => {
    if (e.value != "") {
      e.nextElementSibling.style.top = "0";
    } else {
      e.nextElementSibling.style.top = "50%";
    }
  });
  if (e.value != "") {
    e.nextElementSibling.style.top = "0";
  } else {
    e.nextElementSibling.style.top = "50%";
  }
});

if (encryptStorage.getItem("name_piscine") != null) {
  const div = document.createElement("div");
  const piscine = document.querySelector("div.piscine");
  div.innerHTML =
    "<label for='reservation'>Choisissez les dates de reservation</label> <input type='datetime-local' name='debut_reserv' id='reservation'><input type='datetime-local' name='fin_reserv' id='reservation'>";
  piscine.appendChild(div);
}
