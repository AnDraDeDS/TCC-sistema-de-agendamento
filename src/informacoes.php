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
    <link rel="stylesheet" href="./css/informacoes.css">
    <script src="./js/navbar.js" defer></script>
    <title>Informações</title>
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
                <li style="background-color: #63C3FF;"><a href="./informacoes.php">Informações</a></li>
                <li><a href="./galeria.php">Galeria</a></li>
                <li id="link"><a href="./perfil.php">Perfil</a></li>
            </ul>
        </div>
    </div>

    <!-- CONTEÚDO -->

    <div class="content">
        <div class="midia">
            <div class="sobre">
                <h1>SOBRE NÓS</h1>
                <div class="linha"></div>
                <p>A JR Car Wash Estética Automotiva é especializada em cuidar e revitalizar veículos, oferecendo serviços detalhados de lavagem, polimento profissional e higienização interna para manter seu carro impecável.</p>
            </div>
            <div class="redes">
                <h1>LOCALIZAÇÃO E REDES</h1>
                <div class="linha"></div>
                <div class="redes_local">
                    <div class="info" id="info1"><img class="icon" src="./images/icons/informações/whatsapp.svg"><a href="https://wa.me/+5515997646825?text=Ol%C3%A1%20Fl%C3%A1vio%2C%20cheguei%20ao%20seu%20contato%20via%20site%20da%20JR%20Car%20Wash">
                            <h2>(15) 997646825</h2>
                        </a></div>
                    <div class="info" id="info2"><img class="icon" src="./images/icons/informações/instagram.svg">
                        <h2>@jrcar_wash_</h2>
                    </div>
                    <div class="info" id="info3"><img class="icon" src="./images/icons/informações/localizacao.svg"><a href="https://maps.app.goo.gl/ZhLtuquNBv2EsDX57">
                            <h2>Rua senador Laurindo minhoto 411, Tatuí, <br>1827-1480</h2>
                        </a></div>
                </div>

            </div>
        </div>
        <div class="imagens">
            <img src="./images/informacoes/imagem_info_1.png">
            <img src="./images/informacoes/imagem_info_2.png">
            <img src="./images/informacoes/imagem_info_3.png">
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