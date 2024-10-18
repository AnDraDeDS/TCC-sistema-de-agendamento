<?php
require_once '../../lib/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Extrair os dados do formulário
    extract($_POST);

    // Verificar se as imagens foram enviadas corretamente

    if($enviar == 'inserir_servico'){

        if ($_FILES['imagem1']['error'] === UPLOAD_ERR_OK && $_FILES['imagem2']['error'] === UPLOAD_ERR_OK) {
    
            // Ler as imagens como binário
            $imagem1 = file_get_contents($_FILES['imagem1']['tmp_name']);
            $imagem2 = file_get_contents($_FILES['imagem2']['tmp_name']);
    
         
                // Query de inserção
                $sql = "INSERT INTO servico (nome, preco, descricao, duracao, imagem1, imagem2)
                        VALUES (:nome, :preco, :descricao, :duracao, :imagem1, :imagem2)";
    
                // Preparar a query
                $stmt = $conn->prepare($sql);
    
                // Definir os parâmetros
                $stmt->bindValue(':nome', $nome);
                $stmt->bindValue(':preco', $preco);
                $stmt->bindValue(':descricao', $descricao);
                $stmt->bindValue(':duracao', $duracao);
                $stmt->bindValue(':imagem1', $imagem1, PDO::PARAM_LOB); // Armazenar imagem1 como BLOB
                $stmt->bindValue(':imagem2', $imagem2, PDO::PARAM_LOB); // Armazenar imagem2 como BLOB
                $stmt->execute();
                // Executar a query
                echo "<script>alert('Serviço cadastrado!')</script>";
        }else{
            echo "<script>alert('Erro ao Cadastrar, tipo de imagem incompatível. Tente imagens jpg')</script>";
        }

    }

    if($enviar == 'atualizar_servico'){

        
        if ($_FILES['imagem1']['error'] === UPLOAD_ERR_OK && $_FILES['imagem2']['error'] === UPLOAD_ERR_OK) {
    
            // Ler as imagens como binário
            $imagem1 = file_get_contents($_FILES['imagem1']['tmp_name']);
            $imagem2 = file_get_contents($_FILES['imagem2']['tmp_name']);
    
         
                // Query de inserção
                $sql = "UPDATE servico SET nome = :nome, preco = :preco, descricao = :descricao, duracao = :duracao, imagem1 = :imagem1, imagem2 = :imagem2 WHERE id_servico = :id_servico";

                // Preparar a query
                $stmt = $conn->prepare($sql);
    
                // Definir os parâmetros
                $stmt->bindValue(':id_servico', $id_servico);
                $stmt->bindValue(':nome', $nome);
                $stmt->bindValue(':preco', $preco);
                $stmt->bindValue(':descricao', $descricao);
                $stmt->bindValue(':duracao', $duracao);
                $stmt->bindValue(':imagem1', $imagem1, PDO::PARAM_LOB); // Armazenar imagem1 como BLOB
                $stmt->bindValue(':imagem2', $imagem2, PDO::PARAM_LOB); // Armazenar imagem2 como BLOB
                $stmt->execute();
                // Executar a query
                echo "<script>alert('Serviço Atualizado!')</script>";
            }
            
            
        }
        
        if($enviar == 'excluir_servico'){
            
            $sql = "DELETE FROM servico WHERE id_servico = :id_servico";
            
            // Preparar a query
            $stmt = $conn->prepare($sql);
            
            // Definir os parâmetros
            $stmt->bindValue(':id_servico', $id_servico);
            $stmt->execute();
            
        }
        
        
        header("Location: ../dashboard.php");
}

?>

