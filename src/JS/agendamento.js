
let content = document.querySelector(".content");
let content2 = document.querySelector(".content_focus");

function servico_foco(){
    content.classList.add("d-none");
    content2.classList.remove("d-none");
}

function voltar(){
    content2.classList.add("d-none");
    content.classList.remove("d-none");
}