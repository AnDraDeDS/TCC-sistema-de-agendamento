// armazenamento das infos atuais
let userInfo = {
    nome: "Flavio Costa e Silva Junior",
    senha: "senha123", // Coloque a senha real aqui
    telefone: "15997653976",
    endereco: "Rua num sei oq do sei que lá",
};

// abrir o modal e preencher os dados
function openModal(modalId, inputId) {
    const modal = new bootstrap.Modal(document.getElementById(modalId));
    modal.show();

    if (inputId) {
        const inputField = document.getElementById(inputId);
        inputField.value = userInfo[inputId] || '';
    }
}



// atualiza as informações na interface
function updateUserInfo() {
    document.querySelector("#item1 p:nth-child(2)").innerText = userInfo.nome;
    document.querySelector("#item2 p:nth-child(2)").innerText = "********"; // Manter senha oculta
    document.querySelector("#item3 p:nth-child(2)").innerText = userInfo.telefone;
    document.querySelector("#item4 p:nth-child(2)").innerText = userInfo.endereco;
}

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("item1").addEventListener("click", () => openModal('modalnome', 'recipient-name'));
    document.getElementById("item2").addEventListener("click", () => openModal('senha'));
    document.getElementById("item3").addEventListener("click", () => openModal('telefone', 'call'));
    document.getElementById("item4").addEventListener("click", () => openModal('endereco', 'address'));
    document.getElementById("lapinho").addEventListener("click", () => openModal('img'));

    // edição de Nome
    document.querySelector('#modalnome .confirm-btn').addEventListener("click", function () {
        const newName = document.getElementById('recipient-name').value;
        userInfo.nome = newName;
        updateUserInfo();
        bootstrap.Modal.getInstance(document.getElementById('modalnome')).hide();
    });

    // edição de Senha
    document.querySelector('#senha .confirm-btn').addEventListener("click", function () {
        const currentPassword = document.getElementById('current-password').value;
        const newPassword = document.getElementById('password').value;

        if (currentPassword === userInfo.senha) {
            userInfo.senha = newPassword;
            alert("Senha alterada com sucesso!");
            bootstrap.Modal.getInstance(document.getElementById('senha')).hide();
        } else {
            alert("Senha atual incorreta. Tente novamente.");
        }
    });

    // edição de Telefone
    document.querySelector('#telefone .confirm-btn').addEventListener("click", function () {
        const newPhone = document.getElementById('call').value;
        userInfo.telefone = newPhone;
        updateUserInfo();
        bootstrap.Modal.getInstance(document.getElementById('telefone')).hide();
    });

    // edição de Endereço
    document.querySelector('#endereco .confirm-btn').addEventListener("click", function () {
        const newAddress = document.getElementById('address').value;
        userInfo.endereco = newAddress;
        updateUserInfo();
        bootstrap.Modal.getInstance(document.getElementById('endereco')).hide();
    });

    // redirecionamento
    document.getElementById("reagend").addEventListener("click", function () {
        window.location.href = "agendamento.html";
    });
});