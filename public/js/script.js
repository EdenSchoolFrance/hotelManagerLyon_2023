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

const arrName = ["chambre", "piscine", "salle", "resto", "boisson"];
let bool = false;

arrName.forEach((e) => {
  const allSelect = document.querySelector(`div.${e}`);
  if (allSelect) {
    const yes = allSelect.querySelector(`#${e}_yes`);
    const no = allSelect.querySelector(`#${e}_no`);
    const link = allSelect.querySelector("a");
    const select = allSelect.querySelector("select");

    if (encryptStorage.getItem(`name_${e}`)) {
      allSelect.insertAdjacentHTML(
        "beforeend",
        `<p>${encryptStorage.getItem(`name_${e}`)}</p>`
      );

      if (link) {
        link.classList.remove("none");
        if (select) {
          select.classList.remove("none");
        }
      }
    }

    function addDate() {
      allSelect.insertAdjacentHTML(
        "beforeend",
        `<div class='date'>
      <input class="debut_${e}" type='${
          e == "piscine" ? "datetime-local" : "date"
        }' name='debut_${e}'><input class="fin_${e}" type='${
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
      if (select) {
        select.classList.remove("none");
      }
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
      if (select) {
        select.classList.add("none");
      }

      if (allSelect.querySelector("p")) {
        allSelect.querySelector("p").remove();
      }
      if (allSelect.querySelector(".date")) {
        allSelect.querySelector(".date").remove();
      }

      if (encryptStorage.getItem(`name_${e}`)) {
        encryptStorage.removeItem(`name_${e}`);
        encryptStorage.removeItem(`id_${e}`);
        encryptStorage.removeItem(`debut_${e}`);
        encryptStorage.removeItem(`fin_${e}`);

        if (encryptStorage.getItem(`quantity_boisson`)) {
          encryptStorage.removeItem(`quantity_boisson`);
        }
      }
    });

    if (select) {
      select.addEventListener("change", () => {
        select.nextElementSibling.href = `/showBoisson/${
          select[select.selectedIndex].value
        }`;
      });
    }
  }
});

arrName.forEach((e) => {
  const timeDebut = document.querySelector(`.debut_${e}`);
  const timeFin = document.querySelector(`.fin_${e}`);
  if (timeFin) {
    timeFin.addEventListener("input", () => {
      if (encryptStorage.getItem(`name_${e}`)) {
        encryptStorage.setItem(`fin_${e}`, timeFin.value);
      }
    });
    timeFin.value = encryptStorage.getItem(`fin_${e}`);
  }

  if (timeDebut) {
    timeDebut.addEventListener("input", () => {
      if (encryptStorage.getItem(`name_${e}`)) {
        encryptStorage.setItem(`debut_${e}`, timeDebut.value);
      }
    });
    timeDebut.value = encryptStorage.getItem(`debut_${e}`);
  }
});
