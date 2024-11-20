const BUTTONS = document.querySelectorAll(".btn");
const ARROWS = document.querySelectorAll('.arrow');
const sideBar = document.getElementById("sidebar");
const containerServicos = document.querySelector(".container-servicos");
const imgMenu = document.querySelector(".imgMenu");
const main = document.querySelector("main");
const agendados = document.querySelector(".container-servicos");
const telefoneInput = document.getElementById("telefoneInput");

let date = new Date();
let anoh4 = date.getFullYear();
const months = [
  "Janeiro",
  "Fevereiro",
  "Março",
  "Abril",
  "Maio",
  "Junho",
  "Julho",
  "Agosto",
  "Setembro",
  "Outubro",
  "Novembro",
  "Dezembro",
];
let mesh4 = months[date.getMonth()];

document.getElementById("ano_atual").innerText=`${mesh4}, ${anoh4}`;


function excluir(id){
  let input_id = document.getElementById("delete_id");
  input_id.value = id;
}

function update(id){
  let input_id = document.getElementById("update_id");
  input_id.value = id;
  alert(input_id.value);
}

let cms1 = document.getElementById("cms1");
let cms2 = document.getElementById("cms2");
let cms3 = document.getElementById("cms3");
let cms7 = document.getElementById("cms7");
let cms8 = document.getElementById("cms8");

function graficToggle(){
  ctx.classList.toggle("d-none");
  ctx2.classList.toggle("d-none");
}

function unfocus(){
  sideBar.classList.remove("active");
  agendados.style="filter: blur(0px)";
  main.style="filter: blur(0px)";

  cms1.classList.add("d-none");
  cms2.classList.add("d-none");
  cms3.classList.add("d-none");
  cms7.classList.add("d-none");
  cms8.classList.add("d-none");
}

let cmsAll = [cms1, cms2, cms3, cms7, cms8];

cmsAll.forEach(cms => {
  cms.addEventListener("click", function(e) {
    e.stopPropagation();
  });
});


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
  agendados.style="filter: blur(0px);"
  main.style="filter: blur(0px);"
  
  cms1.classList.add("d-none");
  cms2.classList.add("d-none");
  cms3.classList.add("d-none");
  cms7.classList.add("d-none");
  cms8.classList.add("d-none");
};

function openCMS(cms){

  agendados.style="filter: blur(8px);";
  main.style="filter: blur(8px);"

  if(cms == 'inserir_servico'){
            cms1.classList.toggle("d-none");
        
            cms2.classList.add("d-none");
            cms3.classList.add("d-none");
            cms7.classList.add("d-none");
            cms8.classList.add("d-none")
        }
          
   if(cms == 'atualizar_servico'){
            cms2.classList.toggle("d-none");

            cms1.classList.add("d-none");
            cms3.classList.add("d-none");
            cms7.classList.add("d-none");
            cms8.classList.add("d-none")
   }

   if(cms == 'excluir_servico'){
            cms3.classList.toggle("d-none");

            cms1.classList.add("d-none");
            cms2.classList.add("d-none");
            cms7.classList.add("d-none");
            cms8.classList.add("d-none")
   }

   if(cms == 'atualizar_informacoes'){
            cms7.classList.toggle("d-none");

            cms1.classList.add("d-none");
            cms2.classList.add("d-none");
            cms3.classList.add("d-none");
            cms8.classList.add("d-none")
         }

if(cms == 'visualizar_cliente'){
  cms8.classList.toggle("d-none");

  cms1.classList.add("d-none");
  cms2.classList.add("d-none");
  cms3.classList.add("d-none");
}

if(cms == 'excluir_cliente'){

  cms1.classList.add("d-none");
  cms2.classList.add("d-none");
  cms3.classList.add("d-none");
  cms8.classList.add("d-none")
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
    )})}
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
