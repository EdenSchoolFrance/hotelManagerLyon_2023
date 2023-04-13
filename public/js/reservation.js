//Affiche les input date des select dans la page reservation

const select = document.querySelectorAll("select");
const date = document.querySelectorAll(".date");

for(let i = 0;i < select.length; i++){
    select[i].addEventListener("click", ()=>{
    
        if(select[i].value != "empty"){
            date[i].classList.remove("hidden")
        }else{
            date[i].classList.add("hidden")
        }
    })
}