const BUTTONS = document.querySelectorAll(".btn")
const ARROWS = document.querySelectorAll('.arrow')
const sideBar = document.getElementById("buceta");


function toggleSide(){
    sideBar.classList.toggle("active");
}

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
