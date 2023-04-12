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

const arrName = ["chambre", "piscine", "boisson", "salle", "resto"];
let bool = false;

arrName.forEach((e) => {
  const allSelect = document.querySelector(`div.${e}`);
  const yes = allSelect.querySelector(`#${e}_yes`);
  const no = allSelect.querySelector(`#${e}_no`);
  const link = allSelect.querySelector("a");

  if (encryptStorage.getItem(`name_${e}`)) {
    allSelect.insertAdjacentHTML(
      "beforeend",
      `<p>${encryptStorage.getItem(`name_${e}`)}</p>`
    );

    link.classList.remove("none");
  }

  function addDate() {
    allSelect.insertAdjacentHTML(
      "beforeend",
      `<div class='date'>
      <input type='${
        e == "piscine" ? "datetime-local" : "date"
      }' name='debut_${e}'><input type='${
        e == "piscine" ? "datetime-local" : "date"
      }' name='fin_${e}'></div>`
    );
  }

  if (encryptStorage.getItem(`name_${e}`)) {
    yes.checked = true;
    addDate();
  }
  yes.addEventListener("click", () => {
    link.classList.remove("none");
    if (allSelect.querySelector(".date")) {
      allSelect.querySelector(".date").style.display = "block";
    }
    if (encryptStorage.getItem(`name_${e}`)) {
      if (bool) {
        addDate();
      }
    }
  });

  no.addEventListener("click", () => {
    console.log(allSelect.querySelector(".date"));
    link.classList.add("none");

    allSelect.querySelector("p").remove();

    if (allSelect.querySelector(".date")) {
      allSelect.querySelector(".date").remove();
    }

    if (encryptStorage.getItem(`name_${e}`)) {
      encryptStorage.removeItem(`name_${e}`);
      encryptStorage.removeItem(`id_${e}`);

      if (encryptStorage.getItem(`quantity_boisson`)) {
        encryptStorage.removeItem(`quantity_boisson`);
      }
    }
  });
});
