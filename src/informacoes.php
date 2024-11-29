<?php

session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] == false) {
    header("Location: ./login.php");
    exit();
}
require_once './lib/conn.php';

$sqlListarInformacoes = "SELECT * FROM informacoes";
$stmt = $conn->query($sqlListarInformacoes);
$informacoes = $stmt->fetchAll(PDO::FETCH_OBJ);
foreach($informacoes as $informacao){
$telefoneFormatado = preg_replace("/[^0-9]/", "", $informacao->numero);
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
    <div class="logo"><img id="jr" src="./images/jr_navbar.svg"><img id="carwash" src="./images/carwash.svg">
            <a href="./func/logout.php"><img id="logout"  src="./images/icons/dashboard/logout_icon.png"></a>
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
    <img class="img-mobile" src="./images/informacoes/imagem_info_1.png">
        <div class="midia">
            <div class="sobre">
                <h1>SOBRE NÓS</h1>
                <?php
                    foreach($informacoes as $informacao){
                $telefoneFormatado = preg_replace("/[^0-9]/", "", $informacao->numero);
                    
                ?>
                <div class="linha"></div>
                <p><?= $informacao->texto ?></p>
            </div>
            <div class="redes">
                <h1>LOCALIZAÇÃO E REDES</h1>
                <div class="linha"></div>
                <div class="redes_local">
                    <div class="info" id="info1"><img class="icon" src="./images/icons/informações/whatsapp.svg"><a href="https://wa.me/+55<?= $telefoneFormatado ?>?text=Ol%C3%A1%20Fl%C3%A1vio%2C%20cheguei%20ao%20seu%20contato%20via%20site%20da%20JR%20Car%20Wash`` target="_blank">
                            <h2 id="telefoneFormatado"><?= $informacao->numero ?></h2>
                        </a></div>                                              
                    <div class="info" id="info2"><img class="icon" src="./images/icons/informações/instagram.svg">
                        <h2>@<?= $informacao->instagram ?></h2>
                    </div>
                    <div class="info" id="info3"><img class="icon" src="./images/icons/informações/localizacao.svg"><a href="https://maps.app.goo.gl/ZhLtuquNBv2EsDX57">
                            <h2><?= $informacao->endereco ?></h2>
                        </a></div>
                </div>
                        <?php
                        }
                        ?>
            </div>
        </div>
        <div class="imagens">
            <img src="./images/informacoes/imagem_info_1.png">
            <img src="./images/informacoes/imagem_info_2.png">
            <img src="./images/informacoes/imagem_info_3.png">
        </div>
    </div>


    <div class="navbar2" d-none>
            <ul>
                <a href="./agendamento.php"><li><div><img src="./images/icons/icon_mobile/servicos.svg" alt=""></div>Info</li></a>
                <a href=".informacoes.php"><li><div class="page_atual"><img src="./images/icons/icon_mobile/info.svg" alt=""></div>Agendamento</li></a>
                <a href="./galeria.php"><li><div><img src="./images/icons/icon_mobile/galeria.svg" alt=""></div>Galeria</li></a>           
                <a href="./perfil.php"><li><div><img src="./images/icons/icon_mobile/perfil.svg" alt=""></div>Perfil</li></a>
            </ul>
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