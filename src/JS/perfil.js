document.addEventListener('DOMContentLoaded', function() {
    // Captura o botão do sino (Bell) e a tabela
    const editBell = document.querySelector('.perfil .edit:first-child');
    const serviceTable = document.querySelector('.table-container');

    // Esconde a tabela inicialmente
    serviceTable.style.display = 'none';

    // Função para alternar a visibilidade da tabela
    editBell.addEventListener('click', function() {
        if (serviceTable.style.display === 'none') {
            serviceTable.style.display = 'block'; // Exibe a tabela
        } else {
            serviceTable.style.display = 'none'; // Esconde a tabela
        }
    });
});
