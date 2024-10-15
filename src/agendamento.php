<?php 
session_start();
if(!isset($_SESSION['logado']) || $_SESSION['logado'] == false){
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
    <link rel="stylesheet" href="../src/css/agendamento.css">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> <!--font awesome-->
    <title>Agendamento</title>
</head>
<body>

    <!-- NAVBAR -->

    <div class="header">
    <div class="logo"><a href="./func/logout.php"><img id="jr" src="./images/jr_navbar.svg"></a><img id="carwash" src="./images/carwash.svg">
      <div class="space"></div>
    </div>
    <div class="navbar">
      <ul>
        <li><a href="./agendamento.php"style="background-color: #63C3FF;">Agendamento</a></li>
        <li><a href="./informacoes.php">Informações</a></li>
        <li><a href="./galeria.php">Galeria</a></li>
        <li id="link"><a href="./perfil.php">Perfil</a></li>
      </ul>
    </div>
  </div>
        <p class="pageName">SERVIÇOS</p>

    <!-- CONTEÚDOS -->

        <div class="content">
        <form class="content" action="./func/func_agendar.php" method="post">
            <div class="item item1">
                <span></span>
                    <h3>Lavagem Simples</h3>
                    <div class="texto">
                        <p>A partir de <span style="font-weight: bold;">R$30</span></p>
                        <button class="agendar" type="button" onclick="servico_foco('Lavagem Simples')"></button>
                    </div>
            </div>
            <div class="item item2">
                <span></span>
                <h3>Polimento de Farol</h3>
                    <div class="texto">
                        <p>A partir de <span style="font-weight: bold;">R$120</span></p>
                        <button class="agendar" type="button" onclick="servico_foco('Polimento de Farol')"></button>
                    </div>
            </div>
            <div class="item item3">
                <span></span>
                <h3>Polimento e Cristalização</h3>
                <div class="texto">
                    <p>A partir de <span style="font-weight: bold;">R$350</span></p>
                    <button class="agendar" type="button" onclick="servico_foco('Polimento e Cristalização')"></button>
                </div> 
            </div>
            <div class="item item4">
                <span></span>
                <h3>Lavagem de Motor</h3>
                <div class="texto">
                    <p>A partir de <span style="font-weight: bold;">R$30</span></p>
                    <button class="agendar" type="button" onclick="servico_foco('Lavagem de Motor')"></button>
                </div>
            </div>
            <div class="item item5">
                <span></span>
                <h3>Lavagem Completa</h3>
                <div class="texto">
                    <p>A partir de <span style="font-weight: bold;">R$70</span></p>
                    <button class="agendar" type="button" onclick="servico_foco('Lavagem Completa')"></button>
                </div>
            </div>
            <div class="item item6">
                <span></span>
                <h3>Hig. Banco de Couro</h3>
                <div class="texto">
                    <p>A partir de <span style="font-weight: bold;">R$200</span></p>
                    <button class="agendar" type="button" onclick="servico_foco('Hig. Banco de Couro')"></button>
                </div>
            </div>
            <div class="item item7">
                <span></span>
                <h3>Higienização de Teto</h3>
                <div class="texto">
                    <p>A partir de <span style="font-weight: bold;">R$100</span></p>
                    <button class="agendar" type="button" onclick="servico_foco('Higienização de Teto')"></button>
                </div>
            </div>
            <div class="item item8">
                <span></span>
                <h3>Higienização de Banco</h3>
                <div class="texto">
                    <p>A partir de <span style="font-weight: bold;">R$280</span></p>
                    <button class="agendar" type="button" onclick="servico_foco('Higienização de Banco')"></button>
                </div>
            </div>
            <input type="hidden" id="ValorServico" name="ValorServico">
        </div>
        
        <div class="content_focus d-none">
            <button class="button_voltar" onclick="voltar()">
                <img src="./images/icons/agendamento/icon_seta.svg" alt="">
            </button>
            <div class="side">
                <h1>HIGIENIZAÇÃO DE BANCO DE COURO</h1>
                <p>Lavagem completa do veículo acompanhada de uma higienização profunda dos bancos removendo sujeiras e odores. </p>
                <p><span style="color: #63C3FF; font-weight: 700;">Duração:</span> 2 dias</p>

                <button type="button" onclick="agend_foco()">CONFIRMAR<br>SELEÇÃO</button>

            </div>
            <div class="aside">
                <img src="./images/agendamento/higienizacao-de-banco.png" alt="">
                <img src="./images/agendamento/higienizacao-de-banco_2.png" alt="">
            </div>
        </div>
        
        <div class="content_agenda d-none">
                <button class="button_voltar" onclick="voltar2()">
                    <img src="./images/icons/agendamento/icon_seta.svg" alt="">
                </button>
                <div class="side">
                    <div class="calendar">
                        <header>
                            <button class="buttons btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="atual()">
                                <img src="../images/icons/dashboard/icon_seta.svg" alt="" class="arrow">
                            </button>
                            <button type="button" class="buttons dropdown-menu d-none prox-mes" onclick="atualizar()"></button>
                        </header>
                        <section style="width: 90%; height: 90%;">
                            <ul class="days" style="padding: 0; padding-bottom: 20px; border-bottom: 1px solid #8A8A8A">
                                <li>D</li>
                                <li>S</li>
                                <li>T</li>
                                <li>Q</li>
                                <li>Q</li>
                                <li>S</li>
                                <li>S</li>
                            </ul>
                            <ul class="dates" style="padding: 0; display: flex;"></ul>
                        </section>
                    </div>
                </div>
                
                <div class="aside">
                    <div class="opcoes">
                        <div class="fechado"><div class="circle"></div> <p>Indisponível</p></div>
                        <div class="aberto"><div class="circle"></div><p>Selecionado</p></div>
                    </div>
                    
                    <div class="horarios">
                        <h1 id="title">HORÁRIOS</h1>
                        <button type="button" class="horario" name="horario" onmouseover="selectItens('horario')" value="08:00 - 09:30" id="hora1">08:00 - 09:30</button>
                        <button type="button" class="horario" name="horario" onmouseover="selectItens('horario')" value="09:30 - 11:00" id="hora2">09:30 - 11:00</button>
                        <button type="button" class="horario" name="horario" onmouseover="selectItens('horario')" value="11:00 - 12:30" id="hora3">11:00 - 12:30</button>
                        <button type="button" class="horario" name="horario" onmouseover="selectItens('horario')" value="12:30 - 14:00" id="hora4">12:30 - 14:00</button>
                        <button type="button" class="horario" name="horario" onmouseover="selectItens('horario')" value="14:00 - 15:30" id="hora5">14:00 - 15:30</button>
                        <button type="button" class="horario" name="horario" onmouseover="selectItens('horario')" value="15:30 - 17:00" id="hora6">15:30 - 17:00</button>
                    </div>
                    <div class="line"></div> 
                    
                    <div class="veiculos">
                        <h1 id="title">VEÍCULOS</h1>
                        <button type="button" class="veiculo" onmouseover="selectItens('veiculo')" name="veiculo" value="moto" id="moto"><img src="./images/icons/agendamento/moto.svg"></button>
                        <button type="button" class="veiculo" onmouseover="selectItens('veiculo')" name="veiculo" value="carro" id="carro"><img src="./images/icons/agendamento/carro.svg"></button>
                        <button type="button" class="veiculo" onmouseover="selectItens('veiculo')" name="veiculo" value="caminhonete" id="caminhonete"><img src="./images/icons/agendamento/caminhonete.svg"></button>
                    </div>
                    <button id="agendar_horario" type="submit">AGENDAR</button>
                </div>
            </div>
            <div class="navbar2">
                <ul>
                    <a href="./agendamento.html"><li><div class="page_atual"><img src="./images/icons/agendamento/navbar-mobile/agendamento.svg" alt=""></div>Agendamento</li></a>
                    <a href="./informacoes.html"><li><div><img src="./images/icons/agendamento/navbar-mobile/informacoes.svg" alt=""></div>Info</li></a>
                    <a href="./galeria.html"><li><div><img src="./images/icons/agendamento/navbar-mobile/galeria.svg" alt=""></div>Galeria</li></a>           
                    <a href="./perfil.html"><li><div><img src="./images/icons/agendamento/navbar-mobile/perfil.svg" alt=""></div>Perfil</li></a>
                </ul>
            </div>
        </form>
    </div>
    
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="./JS/agendamento.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let link = document.querySelector("#link");
        
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true){ ?>
            link.innerHTML = "<a href='./admin/dashboard.php'>Dashboard</a>";
        <?php } else{ ?>
            link.innerHTML = "<a href='./perfil.php'>Perfil</a>";
        <?php } ?>
    });
</script>
</body>
</html>