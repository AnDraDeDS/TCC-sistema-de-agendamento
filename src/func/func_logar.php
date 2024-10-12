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
            // Redirecionar para a página de agendamento
            header("Location: ../agendamento.html");
        } else {
            echo "<script>alert('Telefone e/ou senha incorretos!');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
    }
}
?>
