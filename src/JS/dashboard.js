const BUTTONS = document.querySelectorAll(".btn")
const ARROWS = document.querySelectorAll('.arrow')


BUTTONS.forEach((BUTTON,index) =>{ 
 BUTTON.addEventListener("click", ()=>{
ARROWS[index].style.transform = "rotate(180deg)"
})
})

BUTTONS.forEach((BUTTON,index) =>{ 
    BUTTON.addEventListener("blur", ()=>{
   ARROWS[index].style.transform = "rotate(0deg)"
   })
   })
