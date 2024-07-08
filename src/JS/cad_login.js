let eye_closed = document.getElementById("eye_closed");
let eye_open = document.getElementById("eye_open");
let senha = document.getElementById("senha");


function olhar() {
    eye_open.classList.add("d-none");
    eye_closed.classList.remove("d-none");
    senha.removeAttribute("type");
    senha.setAttribute("type", "text");
}

function esconder() {
    eye_closed.classList.add("d-none");
    eye_open.classList.remove("d-none");
    senha.removeAttribute("type");
    senha.setAttribute("type", "password"); 
}