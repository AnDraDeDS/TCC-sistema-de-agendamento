
let content = document.querySelector(".content");
let content2 = document.querySelector(".content_focus");
let content3 = document.querySelector(".content_agenda");

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

var dog = new Date()
var day = dog.getDate();

if(day < 38){
    let numb = day;

    while(numb < 38){
        let dia = document.getElementById(`d${numb}`);
        dia.innerHTML=`${numb}`;
        numb++;
    }
}

if(day > 1){
    let numb2 = day;

    while(numb2 > 1){
        let dia = document.getElementById(`d${numb2}`);
        dia.innerHTML=`${numb2}`;
        numb2--;
    }
}
