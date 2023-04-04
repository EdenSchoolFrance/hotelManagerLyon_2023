const burger = document.querySelector("#burger")
const nav = document.querySelector("nav")
const header = document.querySelector("header")

burger.addEventListener("click", ()=>{
    if(nav.style.right === "-1000px" || nav.style.right == ""){
        nav.style.right = "0"
        setTimeout(() => {
            burger.textContent = '❌'
        }, 250);
    } else{
        nav.style.right = "-1000px"
        setTimeout(() => {
            burger.textContent = '🏨';
        }, 250);
    }
})

window.addEventListener("scroll", (info)=>{
    if(window.scrollY > 150) header.style.background = "white"
    else header.style.background = "none"
})