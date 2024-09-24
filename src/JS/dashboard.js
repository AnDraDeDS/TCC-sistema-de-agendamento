const BUTTONS = document.querySelectorAll(".btn")
const ARROWS = document.querySelectorAll('.arrow')
const sideBar = document.getElementById("sidebar");
const containerServicos = document.querySelector(".container-servicos")
const imgMenu = document.querySelector(".imgMenu")


function toggleSide(){
    sideBar.classList.toggle("active");
}
imgMenu.addEventListener("click", () => {
    const displayAtual = getComputedStyle(containerServicos).display;

    if (displayAtual === "flex") {
        containerServicos.style.display = "none";
    } else {
        containerServicos.style.display = "flex";
    }
});


numb = 0;
BUTTONS.forEach((BUTTON,index) =>{ 
 BUTTON.addEventListener("click", ()=>{
    numb = numb + 180;
    ARROWS[index].style.transform = `rotate(${numb}deg)`
})
})

BUTTONS.forEach((BUTTON,index) =>{ 
    BUTTON.addEventListener("blur", ()=>{
           ARROWS[index].style.transform = `rotate(0deg)`
        }
    )})