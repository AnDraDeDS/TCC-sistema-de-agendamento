<?php 
require_once '../lib/conn.php';

$telefoneFormatado = preg_replace("/[^0-9]/","", $_POST["telefone"]);
$sqlVerificarCadastro = "SELECT * FROM cliente WHERE telefone = :telefone";
$verificarCadastro = $conn->prepare($sqlVerificarCadastro);
$verificarCadastro->bindValue(":telefone", $telefoneFormatado);
$verificarCadastro->execute();

if ($verificarCadastro->rowCount() === 0) { // verificando se tem conta
    extract($_POST);

    $sqlInsertCliente = "INSERT INTO cliente VALUES(0,:nome,:telefone,:senha,:endereco)";
    $inserirCliente = $conn->prepare($sqlInsertCliente);
    $inserirCliente->bindValue(":nome", $nome);
    $inserirCliente->bindValue(":telefone", $telefoneFormatado); 
    $inserirCliente->bindValue(":senha", password_hash($senha, PASSWORD_BCRYPT));
    $inserirCliente->bindValue(":endereco", $endereco);
    $inserirCliente->execute();
    include './SucessCadastro.php';
 
} else {
    include './FundoAlertCadastro.php';

}
?>
