// GMMF (Gambiarra Muito Mal Feita)
// elementos do modal
const editButton = document.getElementById('lapinho');
const modal = document.querySelector('.edicao');
const nameInput = document.getElementById('name');
const callInput = document.getElementById('call');
const currentPasswordInput = document.getElementById('current-password'); // Este campo precisa existir no HTML
const newPasswordInput = document.getElementById('password');
const addressInput = document.getElementById('address');

// exibição de dados
const nameDisplay = document.querySelector('#item1 p:last-child');
const callDisplay = document.querySelector('#item3 p:last-child');
const passwordDisplay = document.querySelector('#item2 p:last-child');
const addressDisplay = document.querySelector('#item4 p:last-child');

// editar imagem de perfil
const fileInput = document.getElementById('file-upload');
const uploadBox = document.querySelector('.upload-box');
const perfil = document.querySelector('.perfil');
const confirmButton = document.querySelector('.confirm-btn');
const currentActualPassword = "senha123"; // senha pra validacao

// exibicao
editButton.addEventListener("click", function() {
    modal.style.display = "flex"; 
});

// blur
modal.addEventListener("click", function(event) {
    if (event.target === modal) {
        modal.style.display = "none"; 
    }
});

// atualizacao img
fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (event) => {
            perfil.style.backgroundImage = `url(${event.target.result})`; 
        };
        reader.readAsDataURL(file);
    }
});

// verifica atual
confirmButton.addEventListener('click', (e) => {
    e.preventDefault(); 
    
    // verificacao
    if (currentPasswordInput && currentPasswordInput.value !== currentActualPassword) {
        alert("Senha atual está incorreta.");
        return; 
    }

    // atualizacao
    nameDisplay.textContent = nameInput.value || nameDisplay.textContent;
    callDisplay.textContent = callInput.value || callDisplay.textContent;
    passwordDisplay.textContent = newPasswordInput.value ? "********" : passwordDisplay.textContent; // Oculta a senha
    addressDisplay.textContent = addressInput.value || addressDisplay.textContent;

    // da clean nos campos
    nameInput.value = '';
    callInput.value = '';
    currentPasswordInput.value = '';
    newPasswordInput.value = '';
    addressInput.value = '';

    // fecha modal
    modal.style.display = 'none';
});

// redirecionamento
document.getElementById("reagend").addEventListener("click", function () {
    window.location.href = "agendamento.html";
});
