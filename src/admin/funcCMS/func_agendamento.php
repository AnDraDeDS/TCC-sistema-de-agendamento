<?php
require_once '../../lib/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    extract($_POST);

    if($acao_req == "confirmar"){
        $sql = "UPDATE agendamento SET status = 1 WHERE id_agendamento = $id_agendamento";
        $stmt = $conn->query($sql);
    }
    if($acao_req == "negar"){
        $sql = "DELETE FROM agendamento WHERE id_agendamento = $id_agendamento";
        $stmt = $conn->query($sql);
    }
        header("Location: ../dashboard.php");

    if($acao_req == "concluir"){
        $sql = "UPDATE agendamento SET status = 2 WHERE id_agendamento = $id_concluir";
        $stmt = $conn->query($sql);
    }
        header("Location: ../dashboard.php");

}

?>

