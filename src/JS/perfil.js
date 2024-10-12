// GMMF (Gambiarra Muito Mal Feita)
const editButton = document.getElementById('lapinho');
const modal = document.querySelector('.edicao');
const nameInput = document.getElementById('name');
const callInput = document.getElementById('call');
const currentPasswordInput = document.getElementById('current-password');
const newPasswordInput = document.getElementById('password');
const addressInput = document.getElementById('address');

// dados
const nameDisplay = document.querySelector('#item1 p:last-child');
const callDisplay = document.querySelector('#item2 p:last-child');
const passwordDisplay = document.querySelector('#item3 p:last-child');
const addressDisplay = document.querySelector('#item4 p:last-child');

// edit
const fileInput = document.getElementById('file-upload');
const uploadBox = document.querySelector('.upload-box');
const perfil = document.querySelector('.perfil');
const confirmButton = document.querySelector('.confirm-btn');
const currentActualPassword = "senha123";


document.getElementById("lapinho").addEventListener("click", function() {
    document.querySelector(".edicao").style.display = "flex"; // aparece o modal
    });

// tudo que abre tem que fechar ne
confirmButton.addEventListener('click', (e) => {
        e.preventDefault(); 
        
// verificacao de senha
if (currentPasswordInput.value !== currentActualPassword) {
    alert("Senha atual está incorreta."); 
    return; 
}

document.getElementById("reagend").addEventListener("click", function () {
    window.location.href = "agendamento.html"; //redirecionamento
});

document.querySelector(".edicao").addEventListener("click", function(event) {
    if (event.target === document.querySelector(".edicao")) {
        document.querySelector(".edicao").style.display = "none";  //fecha no blur
    }
});

//atualizaçao
fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0]; //coleta
    if (file) {
        const reader = new FileReader(); 
        reader.onload = (event) => {
            perfil.style.backgroundImage = `url(${event.target.result})`; //resulta
        };
        reader.readAsDataURL(file);
    }
});

    nameDisplay.textContent = nameInput.value || "Flavio Costa e Silva Junior";
    callDisplay.textContent = callInput.value || "15997653976";
    passwordDisplay.textContent = newPasswordInput.value ? "********" : "********"; // Oculta a senha 
    addressDisplay.textContent = addressInput.value || "Rua num sei oq do sei que lá";


    nameInput.value = '';
    callInput.value = '';
    currentPasswordInput.value = '';
    newPasswordInput.value = '';
    addressInput.value = '';

    modal.style.display = 'none';
});




