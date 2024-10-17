<?php
require_once '../../lib/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Extrair os dados do formulário
    extract($_POST);

    // Verificar se as imagens foram enviadas corretamente

    if($enviar == 'atualizar_informacoes'){

                $sql = "UPDATE informacoes SET texto = :texto, instagram = :instagram, numero = :numero, endereco = :endereco";
    
                $stmt = $conn->prepare($sql);
    
                // Definir os parâmetros
                $stmt->bindValue(':texto', $texto);
                $stmt->bindValue(':instagram', $instagram);
                $stmt->bindValue(':numero', $numero);
                $stmt->bindValue(':endereco', $endereco);
                $stmt->execute();

                echo "<script>alert('Informações atualizadas!')</script>";

    }
        header("Location: ../dashboard.php");
}

?>

