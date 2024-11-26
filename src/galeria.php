<?php

session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] == false) {
    header("Location: ./login.php");
    exit();
}
require_once "./lib/conn.php";
$sqlListarImagensServicos = "SELECT *FROM servico";
$stmt = $conn->query($sqlListarImagensServicos);
$servicos = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/galeria.css">
    <script src="./js/navbar.js" defer></script>
    <title>Galeria de Serviços</title>
</head>

<body>

    <!-- NAVBAR -->

    <div class="header">
    <div class="logo"><img id="jr" src="./images/jr_navbar.svg"><img id="carwash" src="./images/carwash.svg">
            <a href="./func/logout.php"><img id="logout"  src="./images/icons/dashboard/logout_icon.png"></a>
        </div>
        <div class="navbar">
            <ul>
                <li><a href="./agendamento.php">Agendamento</a></li>
                <li><a href="./informacoes.php">Informações</a></li>
                <li style="background-color: #63C3FF;"><a href="./galeria.php">Galeria</a></li>
                <li id="link"><a href="./perfil.php">Perfil</a></li>
            </ul>
        </div>
    </div>

    <!-- CONTEÚDO -->

    <div class="content">
        <?php 
            foreach($servicos as $servico){
        ?>
            <div class="item">  
                <h3><?= $servico->nome?></h3>
                <div class="imagens">
                    <img src="data:image/jpeg;base64,<?= base64_encode($servico->imagem1) ?>" alt="<?= htmlspecialchars($servico->nome) ?>">
                    <img src="data:image/jpeg;base64,<?= base64_encode($servico->imagem2) ?>" alt="<?= htmlspecialchars($servico->nome) ?>">
                </div>
            </div>
                <?php }?>

    </div>


</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let link = document.querySelector("#link");

        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { ?>
            link.innerHTML = "<a href='./admin/dashboard.php'>Dashboard</a>";
        <?php } else { ?>
            link.innerHTML = "<a href='./perfil.php'>Perfil</a>";
        <?php } ?>
    });
</script>

<div class="navbar2">
            <ul>
                <a href="./agendamento.php"><li><div><img src="./images/icons/agendamento/navbar-mobile/agendamento.svg" alt=""></div>Agendamento</li></a>
                <a href="./informacoes.php"><li><div><img src="./images/icons/agendamento/navbar-mobile/informacoes.svg" alt=""></div>Info</li></a>
                <a href="./galeria.php"><li><div class="page_atual"><img src="./images/icons/agendamento/navbar-mobile/galeria.svg" alt=""></div>Galeria</li></a>           
                <a href="./perfil.php"><li><div><img src="./images/icons/agendamento/navbar-mobile/perfil.svg" alt=""></div>Perfil</li></a>
            </ul>
        </div>
</html>