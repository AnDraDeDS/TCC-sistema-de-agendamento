
let content = document.querySelector(".content");
let content2 = document.querySelector(".content_focus");
let content3 = document.querySelector(".content_agenda");
let button_mes = document.querySelector("#mes");
let dropdown = document.querySelector(".dropdown-menu");

const header = document.querySelector(".calendar button");
const navs = document.querySelectorAll("#prev, #next");
const dates = document.querySelector(".dates");

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

function servico_foco(){
    content.classList.add("d-none");
    content3.classList.add("d-none");
    content2.classList.remove("d-none");
}

function agend_foco(){
    content.classList.add("d-none");
    content2.classList.add("d-none");
    content3.classList.remove("d-none");
}

function voltar(){
    content2.classList.add("d-none");
    content.classList.remove("d-none");
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

function renderCalendar() {
  const start = new Date(year, month, 1).getDay();
  const endDate = new Date(year, month + 1, 0).getDate();
  const end = new Date(year, month, endDate).getDay();
  const endDatePrev = new Date(year, month, 0).getDate();

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

  if(dropdown.getAttribute("id") == "next"){
    months[month] == 11 ? dropdown.textContent = `${months[0]} ${year+1}` :  dropdown.textContent = `${months[month-1]} ${year}`; // Resolver virada do ano
  }else{
    dropdown.textContent = `${months[month+1]} ${year}`; //
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