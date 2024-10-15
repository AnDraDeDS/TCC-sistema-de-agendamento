
let content = document.querySelector(".content");
let content2 = document.querySelector(".content_focus");
let content3 = document.querySelector(".content_agenda");
let button_mes = document.querySelector("#mes");
let dropdown = document.querySelector(".dropdown-menu");

const header = document.querySelector(".calendar button");
const navs = document.querySelectorAll("#prev, #next");
const dates = document.querySelector(".dates");



function selectItens(item){
  if(item == 'horario'){
    let horarios = Array.from(document.querySelectorAll('.horario'));
    horarios.forEach((hora)=>{
      hora.addEventListener('click', ()=>{
        hora.style="background-color: #44B2F7; border: 0; outline: 0; box-shadow: rgba(0, 0, 0, 0.25) 4px 7px 8px,rgba(0, 0, 0, 0.12) 0px 5px 5px,rgba(0, 0, 0, 0.12) 0px 2px 3px,rgba(0, 0, 0, 0.17) 0px 6px 7px,rgba(0, 0, 0, 0.09) 0px -1px 3px;"
        let index = horarios.indexOf(hora);
        horarios.splice( index, 1 );
        horarios.forEach((hora)=>{
          hora.style="background-color: transparent";
        })
      })
    })
  }
  if(item == 'veiculo'){
    let veiculos = Array.from(document.querySelectorAll('.veiculo'));
    veiculos.forEach((veiculo)=>{
      veiculo.addEventListener('click', ()=>{
        veiculo.style="background-color: #44B2F7; border: 0; outline: 0; box-shadow: rgba(0, 0, 0, 0.25) 4px 7px 8px,rgba(0, 0, 0, 0.12) 0px 5px 5px,rgba(0, 0, 0, 0.12) 0px 2px 3px,rgba(0, 0, 0, 0.17) 0px 6px 7px,rgba(0, 0, 0, 0.09) 0px -1px 3px;"
        let index = veiculos.indexOf(veiculo);
        veiculos.splice( index, 1 );
        veiculos.forEach((veiculo)=>{
          veiculo.style="background-color: #074376";
        })
      })
    })
  }
  if(item == 'btn'){
    let botoes = Array.from(document.querySelectorAll('.active_day'));
    botoes.forEach((botao)=>{
      botao.addEventListener('click', ()=>{
        botao.style="background-color: #44B2F7; border: 0; outline: 0; box-shadow: rgba(0, 0, 0, 0.25) 4px 7px 8px,rgba(0, 0, 0, 0.12) 0px 5px 5px,rgba(0, 0, 0, 0.12) 0px 2px 3px,rgba(0, 0, 0, 0.17) 0px 6px 7px,rgba(0, 0, 0, 0.09) 0px -1px 3px;"
        let index = botoes.indexOf(botao);
        botoes.splice( index, 1 );
        botoes.forEach((botao)=>{
          botao.style="background-color: transparent";
        })
      })
    })
  }
}



function atual(){
 dropdown.classList.toggle("d-none");
 if(dropdown.getAttribute("id") != "next"){
  dropdown.setAttribute("id", "next");
 }else{
  dropdown.setAttribute("id", "prev");
 }

   
 if(dropdown.getAttribute("id") == "next"){
  months[month] === "Dezembro" ? dropdown.textContent = `${months[0]} ${year+1}` :  dropdown.textContent = `${months[month+1]} ${year}`; // Resolver virada do ano
}else{
    months[month] === "Janeiro" ? dropdown.textContent = `${months[11]} ${year-1}` :  dropdown.textContent = `${months[month-1]} ${year}`; // Resolver virada do ano
  }
}

function atualizar(){

  const btnId = dropdown.getAttribute("id"); 
  if (btnId === "prev" && month === 0) {
    year--;
    month = 11;
    } else if (btnId === "next" && month === 11) {
    year++;
    month = 0;
    } else {
    month = btnId === "next" ? month + 1 : month - 1;
    }

    date = new Date(year, month, new Date().getDate());
    year = date.getFullYear();
    month = date.getMonth();

    console.log(year, month);
    dropdown.classList.toggle("d-none");

    renderCalendar();
}

function hide(){
 dropdown.classList.add("d-none");
}

function servico_foco(servico,){
    content.classList.add("d-none");
    content3.classList.add("d-none");
    content2.classList.remove("d-none");
    document.getElementById("ValorServico").value = servico;
    alert(document.getElementById("ValorServico").value)
}

function agend_foco(){
    content.classList.add("d-none");
    content2.classList.add("d-none");
    content3.classList.remove("d-none");
}

function voltar(){
    content2.classList.add("d-none");
    content3.classList.add("d-none");
    content.classList.remove("d-none");
}

function voltar2(){
    content2.classList.remove("d-none");
    content3.classList.add("d-none");
    content.classList.add("d-none");
}

function mostrar_dia(dia, mes, ano){
alert(dia + ' de ' + months[mes] + ' de ' + ano);
}

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

let date = new Date();
let month = date.getMonth();
let year = date.getFullYear();
let currentDay = date.getDate();
let currentMonth = date.getMonth();


function renderCalendar() {
  const start = new Date(year, month, 1).getDay();
  const endDate = new Date(year, month + 1, 0).getDate();
  const end = new Date(year, month, endDate).getDay();
  const endDatePrev = new Date(year, month, 0).getDate();

  let datesHtml = "";

  for (let i = start; i > 0; i--) {
      datesHtml += `<button class="btn_inactive"><li class="inactive">${endDatePrev - i + 1}</li></button>`;
  }

  for (let i = 1; i <= endDate; i++) {
    let className =
      i === date.getDate() &&
      month === new Date().getMonth() &&
      year === new Date().getFullYear()
        ? ' class="today"'
        : "";

    let data = new Date(year, month, i);
    let diaSemana = data.getDay();
    let dia = data.getDate();
    let mes = data.getMonth();
    let ano = data.getFullYear();


    if(diaSemana == 0){
      datesHtml += `<button class="btn_inactive" style="background:grey;color:white"><li${className}>${i}</li></button>`;
      
    }else{
      if(currentMonth == mes){
        if(currentDay > i){

          datesHtml += `<button class="btn_inactive"><li${className}>${i}</li></button>`;
        
        }else{

          datesHtml += `<button class="active_day" name="data" value="${dia}, ${mes}, ${ano}" onmouseover="selectItens('btn')" onclick="mostrar_dia(${dia}, ${mes}, ${ano})"><li${className}>${i}</li></button>`;

        }

      }else{
        datesHtml += `<button class="active_day" name="data" value="${dia}, ${mes}, ${ano}" onmouseover="selectItens('btn')" onclick="mostrar_dia(${dia}, ${mes}, ${ano})"><li${className}>${i}</li></button>`;

      }

    }
  }

  for (let i = end; i < 6; i++) {
    datesHtml += `<button class="btn_inactive"><li class="inactive">${i - end + 1}</li></button>`;
  }

  dates.innerHTML = datesHtml;
  header.textContent = `${months[month]} ${year}`;

  if(dropdown.getAttribute("id") == "next"){
    months[month] == 11 ? dropdown.textContent = `${months[0]} ${year+1}` :  dropdown.textContent = `${months[month-1]} ${year}`;
  }else{
    dropdown.textContent = `${months[month+1]} ${year}`;
  }
  
}

navs.forEach((nav) => {
  nav.addEventListener("click", (e) => {
    const btnId = e.target.id;

    if (btnId === "prev" && month === 0) {
      year--;
      month = 11;
    } else if (btnId === "next" && month === 11) {
      year++;
      month = 0;
    } else {
      month = btnId === "next" ? month + 1 : month - 1;
    }

    date = new Date(year, month, new Date().getDate());
    year = date.getFullYear();
    month = date.getMonth();

    console.log(year, month);
    renderCalendar();
  });

});

renderCalendar();


function renderCalendar2(ano, mes) {
  const start = new Date(ano, mes, 1).getDay();
  const endDate = new Date(ano, mes + 1, 0).getDate();
  const end = new Date(ano, mes, endDate).getDay();
  const endDatePrev = new Date(ano, mes, 0).getDate();

  let datesHtml = "";

  for (let i = start; i > 0; i--) {
    datesHtml += `<li class="inactive">${endDatePrev - i + 1}</li>`;
  }

  for (let i = 1; i <= endDate; i++) {
    let className =
      i === date.getDate() &&
      month === new Date().getMonth() &&
      year === new Date().getFullYear()
        ? ' class="today"'
        : "";
    datesHtml += `<li${className}>${i}</li>`;
  }

  for (let i = end; i < 6; i++) {
    datesHtml += `<li class="inactive">${i - end + 1}</li>`;
  }

  dates.innerHTML = datesHtml;
  header.textContent = `${months[month]} ${year}`;
  dropdown.textContent = `${months[month+1]} ${year}`;
}