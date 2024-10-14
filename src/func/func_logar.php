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
            $_SESSION["logado"] = true;
            if($telefoneFormatado === "15997646825"){
            $_SESSION["admin"] = true;
                header("Location: ../admin/dashboard.php");
            }else {
            header("Location: ../agendamento.php");
            exit();
        }
        } else {
            include './FundoAlertLogin.php';
    }
}
else {
            include './FundoAlertLogin.php';
    }
?>