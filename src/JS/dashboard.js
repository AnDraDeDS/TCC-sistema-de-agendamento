const BUTTONS = document.querySelectorAll(".btn")
const ARROWS = document.querySelectorAll('.arrow')
const sideBar = document.getElementById("sidebar");
const containerServicos = document.querySelector(".container-servicos")
const imgMenu = document.querySelector(".imgMenu")
const main = document.querySelector("main")
const cmsAll = document.querySelector(".cms")

const cms1 = document.getElementById("cms1");
const cms2 = document.getElementById("cms2");
const cms3 = document.getElementById("cms3");
const cms4 = document.getElementById("cms4");
const cms5 = document.getElementById("cms5");
const cms6 = document.getElementById("cms6");
const cms7 = document.getElementById("cms7");

function unfocus(){
  sideBar.classList.remove("active");
  main.style="filter: blur(0px);"

  cms1.classList.add("d-none");
  cms2.classList.add("d-none"); 
  cms3.classList.add("d-none");
  cms4.classList.add("d-none");
  cms5.classList.add("d-none");
  cms6.classList.add("d-none");
  cms7.classList.add("d-none");
}

document.addEventListener("click", (e) => {
  const path = e.composedPath();
  cmsAll.forEach(cms => {
    if (!path.includes(sideBar) && !path.includes(cms)) {
      unfocus();
    }
  });
});

function toggleSide(){
    sideBar.classList.toggle("active");
    main.style="filter: blur(0px);"

    cms1.classList.add("d-none");
    cms2.classList.add("d-none");
    cms3.classList.add("d-none");
    cms4.classList.add("d-none");
    cms5.classList.add("d-none");
    cms6.classList.add("d-none");
    cms7.classList.add("d-none");
};

function openCMS(cms){
    main.style="filter: blur(8px);"
    
    switch (cms) {
        case 'inserir_servico':
          cms1.classList.toggle("d-none");

          cms2.classList.add("d-none");
          cms3.classList.add("d-none");
          cms4.classList.add("d-none");
          cms5.classList.add("d-none");
          cms6.classList.add("d-none");
          cms7.classList.add("d-none");
          break;
          
          case 'atualizar_servico':
            cms2.classList.toggle("d-none");

            cms1.classList.add("d-none");
            cms3.classList.add("d-none");
            cms4.classList.add("d-none");
            cms5.classList.add("d-none");
            cms6.classList.add("d-none");
            cms7.classList.add("d-none");
          break;

        case 'excluir_servico':
            cms3.classList.toggle("d-none");

            cms1.classList.add("d-none");
            cms2.classList.add("d-none");
            cms4.classList.add("d-none");
            cms5.classList.add("d-none");
            cms6.classList.add("d-none");
            cms7.classList.add("d-none");
          break;

        case 'inserir_galeria':
            cms4.classList.toggle("d-none");

            cms1.classList.add("d-none");
            cms2.classList.add("d-none");
            cms3.classList.add("d-none");
            cms5.classList.add("d-none");
            cms6.classList.add("d-none");
            cms7.classList.add("d-none");
          break;

        case 'atualizar_galeria':
            cms5.classList.toggle("d-none");

            cms1.classList.add("d-none");
            cms2.classList.add("d-none");
            cms3.classList.add("d-none");
            cms4.classList.add("d-none");
            cms6.classList.add("d-none");
            cms7.classList.add("d-none");
          break;
          
        case 'excluir_galeria':
            cms6.classList.toggle("d-none");

            cms1.classList.add("d-none");
            cms2.classList.add("d-none");
            cms3.classList.add("d-none");
            cms4.classList.add("d-none");
            cms5.classList.add("d-none");
            cms7.classList.add("d-none");
          break;

        case 'atualizar_informacoes':
            cms7.classList.toggle("d-none");

            cms1.classList.add("d-none");
            cms2.classList.add("d-none");
            cms3.classList.add("d-none");
            cms4.classList.add("d-none");
            cms5.classList.add("d-none");
            cms6.classList.add("d-none");
          break;
              default:
          break;
      }
    
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