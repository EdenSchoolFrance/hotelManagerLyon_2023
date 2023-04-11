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

const arrName = ["piscine", "salle", "chambre"];

arrName.forEach((e) => {
  if (encryptStorage.getItem(`name_${e}`) != null) {
    const div = document.createElement("div");
    const el = document.querySelector(`div.${e}`);
    div.innerHTML = `<label for='reservation'>Choisissez les dates de reservation</label> <input type='datetime-local' name='debut_${e}' id='reservation'><input type='datetime-local' name='fin_${e}' id='reservation'>`;
    if (el) {
      el.appendChild(div);
    }
  }
});


