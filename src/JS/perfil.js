// document.addEventListener('DOMContentLoaded', function() {
//     // Captura o botão do sino (Bell) e a tabela
//     const editBell = document.querySelector('.perfil .edit:first-child');
//     const serviceTable = document.querySelector('.table-container');
//     const editButton = document.querySelector('.perfil .edit:nth-child(2)');
//     const editModal = document.querySelector('.modal');

//     // Esconde a tabela inicialmente
//     // serviceTable.style.display = 'none';

//     // Função para alternar a visibilidade da tabela
//     editBell.addEventListener('click', function() {
//         if (serviceTable.style.display === 'none') {
//             serviceTable.style.display = 'block'; // Exibe a tabela
//         } else {
//             serviceTable.style.display = 'none'; // Esconde a tabela
//         }
//     });

//     // Função para exibir o modal ao clicar no segundo botão de edição
//     editButton.addEventListener('click', function() {
//         editModal.style.display = 'flex'; // Exibe o modal
//     });
//     // Clicar fora sai
//     editModal.addEventListener("click", function(event) {
//         if(event.target == editModal){
//             editModal.style.display = "none"
//         }
//     })
//     serviceTable.addEventListener("click", function(event) {
//         if(event.target == serviceTable){
//             serviceTable.style.display = "none"
//         }
//     })
//         });
        
