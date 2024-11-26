<?php

require_once '../lib/conn.php';
session_start();

extract($_POST);
$id_cliente = $_SESSION['id_cliente'];


if ($acao == 'atualizar_nome') {

    if (empty($nome)) {
        echo '<script>alert("O campo não pode ficar vazio"); window.location.href="../perfil.php";</script>';
        exit;
    }

    $sql = "UPDATE cliente SET nome = :nome WHERE id_cliente = :id_cliente";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":id_cliente", $id_cliente);
    $stmt->execute();
    header("Location: ../perfil.php");

}

if ($acao == 'atualizar_senha') {

    if (empty($senha_atual) || empty($nova_senha)) {
        echo '<script>alert("Todos os campos devem ser preenchidos"); window.location.href="../perfil.php";</script>';
        exit;
    }

    $sqlVerificarSenha = "SELECT senha FROM cliente WHERE id_cliente = :id_cliente";
    $stmt = $conn->prepare($sqlVerificarSenha);
    $stmt->bindValue(":id_cliente", $id_cliente);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        $cliente = $stmt->fetch(PDO::FETCH_OBJ);
        
        if (password_verify($senha_atual, $cliente->senha)) {
            $sqlUpdateCliente = "UPDATE cliente SET senha = :senha WHERE id_cliente = :id_cliente";
            $stmt = $conn->prepare($sqlUpdateCliente);
            $stmt->bindValue(":senha", password_hash($nova_senha, PASSWORD_BCRYPT));
            $stmt->bindValue(":id_cliente", $id_cliente);
            
            if ($stmt->execute()) {
                echo '<script>alert("Senha atualizada com sucesso"); window.location.href="../perfil.php";</script>';
            } else {
                echo '<script>alert("Erro ao atualizar a senha"); window.location.href="../perfil.php";</script>';
            }
        } else {
            echo '<script>alert("Senha atual incorreta"); window.location.href="../perfil.php";</script>';
        }
    }
    exit;
}

if($acao == 'atualizar_endereco'){

    if (empty($endereco)) {
        echo '<script>alert("O campo não pode ficar vazio"); window.location.href="../perfil.php";</script>';
        exit;
    }
    
    $sql = "UPDATE cliente SET endereco = :endereco WHERE id_cliente = :id_cliente";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":endereco", $endereco);
    $stmt->bindValue(":id_cliente", $id_cliente);
    $stmt->execute();

    header("Location: ../perfil.php");
}
if($acao == 'atualizar_telefone'){
    $telefoneFormatado = preg_replace("/[^0-9]/", "", $_POST["telefone"]);
    if (empty($telefone)) {
        echo '<script>alert("O campo não pode ficar vazio"); window.location.href="../perfil.php";</script>';
        exit;
    }
    
    $sql = "UPDATE cliente SET telefone = :telefone WHERE id_cliente = :id_cliente";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":telefone", $telefoneFormatado);
    $stmt->bindValue(":id_cliente", $id_cliente);
    $stmt->execute();
    header("Location: ../perfil.php");
}
if ($acao == 'atualizar_foto') {
    // Verifica se o upload ocorreu sem erros
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $pasta = '../images/upload_clientes/';
        $nomeArquivo = uniqid() . '_' . $_FILES['foto']['name'];
        $caminhoCompleto = $pasta . $nomeArquivo;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoCompleto)) {
            echo "Arquivo movido para: " . $caminhoCompleto;

            $sql = "UPDATE cliente SET foto = :foto WHERE id_cliente = :id_cliente";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":foto", $caminhoCompleto);
            $stmt->bindValue(":id_cliente", $id_cliente);

            if ($stmt->execute()) {
                echo "Foto atualizada com sucesso!";
                header("Location: ../perfil.php");
                exit;
            } else {
                echo "Erro ao executar o UPDATE no banco.";
            }
        } else {
            echo "<script>alert('Erro ao mover o arquivo para a pasta de destino!')</script>";
            header("Location: ../perfil.php");
            exit;
        }
    } else {
        echo "<script>alert('Erro no upload do arquivo!')</script>";
        header("Location: ../perfil.php");
        exit;
    }
}
