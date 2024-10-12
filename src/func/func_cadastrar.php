<?php 
require_once '../lib/conn.php';
// Sanitiza o telefone
$telefoneFormatado = preg_replace("/[^0-9]/","", $_POST["telefone"]);
$sqlVerificarCadastro = "SELECT * FROM cliente WHERE telefone = :telefone";
$verificarCadastro = $conn->prepare($sqlVerificarCadastro);
$verificarCadastro->bindValue(":telefone", $telefoneFormatado);
$verificarCadastro->execute();
if($verificarCadastro->rowCount() === 0 ){ // verificando se tem conta
    extract($_POST);
    // Debug para verificar o valor recebido
    
    $sqlInsertCliente = "INSERT INTO cliente VALUES(0,:nome,:telefone,:senha,:endereco)";
    $inserirCliente = $conn->prepare($sqlInsertCliente);
    $inserirCliente->bindValue(":nome", $nome);
    $inserirCliente->bindValue(":telefone", $telefoneFormatado); // Usa o telefone sanitizado aqui também
    $inserirCliente->bindValue(":senha", password_hash($senha, PASSWORD_BCRYPT));
    $inserirCliente->bindValue(":endereco", $endereco);
    $inserirCliente->execute();
?>
<script>alert("Conta cadastrada!")</script>
<meta http-equiv="refresh" content="0; url=../login.php"><?php 
} else 
{?>
?>
<script>alert("Conta com telefone já existente")</script>
<meta http-equiv="refresh" content="0; url=../cadastro.php">
<?php
}
?>