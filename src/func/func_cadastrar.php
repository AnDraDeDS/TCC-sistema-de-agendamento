<?php 
require_once '../lib/conn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $telefoneFormatado = preg_replace("/[^0-9]/", "", $_POST["telefone"]);
    $senha = $_POST["senha"];
    $caminhoFoto = "../images/upload_clientes/perfil_default.png";
    

    $sqlVerificarCadastro = "SELECT * FROM cliente WHERE telefone = :telefone";
    $verificarCadastro = $conn->prepare($sqlVerificarCadastro);
    $verificarCadastro->bindValue(":telefone", $telefoneFormatado);
    $verificarCadastro->execute();

    if ($verificarCadastro->rowCount() === 0) { // verificando se tem conta
        extract($_POST);
        $sqlInsertCliente = "INSERT INTO cliente (id_cliente,nome,telefone,senha,endereco,foto) VALUES(0,:nome,:telefone,:senha,:endereco, :foto)";
        $inserirCliente = $conn->prepare($sqlInsertCliente);
        $inserirCliente->bindValue(":nome", $nome);
        $inserirCliente->bindValue(":telefone", $telefoneFormatado); 
        $inserirCliente->bindValue(":senha", password_hash($senha, PASSWORD_BCRYPT));
        $inserirCliente->bindValue(":endereco", $endereco);
        $inserirCliente->bindValue(":foto", $caminhoFoto);
        $inserirCliente->execute();
        include './fundos/SucessCadastro.php';

    } else {
        include './fundos/FundoAlertCadastro.php';
    }
}
?>
|