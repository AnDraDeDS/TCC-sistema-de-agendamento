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

}
if($acao == 'atualizar_telefone'){

    if (empty($telefone)) {
        echo '<script>alert("O campo não pode ficar vazio"); window.location.href="../perfil.php";</script>';
        exit;
    }
    
    $sql = "UPDATE cliente SET telefone = :telefone WHERE id_cliente = :id_cliente";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":telefone", $telefone);
    $stmt->bindValue(":id_cliente", $id_cliente);
    $stmt->execute();

}
if($acao == 'atualizar_foto'){

    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    

    $imagem1 = file_get_contents($_FILES['foto']['tmp_name']);

    $sql = "UPDATE cliente SET foto = :foto WHERE id_cliente = :id_cliente";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":foto", $foto, PDO::PARAM_LOB);
    $stmt->bindValue(":id_cliente", $id_cliente);
    $stmt->execute();
    
    }

}

header("Location: ../perfil.php");

?>