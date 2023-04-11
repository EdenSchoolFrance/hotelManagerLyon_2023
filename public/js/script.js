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
    "<label for='reservation'>Choisissez les dates de reservation</label> <input type='datetime-local' name='debut_piscine' id='reservation'><input type='datetime-local' name='fin_piscine' id='reservation'>";
  if (piscine) {
    piscine.appendChild(div);
  }
}

if (encryptStorage.getItem("name_salle") != null) {
  const div = document.createElement("div");
  const salle = document.querySelector("div.salle");
  div.innerHTML =
    "<label for='reservation'>Choisissez les dates de reservation</label> <input type='datetime-local' name='debut_salle' id='reservation'><input type='datetime-local' name='fin_salle' id='reservation'>";
  if (salle) {
    salle.appendChild(div);
  }
}

if (encryptStorage.getItem("name_chambre") != null) {
  const div = document.createElement("div");
  const chambre = document.querySelector("div.chambre");
  div.innerHTML =
    "<label for='reservation'>Choisissez les dates de reservation</label> <input type='datetime-local' name='debut_chambre' id='reservation'><input type='datetime-local' name='fin_chambre' id='reservation'>";
  if (chambre) {
    chambre.appendChild(div);
  }
}
