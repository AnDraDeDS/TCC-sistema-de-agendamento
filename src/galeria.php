<?php

session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] == false) {
    header("Location: ./cadastro.php");
    exit();
}
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
    <link rel="stylesheet" href="./css/galeria.css">
    <script src="./js/navbar.js" defer></script>
    <title>Galeria de Serviços</title>
</head>

<body>

    <!-- NAVBAR -->

    <div class="header">
        <div class="logo"><a href="./func/logout.php"><img id="jr" src="./images/jr_navbar.svg"></a><img id="carwash" src="./images/carwash.svg">
            <div class="space"></div>
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
        <div class="item">
            <h3>LAVAGEM SIMPLES</h3>
            <div class="imagens">
                <img src="./images/galeria/lavagem-simples01.png" alt="">
                <img src="./images/galeria/lavagem-simples02.png" alt="">
            </div>
        </div>
        <div class="item">
            <h3>LAVAGEM COMPLETA</h3>
            <div class="imagens">
                <img src="./images/galeria/lavagem-completa01.png" alt="">
                <img src="./images/galeria/lavagem-completa02.png" alt="">
            </div>
        </div>
        <div class="item">
            <h3>LAVAGEM DE MOTOR</h3>
            <div class="imagens">
                <img src="./images/galeria/lavagem-de-motor01.png" alt="">
                <img src="./images/galeria/lavagem-de-motor02.png" alt="">
            </div>
        </div>
        <div class="item">
            <h3>HIGIENIZAÇÃO DE BANCO</h3>
            <div class="imagens">
                <img src="./images/galeria/higienizacao-de-banco01.png" alt="">
                <img src="./images/galeria/higienizacao-de-banco02.png" alt="">
            </div>
        </div>
        <div class="item">
            <h3>HIGIENIZAÇÃO DE BANCO DE COURO</h3>
            <div class="imagens">
                <img src="./images/galeria/higienizacao-de-banco-de-couro01.png" alt="">
                <img src="./images/galeria/higienizacao-de-banco-de-couro02.png" alt="">
            </div>
        </div>
        <div class="item">
            <h3>HIGIENIZAÇÃO DE TETO</h3>
            <div class="imagens">
                <img src="./images/galeria/higienizacao-de-teto01.png" alt="">
                <img src="./images/galeria/higienizacao-de-teto02.png" alt="">
            </div>
        </div>
        <div class="item">
            <h3>POLIMENTO E CRISTALIZAÇÃO</h3>
            <div class="imagens">
                <img src="./images/galeria/polimento-e-cristalizacao01.png" alt="">
                <img src="./images/galeria/polimento-e-cristalizacao02.png" alt="">
            </div>
        </div>
        <div class="item">
            <h3>POLIMENTO DE FAROL</h3>
            <div class="imagens">
                <img src="./images/galeria/polimento-de-farol01.png" alt="">
                <img src="./images/galeria/polimento-de-farol02.png" alt="">
            </div>
        </div>
    </div>






</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

</html>