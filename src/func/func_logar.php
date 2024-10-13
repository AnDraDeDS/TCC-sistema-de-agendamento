<?php 
    require_once '../lib/conn.php';
    extract($_POST);


    $telefoneFormatado = preg_replace("/[^0-9]/", "", $telefone);

    $sqlVerificarLogin = "SELECT senha FROM cliente WHERE telefone = :telefone LIMIT 1";
    $verificarLogin = $conn->prepare($sqlVerificarLogin);
    $verificarLogin->bindValue(":telefone", $telefoneFormatado);

    $verificarLogin->execute();

    if ($verificarLogin->rowCount() === 1) {

        $cliente = $verificarLogin->fetch(PDO::FETCH_OBJ);

        if (password_verify($senha, $cliente->senha)) {

            session_start();
            $_SESSION["logado"] = 1;

            header("Location: ../agendamento.html");
        } else {
            include './FundoAlertLogin.php';
 
    }
}
?>