let eye_closed = document.getElementById("eye_closed");
let eye_open = document.getElementById("eye_open");
let senha = document.getElementById("senha");

let telefoneInput = document.getElementById("telefone")

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