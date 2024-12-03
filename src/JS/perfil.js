function excluir(id_agendamento) {
    console.log(`Tentando excluir o agendamento com ID: ${id_agendamento}`);
    if (confirm('Tem certeza que deseja excluir este agendamento?')) {
        fetch(`http://localhost/TCC/src/func/func_reagend.php?id_agendamento=${id_agendamento}`, {
            method: 'GET'
        })
        .then(response => response.json())
        .then(data => {
            console.log('Resposta do servidor:', data);
            if (data.success) {
                alert(data.message); 
                location.reload(); 
            } else {
                alert(data.message); 
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao tentar excluir.');
        });
    }
}


function reagendar(id_agendamento) {
    console.log(`Reagendando o agendamento com ID: ${id_agendamento}`);
    if (confirm('Tem certeza que deseja reagendar este agendamento?')) {
        fetch(`http://localhost/TCC/src/func/func_reagend.php?id_agendamento=${id_agendamento}`, {
            method: 'GET'
        })
        .then(response => response.json()) 
        .then(data => {
            console.log('Resposta do servidor:', data);
            if (data.success) { 
                alert(data.message); 
                window.location.href = `http://localhost/TCC/src/agendamento.php`; // Redireciona
            } else {
                alert(data.message); 
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao tentar reagendar.');
        });
    }
}



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

    // Edição de Nome
    document.querySelector('#modalnome .confirm-btn').addEventListener("click", function () {
        const newName = document.getElementById('recipient-name').value;
        userInfo.nome = newName;
        updateUserInfo();
        bootstrap.Modal.getInstance(document.getElementById('modalnome')).hide();
    });

    // Edição de Telefone
    document.querySelector('#telefone .confirm-btn').addEventListener("click", function () {
        const newPhone = document.getElementById('call').value;
        userInfo.telefone = newPhone;
        updateUserInfo();
        bootstrap.Modal.getInstance(document.getElementById('telefone')).hide();
    });

    // Edição de Endereço
    document.querySelector('#endereco .confirm-btn').addEventListener("click", function () {
        const newAddress = document.getElementById('address').value;
        userInfo.endereco = newAddress;
        updateUserInfo();
        bootstrap.Modal.getInstance(document.getElementById('endereco')).hide();
    });
});
document.querySelector('#modalnome .confirm-btn').addEventListener("click", function () {
    const newName = document.getElementById('recipient-name').value;
    userInfo.nome = newName;
    updateUserInfo();
    bootstrap.Modal.getInstance(document.getElementById('modalnome')).hide();
});

let telefoneInput = document.querySelector("input#call");
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