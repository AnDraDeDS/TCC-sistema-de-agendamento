<?php
require_once '../../lib/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    extract($_POST);

    if ($acao_req == "confirmar") {
        $sql = "UPDATE agendamento SET status = :status WHERE id_agendamento = :id_agendamento";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":status", 1);
        $stmt->bindValue(":id_agendamento", $id_agendamento);
        $stmt->execute();
    }
    
    if ($acao_req == "negar") {
        $sql = "DELETE FROM agendamento WHERE id_agendamento = :id_agendamento";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id_agendamento", $id_agendamento);
        $stmt->execute();
    }
    
     header("Location: ../dashboard.php");

}

?>

