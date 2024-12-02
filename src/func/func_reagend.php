<?php

require_once '../lib/conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_agendamento'])) {


    echo $_GET['id_agendamento'];

    $id = $_GET['id_agendamento'];

    $sql = "DELETE FROM agendamento WHERE id_agendamento = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        http_response_code(200);
        echo "Agendamento excluído com sucesso!";
    } else {
        http_response_code(500);
        echo "Erro ao excluir o agendamento.";
    }
} else {
    http_response_code(400);
    echo "Requisição inválida.";
}
?>