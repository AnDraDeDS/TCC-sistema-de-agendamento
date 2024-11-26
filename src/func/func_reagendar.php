<?php
require_once '../lib/conn.php';

if (isset($_POST['_method']) && $_POST['_method'] === 'DELETE' && isset($_POST['id_agendamento'])) {
    $id_agendamento = $_POST['id_agendamento'];

    // Preparar a consulta para excluir o agendamento
    $sqlDelete = "DELETE FROM agendamento WHERE id_agendamento = :id_agendamento";
    $stmt = $conn->prepare($sqlDelete);
    $stmt->bindValue(':id_agendamento', $id_agendamento, PDO::PARAM_INT);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Agendamento excluído com sucesso.";
    } else {
        echo "Erro ao excluir agendamento.";
    }
} else {
    // Exibir erro caso o parâmetro não seja passado corretamente
    echo "ID de agendamento ou método de exclusão não informado corretamente.";
}
error_log(print_r($_POST, true));
?>
