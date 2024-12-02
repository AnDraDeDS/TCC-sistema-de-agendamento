<?php

require_once '../lib/conn.php';
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_agendamento'])) {
    $id = $_GET['id_agendamento'];

    $sql = "DELETE FROM agendamento WHERE id_agendamento = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        http_response_code(200);
        echo "Antigo agendamento excluído com sucesso";
        header("Location: ../perfil.php");
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Erro ao excluir o agendamento.']);
    }
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Requisição inválida.']);
}
