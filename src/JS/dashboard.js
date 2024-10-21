const BUTTONS = document.querySelectorAll(".btn")
const ARROWS = document.querySelectorAll('.arrow')
const sideBar = document.getElementById("sidebar");
const containerServicos = document.querySelector(".container-servicos")
const imgMenu = document.querySelector(".imgMenu")
const main = document.querySelector("main")
const cmsAll = document.querySelector(".cms")
const telefoneInput = document.getElementById("telefoneInput");


function excluir(id){
  let input_id = document.getElementById("delete_id");
  input_id.value = id;
}

function update(id){
  let input_id = document.getElementById("update_id");
  input_id.value = id;
  alert(input_id.value);
}


const cms1 = document.getElementById("cms1");
const cms2 = document.getElementById("cms2");
const cms3 = document.getElementById("cms3");
const cms4 = document.getElementById("cms4");
const cms5 = document.getElementById("cms5");
const cms6 = document.getElementById("cms6");
const cms7 = document.querySelector("#cms7");

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

const buttons = document.querySelectorAll('.servico-button');

// Adiciona um evento de clique a cada botão
buttons.forEach(button => {
    button.addEventListener('click', function() {
        // Obtém os valores dos atributos data
        const nome = this.getAttribute('data-nome');
        const preco = this.getAttribute('data-preco');
        const descricao = this.getAttribute('data-descricao');
        const duracao = this.getAttribute('data-duracao');

        // Atualiza os campos de entrada do formulário
        document.getElementById('nome').value = nome;
        document.getElementById('preco').value = preco;
        document.getElementById('descricao').value = descricao;
        document.getElementById('duracao').value = duracao;
    });
});

telefoneInput.addEventListener("input", function (e) {
  let input = e.target.value;
  
  input = input.replace(/\D/g, "");

  if (input.length > 0) {
    input = "(" + input;
  }
  if (input.length > 3) {
    input = input.slice(0, 3) + ") " + input.slice(3);
  }
  

  if (input.length > 10) {
    input = input.slice(0, 10) + "-" + input.slice(10, 14);
  }
  e.target.value = input.slice(0, 15);
});

function atribuirId(id){
document.getElementById("atualizar_id").value = id;
console.log(document.getElementById("atualizar_id").value);
}
