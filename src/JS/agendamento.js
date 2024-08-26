
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