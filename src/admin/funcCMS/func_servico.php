<?php
require_once '../../lib/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Extrair os dados do formulário
    extract($_POST);

    // Definir a pasta para upload das imagens
    $pasta = "../../images/upload_servicos/";

    if ($enviar == 'inserir_servico') {

        // Verificar se as imagens foram enviadas sem erro
        if ($_FILES['imagem1']['error'] === UPLOAD_ERR_OK && $_FILES['imagem2']['error'] === UPLOAD_ERR_OK) {

            // Gerar nomes únicos para as imagens usando uniqid()
            $imagem1_nome = uniqid() . "_" . basename($_FILES['imagem1']['name']);
            $imagem2_nome = uniqid() . "_" . basename($_FILES['imagem2']['name']);

            // Caminho completo para salvar as imagens
            $imagem1_caminho = $pasta . $imagem1_nome;
            $imagem2_caminho = $pasta . $imagem2_nome;

            // Mover os arquivos para a pasta de destino
            if (move_uploaded_file($_FILES['imagem1']['tmp_name'], $imagem1_caminho) &&
                move_uploaded_file($_FILES['imagem2']['tmp_name'], $imagem2_caminho)) {

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
                $stmt->bindValue(':imagem1', $imagem1_caminho); // Salvar caminho da imagem1
                $stmt->bindValue(':imagem2', $imagem2_caminho); // Salvar caminho da imagem2

                // Executar a query
                if ($stmt->execute()) {
                    echo "<script>alert('Serviço cadastrado com sucesso!')</script>";
                } else {
                    echo "<script>alert('Erro ao cadastrar serviço no banco de dados.')</script>";
                }
            } else {
                echo "<script>alert('Erro ao mover as imagens para o servidor.')</script>";
            }
        } else {
            echo "<script>alert('Erro ao Cadastrar, tipo de imagem incompatível. Tente imagens jpg ou png.')</script>";
        }
    }

    if ($enviar == 'atualizar_servico') {

        // Query básica de atualização
        $sql = "UPDATE servico SET nome = :nome, preco = :preco, descricao = :descricao, duracao = :duracao";

        // Verificar se uma nova imagem foi enviada e mover para a pasta
        if ($_FILES['imagem1']['error'] === UPLOAD_ERR_OK) {
            $imagem1_nome = uniqid() . "_" . basename($_FILES['imagem1']['name']);
            $imagem1_caminho = $pasta . $imagem1_nome;
            if (move_uploaded_file($_FILES['imagem1']['tmp_name'], $imagem1_caminho)) {
                $sql .= ", imagem1 = :imagem1";
            }
        }
        if ($_FILES['imagem2']['error'] === UPLOAD_ERR_OK) {
            $imagem2_nome = uniqid() . "_" . basename($_FILES['imagem2']['name']);
            $imagem2_caminho = $pasta . $imagem2_nome;
            if (move_uploaded_file($_FILES['imagem2']['tmp_name'], $imagem2_caminho)) {
                $sql .= ", imagem2 = :imagem2";
            }
        }

        $sql .= " WHERE id_servico = :id_servico";

        // Preparar a query
        $stmt = $conn->prepare($sql);

        // Definir os parâmetros
        $stmt->bindValue(':id_servico', $id_servico_update);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':preco', $preco);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue(':duracao', $duracao);

        // Adicionar caminhos das imagens se enviadas
        if (isset($imagem1_caminho)) {
            $stmt->bindValue(':imagem1', $imagem1_caminho);
        }
        if (isset($imagem2_caminho)) {
            $stmt->bindValue(':imagem2', $imagem2_caminho);
        }

        // Executar a query
        if ($stmt->execute()) {
            echo "<script>alert('Serviço atualizado com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro ao atualizar serviço no banco de dados.')</script>";
        }
    }

    if ($enviar == 'excluir_servico') {
        $sql = "DELETE FROM servico WHERE id_servico = :id_servico";
        
        // Preparar a query
        $stmt = $conn->prepare($sql);
        
        // Definir os parâmetros
        $stmt->bindValue(':id_servico', $id_servico_delete);
        $stmt->execute();
        
        
        
        echo "<script>alert('Serviço Apagado com sucesso!')</script>";
    }
    
    if($enviar == 'excluir_cliente'){
        
        $sql = "DELETE FROM cliente WHERE id_cliente = :delete_id_cli ";
        
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":delete_id_cli", $delete_id_cli);

        $stmt->execute();
        
        echo "<script>alert('Cliente Apagado com sucesso!')</script>";
    }
    
    var_dump($_POST);
        header("Location: ../dashboard.php");
        exit;
}
    ?>