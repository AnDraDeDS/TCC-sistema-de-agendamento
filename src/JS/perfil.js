function excluir(id_agendamento) {
    console.log(`Tentando excluir o agendamento com ID: ${id_agendamento}`);
    if (confirm('Tem certeza que deseja excluir este agendamento?')) {

        // envia a requisição pra excluir o agendamento
        fetch(`../func/func_reagend.php?id_agendamento=${id_agendamento}`, {
            method: 'DELETE' 
        })
        .then(response => response.text()) 
        .then(data => {
            if (data.includes('Agendamento excluído com sucesso')) { 
                alert(data);
                location.reload(); 
            } else {
                alert('Erro ao excluir o agendamento.');
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

        fetch(`http://localhost/TCC/func/func_reagend.php?id_agendamento=${id_agendamento}`, {
            method: 'DELETE'
        })
        .then(response => response.text())
        .then(data => {
            if (data.includes('Agendamento excluído com sucesso')) {
                alert(data);

                window.location.href = `http://localhost/TCC/src/agendamento.php`;
            } else {
                alert('Erro ao excluir o agendamento.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao tentar excluir.');
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
