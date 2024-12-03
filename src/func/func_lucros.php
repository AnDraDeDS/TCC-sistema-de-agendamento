<?php

require_once '../lib/conn.php';

$anoAtual = date("Y");

$mes = 1;

while ($mes <= 12) {

    $sql = "SELECT sum(s.preco) as soma FROM agendamento as a INNER JOIN servico as s ON a.fk_id_servico = s.id_servico WHERE MONTH(a.data) = $mes && a.status = 2 && YEAR(a.data) = $anoAtual";
    $stmt = $conn->query($sql);

    $solicitacoes = $stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($solicitacoes as $solicitacao) {
    
    if($mes == 1){
        if($solicitacao->soma == null){
        $janeiro = '0';
        }else{
        
        $janeiro = $solicitacao->soma;
        }
    }

    if($mes == 2){
        if($solicitacao->soma == null){
        $fevereiro = '0';
        }else{
        
        $fevereiro = $solicitacao->soma;
        }
    }

    if($mes == 3){
        if($solicitacao->soma == null){
        $marco = '0';
        }else{
        
        $marco = $solicitacao->soma;
        }
    }

    if($mes == 4){
        if($solicitacao->soma == null){
        $abril = '0';
        }else{
        
        $abril = $solicitacao->soma;
        }
    }

    if($mes == 5){
        if($solicitacao->soma == null){
        $maio = '0';
        }else{
        
        $maio = $solicitacao->soma;
        }
    }

    if($mes == 6){
        if($solicitacao->soma == null){
        $junho = '0';
        }else{
        
        $junho = $solicitacao->soma;
        }
    }

    if($mes == 7){
        if($solicitacao->soma == null){
        $julho = '0';
        }else{
        
        $julho = $solicitacao->soma;
        }
    }

    if($mes == 8){
        if($solicitacao->soma == null){
        $agosto = '0';
        }else{
        
        $agosto = $solicitacao->soma;
        }
    }

    if($mes == 9){
        if($solicitacao->soma == null){
        $setembro = '0';
        }else{
        
        $setembro = $solicitacao->soma;
        }
    }

    if($mes == 10){
        if($solicitacao->soma == null){
        $outubro = '0';
        }else{
        
        $outubro = $solicitacao->soma;
        }
    }

    if($mes == 11){
        if($solicitacao->soma == null){
        $novembro = '0';
        }else{
        
        $novembro = $solicitacao->soma;
        }
    }

    if($mes == 12){
        if($solicitacao->soma == null){
        $dezembro = '0';
        }else{
        
        $dezembro = $solicitacao->soma;
        }
    }
}

$mes++;
    
}


echo $janeiro . ',' . $fevereiro . ',' . $marco . ',' . $abril . ',' . $maio . ',' . $junho . ',' . $julho . ',' . $agosto . ',' . $setembro . ',' . $outubro . ',' . $novembro . ',' . $dezembro;
?>