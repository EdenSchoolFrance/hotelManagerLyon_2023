// encrypt localStorage

const encryptStorage = new EncryptStorage("storageType");

//get all formLabel and input in addClient for animation

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

//add all name of options

const arrName = ["chambre", "piscine", "salle", "resto", "boisson"];
let bool = false;

arrName.forEach((e) => {
  //get input who has name of options yes or not in input radio
  const allSelect = document.querySelector(`div.${e}`);
  if (allSelect) {
    const yes = allSelect.querySelector(`#${e}_yes`);
    const no = allSelect.querySelector(`#${e}_no`);
    const link = allSelect.querySelector("a");
    const select = allSelect.querySelector("select");
    //check if item name_(name o option) is exist
    if (encryptStorage.getItem(`name_${e}`)) {
      //insert in father of the option an paragraph with the name of option taken
      allSelect.insertAdjacentHTML(
        "beforeend",
        `<p>${encryptStorage.getItem(`name_${e}`)}</p>`
      );

      //remove or add the link who redirect to page with all options

      if (link) {
        link.classList.remove("none");
        if (select) {
          select.classList.remove("none");
        }
      }
    }

    //add input type date or datetime-local for options

    function addDate() {
      allSelect.insertAdjacentHTML(
        "beforeend",
        `<div class='date'>
      <input class="debut_${e}" type='${
          e == "piscine" ? "datetime-local" : "date"
        }' name='debut_${e}'>${
          e != "boisson" && e != "resto"
            ? `<input class="fin_${e}" type='${
                e == "piscine" ? "datetime-local" : "date"
              }' name='fin_${e}'>`
            : ""
        }</div>`
      );
    }

    //add function addDate to give input

    if (encryptStorage.getItem(`name_${e}`)) {
      yes.checked = true;
      addDate();
    }

    //if input radio yes is pressed th date and the link show itself
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

    //if input radio yes is pressed th date and the link hide itself

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

    //change the redirect link with the option value(id bar)

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

  /*if (encryptStorage.getItem(`name_${e}`)) {
    encryptStorage.setItem(`debut_${e}`);
    encryptStorage.setItem(`fin_${e}`);
  }*/

  //add item in localStorage for the end time date

  if (timeFin) {
    timeFin.addEventListener("input", () => {
      if (encryptStorage.getItem(`name_${e}`)) {
        encryptStorage.setItem(`fin_${e}`, timeFin.value);
      }
    });
    timeFin.value = encryptStorage.getItem(`fin_${e}`);
  }

  //add item in localStorage for the start time date

  if (timeDebut) {
    timeDebut.addEventListener("input", () => {
      if (encryptStorage.getItem(`name_${e}`)) {
        encryptStorage.setItem(`debut_${e}`, timeDebut.value);
      }
    });
    timeDebut.value = encryptStorage.getItem(`debut_${e}`);
  }
});
