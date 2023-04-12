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

const arrName = ["chambre", "piscine", "piscine", "salle", "resto"];

arrName.forEach((e) => {
  const allSelect = document.querySelector(`div.${e}`);
  const yes = allSelect.querySelector(`#${e}_yes`);
  const no = allSelect.querySelector(`#${e}_no`);
  yes.addEventListener("click", () => {
    if (encryptStorage.getItem(`name_${e}`)) {
      allSelect.
    }
  });
});
