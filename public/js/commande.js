//Affiche les input number dans la page commande

const boisson = document.querySelectorAll(".boisson");
const quantite = document.querySelectorAll(".quantite");

for(let i = 0;i < boisson.length; i++){
    boisson[i].addEventListener("click", ()=>{
        for(let i = 0;i < quantite.length; i++){
            quantite[i].classList.add("hidden")
        }
        console.log("test")
        quantite[i].classList.remove("hidden")
    })
}

const menu = document.querySelectorAll(".menu");
const quantiteM = document.querySelectorAll(".quantiteM");

for(let i = 0;i < menu.length; i++){
    menu[i].addEventListener("click", ()=>{
        for(let i = 0;i < quantite.length; i++){
            quantiteM[i].classList.add("hidden")
        }
        console.log("test")
        quantiteM[i].classList.remove("hidden")
    })
}