let telefoneInput = document.getElementById("call")
// abrir o modal e preencher os dados
function openModal(modalId, inputId) {
    const modal = new bootstrap.Modal(document.getElementById(modalId));
    modal.show();

    if (inputId) {
        const inputField = document.getElementById(inputId);
        inputField.value = userInfo[inputId] || '';
    }
}

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("item1").addEventListener("click", () => openModal('modalnome', 'recipient-name'));
    document.getElementById("item2").addEventListener("click", () => openModal('senha'));
    document.getElementById("item3").addEventListener("click", () => openModal('telefone', 'call'));
    document.getElementById("item4").addEventListener("click", () => openModal('endereco', 'address'));
    document.getElementById("lapinho").addEventListener("click", () => openModal('img'));

// Edição de senha
    document.querySelector('#senha .confirm-btn').addEventListener("click", function () {
        const senhaAtual = document.getElementById('senha-atual').value;
        const novaSenha = document.getElementById('nova-senha').value;
    });


    // edição de Nome
    document.querySelector('#modalnome .confirm-btn').addEventListener("click", function () {
        const newName = document.getElementById('recipient-name').value;
        userInfo.nome = newName;
        updateUserInfo();
        bootstrap.Modal.getInstance(document.getElementById('modalnome')).hide();
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
        window.location.href = "agendamento.php";
    });
});

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
  
  document.querySelector('form').addEventListener('submit', function(event) {
    const telefone = document.getElementById('telefone').value;
    if (telefone.length < 15 || telefone.length > 15) {
      alert('Por favor, insira um número de telefone válido com 15 dígitos.');
      event.preventDefault(); // Impede o envio do formulário
    }
  });