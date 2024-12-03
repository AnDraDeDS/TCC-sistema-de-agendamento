<?php 
require_once '../lib/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    extract($_POST);

    $telefoneFormatado = preg_replace("/[^0-9]/", "", $telefone);

    // Verificar admin
    $sqlVerificarAdmin = "SELECT id_admin, senha FROM admin WHERE telefone = :telefone LIMIT 1"; 
    $stmtAdmin = $conn->prepare($sqlVerificarAdmin);
    $stmtAdmin->bindValue(":telefone", $telefoneFormatado);
    $stmtAdmin->execute();

    if ($stmtAdmin->rowCount() === 1) {
        $admin = $stmtAdmin->fetch(PDO::FETCH_OBJ);

        // Verifica a senha do admin
        if (password_verify($senha, $admin->senha)) { 
            $_SESSION["logado"] = true;
            $_SESSION["admin"] = true;
            $_SESSION["id_admin"] = $admin->id_admin;
            header("Location: ../admin/dashboard.php");
            exit();
        }
    }

    // Verificar cliente
    $sqlVerificarLogin = "SELECT id_cliente, senha FROM cliente WHERE telefone = :telefone LIMIT 1";
    $verificarLogin = $conn->prepare($sqlVerificarLogin);
    $verificarLogin->bindValue(":telefone", $telefoneFormatado);
    $verificarLogin->execute();

    if ($verificarLogin->rowCount() === 1) {
        $cliente = $verificarLogin->fetch(PDO::FETCH_OBJ);

        // Verifica a senha do cliente
        if (password_verify($senha, $cliente->senha)) {
            $_SESSION["logado"] = true;
            $_SESSION["id_cliente"] = $cliente->id_cliente;
            header("Location: ../agendamento.php");
            exit();
        }
    }

    // Se não encontrar nenhum login válido
    include './fundos/FundoAlertLogin.php'; 
}



?>