<?php 
session_start();
if(!isset($_SESSION['logado']) || $_SESSION['logado'] == false){
  header("Location: ../cadastro.php");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../../src/css/dashboard.css">
  <script src="./js/navbar.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  <title>Painel de Controle</title>
</head>

<body>

  <!-- NAVBAR -->

  <div class="header">
    <div class="logo"><img id="jr" src="../images/jr_navbar.svg"><img id="carwash" src="../images/carwash.svg">
      <div class="space"></div>
    </div>
    <div class="navbar">
      <ul>
        <li><a href="../agendamento.php">Agendamento</a></li>
        <li><a href="../informacoes.php">Informações</a></li>
        <li><a href="../galeria.php">Galeria</a></li>
        <li style="background-color: #63C3FF;" id="link"><a href="./dashboard.php">Dashboard</a></li>
      </ul>
    </div>
  </div>

  <!-- CONTEÚDO -->
      <div class="content">
        <!-- inserir servico -->
        <div id="cms1" class="cms d-none">
          <div class="header-cms">Adicionar Serviço</div>
          <div class="content-cms">
            <form action="" method="post">

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Nome</label>
              </div>
              
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Preço</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Descrição</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Duração</label>
              </div>

              <div class="files" style="display: flex; flex-direction: row; justify-content: space-between;">
                  <!-- <input class="input_file" type="file" style="border: 0;">
                  <input class="input_file" type="file" style="border: 0;"> -->
                  <label class="btn input_file" for="my-file-selector">
                    <span style="color: #63C3FF;">Imagem 1</span>
                    <input id="my-file-selector" type="file" placeholder="Arquivo">
                  </label>

                  <label class="btn input_file" for="my-file-selector">
                    <span style="color: #63C3FF;">Imagem 2</span>
                    <input id="my-file-selector" type="file" placeholder="Arquivo">
                  </label>
                
              </div>

              <button type="submit" class="submit_form">CONFIRMAR</button>
            </form>
          </div>
        </div>
        <!-- Atualizar Serviço -->
        <div id="cms2" class="cms d-none">
          <div class="header-cms">
            <div class="dropdown-center">
              <button id="select_servico" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <p>Atualizar Serviços</p> <img src="../images/icons/dashboard/lupa.svg" alt="">
              </button>
              <ul id="menu_pesquisa" class="dropdown-menu">
                <li><button>Lavagem Simples</button></li>
                <li><button>Lavagem Completa</button></li>
                <li><button>Polimento</button></li>
              </ul>
            </div>
          </div>
          <div class="content-cms">
            <form action="" method="post">

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Nome</label>
              </div>
              
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Preço</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Descrição</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Duração</label>
              </div>

              <div class="files" style="display: flex; flex-direction: row; justify-content: space-between;">
                  <!-- <input class="input_file" type="file" style="border: 0;">
                  <input class="input_file" type="file" style="border: 0;"> -->
                  <label class="btn input_file" for="my-file-selector">
                    <span style="color: #63C3FF;">Imagem 1</span>
                    <input id="my-file-selector" type="file" placeholder="Arquivo">
                  </label>

                  <label class="btn input_file" for="my-file-selector">
                    <span style="color: #63C3FF;">Imagem 2</span>
                    <input id="my-file-selector" type="file" placeholder="Arquivo">
                  </label>
                
              </div>

              <button type="submit" class="submit_form">CONFIRMAR</button>
            </form>
          </div>
        </div>
        <!-- Excluir Serviço -->
        <div id="cms3" class="cms cms-excluir d-none">
          <div class="header-cms">
            <div class="dropdown-center">
              <button id="select_servico" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <p>Excluir Serviço</p> <img src="../images/icons/dashboard/lupa.svg" alt="">
              </button>
              <ul id="menu_pesquisa" class="dropdown-menu">
                <li><button>Lavagem Simples</button></li>
                <li><button>Lavagem Completa</button></li>
                <li><button>Polimento</button></li>
              </ul>
            </div>
          </div>
          <div class="content-cms">
            <input type="hidden" value=`${wd}`>
              <button type="submit" class="submit_form">CONFIRMAR</button>
          </div>
        </div>
        <!-- Inserir Galeria -->
        <div id="cms4" class="cms cms-inserir-galeria d-none">
          <div class="header-cms">Inserir na Galeria</div>
          <div class="content-cms">
            <form action="" method="post">

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Nome do Serviço</label>
              </div>

              <div class="files" style="display: flex; flex-direction: row; justify-content: space-between;">
                  <!-- <input class="input_file" type="file" style="border: 0;">
                  <input class="input_file" type="file" style="border: 0;"> -->
                  <label class="btn input_file" for="my-file-selector">
                    <span style="color: #63C3FF;">Imagem 1</span>
                    <input id="my-file-selector" type="file" placeholder="Arquivo">
                  </label>

                  <label class="btn input_file" for="my-file-selector">
                    <span style="color: #63C3FF;">Imagem 2</span>
                    <input id="my-file-selector" type="file" placeholder="Arquivo">
                  </label>
                
              </div>

              <button type="submit" class="submit_form">CONFIRMAR</button>
            </form>
          </div>
        </div>
        <!-- Atualizar Galeria -->
        <div id="cms5" class="cms cms-atualizar-galeria d-none">
          <div class="header-cms">
            <div class="dropdown-center">
              <button id="select_servico" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <p>Atualizar Galeria</p> <img src="../images/icons/dashboard/lupa.svg" alt="">
              </button>
              <ul id="menu_pesquisa" class="dropdown-menu">
                <li><button>Lavagem Simples</button></li>
                <li><button>Lavagem Completa</button></li>
                <li><button>Polimento</button></li>
              </ul>
            </div>
          </div>
          <div class="content-cms">
            <form action="" method="post">
              <div class="files" style="display: flex; flex-direction: row; justify-content: space-between;">
                  <!-- <input class="input_file" type="file" style="border: 0;">
                  <input class="input_file" type="file" style="border: 0;"> -->
                  <label class="btn input_file" for="my-file-selector">
                    <span style="color: #63C3FF;">Imagem 1</span>
                    <input id="my-file-selector" type="file" placeholder="Arquivo">
                  </label>

                  <label class="btn input_file" for="my-file-selector">
                    <span style="color: #63C3FF;">Imagem 2</span>
                    <input id="my-file-selector" type="file" placeholder="Arquivo">
                  </label>
                </div>

              <button type="submit" class="submit_form">CONFIRMAR</button>
            </form>
          </div>
        </div>
        <!-- Excluir Galeria -->
        <div id="cms6" class="cms cms-excluir d-none">
          <div class="header-cms">
            <div class="dropdown-center">
              <button id="select_servico" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <p>Excluir item Galeria</p> <img src="../images/icons/dashboard/lupa.svg" alt="">
              </button>
              <ul id="menu_pesquisa" class="dropdown-menu">
                <li><button>Lavagem Simples</button></li>
                <li><button>Lavagem Completa</button></li>
                <li><button>Polimento</button></li>
              </ul>
            </div>
          </div>
          <div class="content-cms">
            <input type="hidden" value=`${wd}`>
              <button type="submit" class="submit_form">CONFIRMAR</button>
          </div>
        </div>
        <!-- Atualizar Informações -->
        <div id="cms7" class="cms d-none">
          <div class="header-cms">Atualizar Informações</div>
          <div class="content-cms">
            <form action="" method="post">

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Sobre Nós</label>
              </div>
              
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Whatsapp</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Instagram</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
                <label for="floatingInput">Localização</label>
              </div>

              <div class="files" style="display: flex; flex-direction: row; justify-content: space-between;">
                  <!-- <input class="input_file" type="file" style="border: 0;">
                  <input class="input_file" type="file" style="border: 0;"> -->
                  <label class="btn input_file" for="my-file-selector">
                    <span style="color: #63C3FF;">Imagem 1</span>
                    <input id="my-file-selector" type="file" placeholder="Arquivo">
                  </label>

                  <label class="btn input_file" for="my-file-selector">
                    <span style="color: #63C3FF;">Imagem 2</span>
                    <input id="my-file-selector" type="file" placeholder="Arquivo">
                  </label>
                
              </div>

              <button type="submit" class="submit_form">CONFIRMAR</button>
            </form>
          </div>
        </div>
        <aside>
            <div id="sidebar" class="sidebar expandir">
                <div class="header_sidebar">
                   <h4>Gerenciar</h4>
                    <button style="background: transparent; border: 0px;" onclick="toggleSide()"><img src="../images/icons/dashboard/menu.svg" alt="" height="25px" width="40px" class="imgMenu"></button>
                </div>
                <div class="background-sidebar">
                    <div class="container-cms">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <span>Serviços</span><img src="../images/icons/dashboard/icon_seta.svg" alt="" class="arrow">
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#" onclick="openCMS('inserir_servico')">Inserir</a></li>
                              <span class="linhaCMS"></span>
                              <li><a class="dropdown-item" href="#" onclick="openCMS('atualizar_servico')">Atualizar</a></li>
                              <span class="linhaCMS"></span>
                              <li><a class="dropdown-item" href="#" onclick="openCMS('excluir_servico')">Excluir</a></li>
                            </ul>
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>Galeria</span><img src="../images/icons/dashboard/icon_seta.svg" alt="" class="arrow">
                              </button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="openCMS('inserir_galeria')">Inserir</a></li>
                                <span class="linhaCMS"></span>
                                <li><a class="dropdown-item" href="#" onclick="openCMS('atualizar_galeria')">Atualizar</a></li>
                                <span class="linhaCMS"></span>
                                <li><a class="dropdown-item" href="#" onclick="openCMS('excluir_galeria')">Excluir</a></li>
                              </ul>
                              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>Informações</span><img src="../images/icons/dashboard/icon_seta.svg" alt="" class="arrow">
                              </button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="openCMS('atualizar_informacoes')">Atualizar</a></li>
                              </ul>
                    </div>
                </div>
            </div> 
      <div class="container-servicos">
        <h1>SERVIÇOS AGENDADOS</h1>
        <div class="background-servicos">
          <ul>
            <li class="container-item">
                <img src="https://conteudo.imguol.com.br/c/entretenimento/19/2022/07/13/vikings-1657747090442_v2_1008x1389.jpg" alt="" class="foto-de-perfil" height="70" width="65">
                <div class="container-nome-veiculo">
                <p class="nome">João Bonicarlos</p>
                  <span class="azul">Veículo: <span class="tipo"> Carro</span></span>              
                </div>
                <div class="info-agendamento">
                 <span class="azul">Serviço: <span class="tipo">Higienização de Teto</span></span>
                 <span class="azul">Horário: <span class="tipo">13:00 - 14:30</span></span>
                 <span class="azul">Data: <span class="tipo">04/05</span></span>
                </div>
            </li>
            <li class="container-item">
              <img src="https://conteudo.imguol.com.br/c/entretenimento/19/2022/07/13/vikings-1657747090442_v2_1008x1389.jpg" alt="" class="foto-de-perfil" height="70" width="65">
              <div class="container-nome-veiculo">
              <p class="nome">João Bonicarlos</p>
                <span class="azul">Veículo: <span class="tipo"> Carro</span></span>              
              </div>
              <div class="info-agendamento">
               <span class="azul">Serviço: <span class="tipo">Higienização de Teto</span></span>
               <span class="azul">Horário: <span class="tipo">13:00 - 14:30</span></span>
               <span class="azul">Data: <span class="tipo">04/05</span></span>
              </div>
          </li>
          <li class="container-item">
            <img src="https://conteudo.imguol.com.br/c/entretenimento/19/2022/07/13/vikings-1657747090442_v2_1008x1389.jpg" alt="" class="foto-de-perfil" height="70" width="65">
            <div class="container-nome-veiculo">
            <p class="nome">João Bonicarlos</p>
              <span class="azul">Veículo: <span class="tipo"> Carro</span></span>              
            </div>
            <div class="info-agendamento">
             <span class="azul">Serviço: <span class="tipo">Higienização de Teto</span></span>
             <span class="azul">Horário: <span class="tipo">13:00 - 14:30</span></span>
             <span class="azul">Data: <span class="tipo">04/05</span></span>
            </div>
        </li>
          </ul>
        </div>
      </div>
    </aside>
    <main>
      <div class="grafico">
        <div class="cabecalho">Média de Rendimentos 
          <select id="select">
          <option value="anual">Anual</option>
          <option value="mensal">Mensal</option>
          <option value="dia">Dia</option>
          <img src="../images/icons/dashboard/arrow-mes.svg" alt="" class="arrow">
        </select> 
        <h4>2024</h4>
      </div>
      <div class="container-grafico">
        <canvas id="grafico1"></canvas>
      </div>
        <script>
          const ctx = document.getElementById('grafico1');
          let valoresX = [500,1000,2000,4000,6000,8000,10000,12000,14000, 10200, 13000, 4590];
          let meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
        
          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: meses,
              datasets: [{
                label: '',
                data: valoresX,
                borderWidth: 1,
                borderColor: '#63C3FF',
                backgroundColor: '#63C3FF',
                color:'#fff',
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins:{
              legend: {
                display: false,
              },
              },
              scales: {
                x:{
                  ticks:{
                    font:{
                      size:10
                    },
                    color: 'white'
                },
              },
                y: {
                  grid:{
                    color: '#777'
                  },
                  ticks:{
                    font:{
                      size:15
                    },
                    color: 'white'
                  },
                  beginAtZero: true,
                },
              }
            }
          });
      
        </script>

          <div class="cabecalho-solicitacoes">
            <h5>Solicitações de serviço</h5>
          </div>
            <div class="container-itens-solicitacoes">

              
              <div class="item-solicitacao">
                <div class="perfil-solicitacao">
                  <img src="../images/capa.png" alt="" height="50px" width="50">
                  <p class="solicitacao">Solicitação de <br>João Bonicarlos</p>
                </div>
                <div class="linha"></div>
                <div class="tipo-solicitacao">
                  <p class="tipo">Servico:Lavagem Completa</p>
                  <p class="tipo">Veículo</p>
                </div>
                <div class="linha"></div>
                <div class="agendamento-solicitacao">
                  <p class="tipo">Data: 02/05</p>
                  <p class="tipo">Horário: 13:00 - 14:30</p>
                </div>
                <div class="container-buttons">
                  <button><img src="../images/icons/dashboard/button-recusar.svg" alt=""></button>
                  <button><img src="../images/icons/dashboard/button-confirmar.svg" alt=""></button>
                </div>
            </div>

            
          </div>
        
      
      </div>
    </main>
  </div>



</body>
<script src="../JS/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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