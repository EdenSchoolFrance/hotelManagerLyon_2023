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

        if (encryptStorage.getItem(`quantity_boisson`)) {
          encryptStorage.removeItem(`quantity_boisson`);
        }
      }
    });

    if (select) {
      select.addEventListener("change", () => {
        select.nextElementSibling.href = `/showBoisson/${select[select.selectedIndex].value}`;
      })
    }
  }
});
/*
const boisson = document.querySelector(".boisson");

if (boisson) {
  const boisson_yes = boisson.querySelector("#boisson_yes");
  const boisson_no = boisson.querySelector("#boisson_no");

  const select_boisson = boisson.querySelector("select");

  boisson_yes.addEventListener("click", () => {
    if (bool_bar) {
      boisson.querySelector("select").classList.remove("none");
      boisson.insertAdjacentHTML(
        "beforeend",
        `<a href='/showBoisson/${
          select_boisson[select_boisson.selectedIndex].value
        }'>Voir les boissons</a>`
      );
      bool_bar = false;
    }
  });

  const bar_select = document.getElementsByName("bar_select")[0];

  boisson_no.addEventListener("click", () => {
    if (boisson.querySelector("a")) {
      boisson.querySelector("select").classList.add("none");
      boisson.querySelector("a").remove();
      bool_bar = true;
    }
  });

  let bool_bar = true;

  bar_select.addEventListener("change", () => {
    boisson.querySelector("a").href = `/showBoisson/${
      select_boisson[select_boisson.selectedIndex].value
    }`;
    bool_bar = false;
  });

  if (encryptStorage.getItem("name_boisson")) {
    boisson.insertAdjacentHTML(
      "beforeend",
      `<p>${encryptStorage.getItem("name_boisson")}</p>`
    );
  }
}
*/
