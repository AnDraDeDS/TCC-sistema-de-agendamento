<?php

require_once '../lib/conn.php';

$data = new DateTime();

$mesAtual = $data->format('m');
$anoAtual = date("Y");

$semana1 = 'BETWEEN 01 AND 07';
$semana2 = 'BETWEEN 08 AND 14';
$semana3 = 'BETWEEN 15 AND 21';
$semana4 = 'BETWEEN 22 AND 31';

$sql = "SELECT sum(s.preco) as soma FROM agendamento as a INNER JOIN servico as s ON a.fk_id_servico = s.id_servico WHERE MONTH(a.data) = $mesAtual && a.status = 1 && YEAR(a.data) = $anoAtual && DAY(a.data) $semana1";
$stmt = $conn->query($sql);

$solicitacoes = $stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($solicitacoes as $solicitacao) {
    if($solicitacao->soma == null){
        $sem1 = '0';
    }else{
        
        $sem1 = $solicitacao->soma;
    }
}

$sql = "SELECT sum(s.preco) as soma FROM agendamento as a INNER JOIN servico as s ON a.fk_id_servico = s.id_servico WHERE MONTH(a.data) = $mesAtual && a.status = 1 && YEAR(a.data) = $anoAtual && DAY(a.data) $semana2";
$stmt = $conn->query($sql);

$solicitacoes = $stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($solicitacoes as $solicitacao) {
    if($solicitacao->soma == null){
        $sem2 = '0';
    }else{
        
        $sem2 = $solicitacao->soma;
    }
}

$sql = "SELECT sum(s.preco) as soma FROM agendamento as a INNER JOIN servico as s ON a.fk_id_servico = s.id_servico WHERE MONTH(a.data) = $mesAtual && a.status = 1 && YEAR(a.data) = $anoAtual && DAY(a.data) $semana3";
$stmt = $conn->query($sql);

$solicitacoes = $stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($solicitacoes as $solicitacao) {
    if($solicitacao->soma == null){
        $sem3 = '0';
    }else{
        
        $sem3 = $solicitacao->soma;
    }
}

$sql = "SELECT sum(s.preco) as soma FROM agendamento as a INNER JOIN servico as s ON a.fk_id_servico = s.id_servico WHERE MONTH(a.data) = $mesAtual && a.status = 1 && YEAR(a.data) = $anoAtual && DAY(a.data) $semana4";
$stmt = $conn->query($sql);

$solicitacoes = $stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($solicitacoes as $solicitacao) {
    if($solicitacao->soma == null){
        $sem4 = '0';
    }else{
        
        $sem4 = $solicitacao->soma;
    }
}


echo $sem1 . ',' . $sem2 . ',' . $sem3 . ',' . $sem4;
?>