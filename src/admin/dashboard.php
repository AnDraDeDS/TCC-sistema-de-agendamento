<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] == false || $_SESSION['admin'] != true) {
  header("Location: ../login.php");
  exit();
}
require_once '../lib/conn.php';
$sqlNomeServico = "SELECT * from servico ORDER BY preco";
$stmt = $conn->query($sqlNomeServico);
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- <script src="../../src/JS/bootstrap.js" ></script>
  <script src="../JS/bootstrap.js" ></script> -->
  <link rel="stylesheet" href="../../src/css/dashboard.css">
  <title>Painel de Controle</title>
</head>

<body>

  <!-- NAVBAR -->

  <div class="header">
    <div class="logo"><img id="jr" src="../images/jr_navbar.svg"><img id="carwash" src="../images/carwash.svg">
    <a href="../func/logout.php"><img id="logout"  src="../images/icons/dashboard/logout_icon.png"></a>
    </div>
    <div class="navbar">
      <ul>
        <li><a href="../agendamento.php">Agendamento</a></li>
        <li><a href="../informacoes.php">Informações</a></li>
        <li><a href="../galeria.php">Galeria</a></li>
        <li style="background-color: #63C3FF;" id="link"><a href="#">Dashboard</a></li>
      </ul>
    </div>
  </div>

  <!-- CONTEÚDO -->
  <div class="content">
    <!-- inserir servico -->
    <div id="cms1" class="cms d-none">
      <div class="header-cms">Adicionar Serviço</div>
      <div class="content-cms">
        <form action="./funcCMS/func_servico.php" method="post" enctype="multipart/form-data">

          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;" name="nome">
            <label for="floatingInput">Nome</label>
          </div>

          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;" name="preco" required>
            <label for="floatingInput">Preço</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;" name="descricao" required>
            <label for="floatingInput">Descrição</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;" name="duracao" required>
            <label for="floatingInput">Duração</label>
          </div>

          <div class="files" style="display: flex; flex-direction: row; justify-content: space-between;">
            <!-- <input class="input_file" type="file" style="border: 0;">
                  <input class="input_file" type="file" style="border: 0;"> -->
            <label class="btn input_file" for="my-file-selector">
              <span style="color: #63C3FF;">Imagem 1</span>
              <input id="my-file-selector" type="file" placeholder="Arquivo" id="imagem1" name="imagem1" accept="image/*" required>
            </label>

            <label class="btn input_file" for="my-file-selector">
              <span style="color: #63C3FF;">Imagem 2</span>
              <input id="my-file-selector" type="file" placeholder="Arquivo" id="imagem2"name="imagem2" accept="image/*" required>
            </label>

          </div>

          <button type="submit" class="submit_form" name="enviar" value="inserir_servico">CONFIRMAR</button>
        </form>
      </div>
    </div>
    <!-- Atualizar Serviço -->
    <div id="cms2" class="cms d-none">
    <form action="./funcCMS/func_servico.php" method="post" enctype="multipart/form-data">
    <div class="header-cms">
        <div class="dropdown-center">
            <button id="select_servico" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <p>Atualizar Serviços</p> <img class="px-5" src="../images/icons/dashboard/lupa.svg" alt="">
            </button>
            <ul id="menu_pesquisa" class="dropdown-menu" style="height: 30vh; overflow-y: auto">
                <?php foreach($servicos as $servico){ ?>
                    <li>
                        <button  onclick="update(<?=$servico->id_servico?>)" type="button" class="servico-button" data-nome="<?= $servico->nome ?>" data-preco="<?= $servico->preco ?>" data-descricao="<?= $servico->descricao ?>" data-duracao="<?= $servico->duracao ?>">
                            <?= $servico->nome ?>
                        </button>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="content-cms">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" style="border: 0.5px solid black;" required>
                <label for="nome">Nome</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="preco" placeholder="Preço" name="preco" style="border: 0.5px solid black;" required>
                <label for="preco">Preço</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao" style="border: 0.5px solid black;" required>
                <label for="descricao">Descrição</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="duracao" placeholder="Duração" name="duracao" style="border: 0.5px solid black;" required>
                <label for="duracao">Duração</label>
            </div>

            <div class="files" style="display: flex; flex-direction: row; justify-content: space-between;">
            <label class="btn input_file" for="my-file-selector">
              <span style="color: #63C3FF;">Imagem 1</span>
              <input id="my-file-selector" type="file" placeholder="Arquivo" id="imagem1" name="imagem1" accept="image/*">
            </label>

            <label class="btn input_file" for="my-file-selector">
              <span style="color: #63C3FF;">Imagem 2</span>
              <input id="my-file-selector" type="file" placeholder="Arquivo" id="imagem2"name="imagem2" accept="image/*">
            </label>
            </div>
            
            <input type="hidden" id="update_id" name="id_servico_update">
            <button type="submit" class="submit_form" name="enviar" value="atualizar_servico">CONFIRMAR</button>
       
    </div>
    </form>
    </div>

    <!-- Excluir Serviço -->
    <div id="cms3" class="cms cms-excluir d-none">
    <form action="./funcCMS/func_servico.php" method="post" enctype="multipart/form-data">

      <div class="header-cms">
        <div class="dropdown-center">
          <button id="select_servico" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <p>Excluir Serviço</p> <img src="../images/icons/dashboard/lupa.svg" alt="">
          </button>
          <ul id="menu_pesquisa" class="dropdown-menu" style="height: 30vh; overflow-y: auto">
          <?php foreach($servicos as $servico): ?>
                    <li>
                        <button type="button" onclick="excluir('servico', <?= $servico->id_servico?>)" name="id_cliente" class="servico-button">
                            <?= $servico->nome ?>
                        </button>
                    </li>
          <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="content-cms">
      <input type="hidden" name="id_servico_delete" id="delete_id">
        <button type="submit" class="submit_form" name="enviar" value="excluir_servico">CONFIRMAR</button>
      </div>
    </form>
    </div>
    
    <!-- Atualizar Informações -->
    <div id="cms7" class="cms d-none">
      <div class="header-cms">Atualizar Informações</div>
      <div class="content-cms">
      <form action="./funcCMS/func_informacoes.php" method="post" enctype="multipart/form-data">

          <div class="form-floating mb-3">
            <input name="texto" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
            <label for="floatingInput">Sobre Nós</label>
          </div>

          <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="telefoneInput" placeholder="name@example.com" style="border: 0.5px solid black;" id="telefone" placeholder="Telefone (com DDD)" pattern="\([0-9]){2}\)[9]{1}[0-9]{4}-[0-9]{4}" name="telefone" required>
            <label for="floatingInput">Whatsapp</label>
          </div>

          <div class="form-floating mb-3">
            <input name="instagram" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
            <label for="floatingInput">Instagram</label>
          </div>

          <div class="form-floating mb-3">
            <input name="endereco" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid black;">
            <label for="floatingInput">Localização</label>
          </div>


          <button type="submit" class="submit_form" name="enviar" value="atualizar_informacoes">CONFIRMAR</button>
        </form>
      </div>
    </div>

    <div id="cms8" class="cms d-none">
      <div style="font-size: 1.5em; height: 40px;" class="header-cms">Clientes Cadastrados</div>
      <div class="content-cms">
       <ul>
        <?php 
        
        $sqlCliente = "SELECT * FROM cliente ORDER BY nome ASC";

        $stmt = $conn->query($sqlCliente);


        if($stmt->rowCount() > 0){

          $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
          $pastaImagensCliente = "../images/upload_clientes/";
          forEach($clientes as $cliente){

            $telefoneCliente = preg_replace("/[^0-9]/", "", $cliente->telefone);

        ?>
        <li>
          <div class="cliente">
            <div class="foto-cli">
              <div class="image"><img src="<?= $pastaImagensCliente . basename($cliente->foto) ?>" alt="" height="100" width = "100" style="border-radius:50%;"></div>
            </div>
            <div class="dados-cli">
              <h3><?= $cliente->nome?></h3>
              <hr>
              <p id="telefoneFormatado">Contato: <a href="https://wa.me/+55<?= $telefoneCliente ?>?text=Ol%C3%A1%20Fl%C3%A1vio%2C%20cheguei%20ao%20seu%20contato%20via%20site%20da%20JR%20Car%20Wash`` target=" _blank>
              <?php 

                      $telefoneComMascara = '(' . substr($cliente->telefone, 0, 2) . ') ' .
                      substr($cliente->telefone, 2, 5) . '-' .
                      substr($cliente->telefone, 7, 4);


              
              ?>
                            <?= $telefoneComMascara ?>
                        </a></p>
              <hr>
              <p>Endereço: <?= $cliente->endereco?></p>
            </div>
          <input type="hidden" value="">
        </li>
        <?php }}?>
       </ul>
      </div>
    </div>
    
    
    <!-- Excluir Cliente -->
    <div id="cms9" class="cms cms-excluir d-none">
  <form action="./funcCMS/func_servico.php" method="post" enctype="multipart/form-data">
    <div class="header-cms">
      <div class="dropdown-center">
        <button id="select_servico" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php
            // Verifica se um cliente foi selecionado
            if (isset($_POST['id_cliente'])) {
              // Mostra o nome do cliente selecionado
              echo "<p>Excluir " . htmlspecialchars($_POST['nome_cliente']) . "</p>";
            } else {
              // Caso não tenha nenhum cliente selecionado, exibe o texto padrão
              echo "<p>Excluir Cliente</p>";
            }
          ?>
          <img src="../images/icons/dashboard/lupa.svg" alt="">
        </button>
        <ul id="menu_pesquisa" class="dropdown-menu" style="height: 30vh; overflow-y: auto">
          <?php
            $sqlCliente = "SELECT * FROM cliente ORDER BY nome ASC";
            $stmt = $conn->query($sqlCliente);
            $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);

            // Exibe a lista de clientes
            foreach ($clientes as $cliente): ?>
              <li>
                <button type="button" onclick="excluir('cliente', <?= $cliente->id_cliente ?>)" name="id_cliente" class="servico-button">
                    <?= $cliente->nome ?>
                </button>

              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="content-cms">
          <input type="hidden" name="delete_id_cli" id="delete_id_cli">
          <button type="submit" class="submit_form" name="enviar" value="excluir_cliente">CONFIRMAR</button>
        </div>
  </form>
</div>

    
    <aside>
      <div id="sidebar" class="sidebar expandir">
        <div class="header_sidebar">
          <h4>Gerenciar</h4>
          <button id="btn_openside" style="background: transparent; border: 0px;" onclick="toggleSide()"><img src="../images/icons/dashboard/menu.svg" alt="" height="25px" width="40px" class="imgMenu"></button>
        </div>
        <div class="background-sidebar">
          <div class="container-cms">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span>Serviços</span><img src="../images/icons/dashboard/icon_seta.svg" alt="" class="arrow">
            </button>
            <ul class="dropdown-menu drop">
              <li><a class="dropdown-item" href="#" onclick="openCMS('inserir_servico')">Inserir</a></li>
              <span class="linhaCMS"></span>
              <li><a class="dropdown-item" href="#" onclick="openCMS('atualizar_servico')">Atualizar</a></li>
              <span class="linhaCMS"></span>
              <li><a class="dropdown-item" href="#" onclick="openCMS('excluir_servico')">Excluir</a></li>
            </ul>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span>Clientes</span><img src="../images/icons/dashboard/icon_seta.svg" alt="" class="arrow">
            </button>
            <ul class="dropdown-menu drop">
              <li><a class="dropdown-item" href="#" onclick="openCMS('visualizar_cliente')">Visualizar</a></li>
              <span class="linhaCMS"></span>
              <li><a class="dropdown-item" href="#" onclick="openCMS('excluir_cliente')">Excluir</a></li>
            </ul>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span>Informações</span><img src="../images/icons/dashboard/icon_seta.svg" alt="" class="arrow">
            </button>
            <ul class="dropdown-menu drop">
              <li><a class="dropdown-item" href="#" onclick="openCMS('atualizar_informacoes')">Atualizar</a></li>
            </ul>

           
          </div>
        </div>
      </div>
      <div class="container-servicos">
        <div class="cabecalho">
            
          <h1>SERVIÇOS AGENDADOS</h1>
          <button id="btn-search" onclick="search()" style="border: 0; outline: 0; background-color: transparent;">
            <img id="filter" src="../images/icons/dashboard/filtro.png" alt="">
          </button>
          
          <div id="dropdown-consulta" class="d-none">
            <form method="GET" class="height: 100%; width: 100%;">
            <ul>
              <li><button type="submit" class="btn-agendamentos" name="consulta" value="andamento">Em Andamento</button></li>
              <li><button type="submit" class="btn-agendamentos" name="consulta" value="concluido">Concluídos</button></li>
            </ul>
          </form>
          </div>

        </div>
        <div class="background-servicos">
          <ul>
          <?php

            extract($_GET);


          if(isset($consulta)){

            if ($consulta == 'andamento'){
              $sqlReq = "SELECT a.id_agendamento, s.nome as nome_servico,  c.nome as nome_cliente, a.veiculo, a.data, a.horario, c.foto, a.status as statos  FROM agendamento as a 
              INNER JOIN cliente as c ON a.fk_id_cliente = c.id_cliente
              INNER JOIN servico as s ON a.fk_id_servico = s.id_servico 
              WHERE a.status = 1
              ORDER BY a.data ASC";
            }

            if ($consulta == 'concluido'){
              $sqlReq = "SELECT a.id_agendamento, s.nome as nome_servico,  c.nome as nome_cliente, a.veiculo, a.data, a.horario, c.foto, a.status as statos  FROM agendamento as a 
              INNER JOIN cliente as c ON a.fk_id_cliente = c.id_cliente
              INNER JOIN servico as s ON a.fk_id_servico = s.id_servico 
              WHERE a.status = 2
              ORDER BY a.data ASC";
            }

          }else{

            $sqlReq = "SELECT a.id_agendamento, s.nome as nome_servico,  c.nome as nome_cliente, a.veiculo, a.data, a.horario, c.foto, a.status as statos  FROM agendamento as a 
            INNER JOIN cliente as c ON a.fk_id_cliente = c.id_cliente
            INNER JOIN servico as s ON a.fk_id_servico = s.id_servico 
            WHERE a.status = 1
            ORDER BY a.data ASC";

          }


        $stmt = $conn->query($sqlReq);

        if($stmt->rowCount() > 0){

          $solicitacoes = $stmt->fetchAll(PDO::FETCH_OBJ);
          $pastaImagensCliente = "../images/upload_clientes/";
          
          forEach($solicitacoes as $solicitacao){
        ?>
            <li class="container-item">
              <img src="<?= $pastaImagensCliente . basename($solicitacao->foto) ?>" alt="" class="foto-de-perfil" height="70" width="70">
              <div class="container-nome-veiculo">
                <p class="nome"><?= $solicitacao->nome_cliente?></p>
                <span class="azul">Veículo: <span class="tipo"> <?= $solicitacao->veiculo ?></span></span>
              </div>
              <div class="info-agendamento">
                <span class="azul">Serviço: <span class="tipo"><?= $solicitacao->nome_servico?></span></span>
                <span class="azul">Horário: <span class="tipo"><?= $solicitacao->horario?></span></span>
                <span class="azul">Data: <span class="tipo"><?= date('d/m/Y', strtotime($solicitacao->data)) ?></span></span>
                <input type="hidden" value="<?= $solicitacao->id_agendamento?>">
              </div>
              <div class="concluir">
                
                <form action="./funcCMS/func_agendamento.php" method="post">
                  <input type="hidden" name="id_concluir" value="<?= $solicitacao->id_agendamento?>">
                <?php
                    if($solicitacao->statos == 1){
                      echo'
                    <button type="submit" name="acao_req" value="concluir" class="btn-finish"><img src="../images/icons/dashboard/button-confirmar.svg" style="width: 50px; height: 50px; border: 0; border-radius: 50%;" alt="">
                    <p>Concluir</p>
                    </button>
                  <?php ';
                    
                    }?>
                  </form>
                  
              </div>
            </li>

            <?php } } ?>
          </ul>
        </div>
      </div>
    </aside>
    <main>
      <div class="grafico">
        <div class="cabecalho">Média de Rendimentos
          <select onchange="graficToggle()" id="select">
            <option value="anual">Anual</option>
            <option value="mensal">Mensal</option>
          </select>
          <h4 id="ano_atual"></h4>
        </div>
        <div class="container-grafico">
          <canvas id="grafico1" class=""></canvas>
          <canvas id="grafico2" class="d-none"></canvas>
        </div>
        <script>
          const ctx = document.getElementById('grafico1');
          let valoresX = [ <?php require_once '../func/func_lucros.php';?> ];
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
                color: '#fff',
                barThickness: 40

              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                legend: {
                  display: false,
                },
              },
              scales: {
                x: {
                  ticks: {
                    font: {
                      size: 10
                    },
                    color: 'white'
                  },
                },
                y: {
                  grid: {
                    color: '#777'
                  },
                  ticks: {
                    font: {
                      size: 15
                    },
                    color: 'white'
                  },
                  beginAtZero: true,
                },
              }
            }
          });
          </script>
          <script>
            const ctx2 = document.getElementById('grafico2');
            
          let valoresX_2 = [ <?php require '../func/func_lucroMensal.php';?> ];
          let meses_2 = ["Semana 1", "Semana 2", "Semana 3", "Semana 4"];
          
          new Chart(ctx2, {
            type: 'bar',
            data: {
              labels: meses_2,
              datasets: [{
                label: '',
                data: valoresX_2,
                borderWidth: 1,
                borderColor: '#63C3FF',
                backgroundColor: '#63C3FF',
                color: '#fff',
                barThickness: 40

              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                legend: {
                  display: false,
                },
              },
              scales: {
                x: {
                  ticks: {
                    font: {
                      size: 10
                    },
                    color: 'white'
                  },
                },
                y: {
                  grid: {
                    color: '#777'
                  },
                  ticks: {
                    font: {
                      size: 15,
                    },
                    color: 'white',
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

        <?php
        // if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { 

        // $sqlReq = "SELECT a.id_agendamento, s.nome as nome_servico,  c.nome as nome_cliente, a.veiculo, a.data, a.horario FROM agendamento as a 
        // INNER JOIN admin as c ON a.fk_id_cliente = c.id_admin
        // INNER JOIN servico as s ON a.fk_id_servico = s.id_servico 
        // WHERE a.  status = 0";

        // } else { 

        $sqlReq = "SELECT a.id_agendamento, s.nome as nome_servico,  c.nome as nome_cliente, a.veiculo, a.data, a.horario, c.foto  FROM agendamento as a 
        INNER JOIN cliente as c ON a.fk_id_cliente = c.id_cliente
        INNER JOIN servico as s ON a.fk_id_servico = s.id_servico 
        WHERE status = 0";

        // }


        $stmt = $conn->query($sqlReq);

        if($stmt->rowCount() > 0){

          $solicitacoes = $stmt->fetchAll(PDO::FETCH_OBJ);
          $pastaImagensCliente = "../images/upload_clientes/";
          
          forEach($solicitacoes as $solicitacao){
        ?>
            <form action="./funcCMS/func_agendamento.php" method="post">
          <div class="item-solicitacao">
            <div class="perfil-solicitacao">
              <img id="cliente" src="<?= $pastaImagensCliente . basename($solicitacao->foto) ?>" alt="" height="50px" width="50">
              <p class="solicitacao">Solicitação de <br><?= $solicitacao->nome_cliente?></p>
            </div>
            <div class="linha"></div>
            <div class="tipo-solicitacao">
              <p class="tipo">Servico: <?= $solicitacao->nome_servico?></p>
              <p class="tipo">Veículo: <?= $solicitacao->veiculo?></p>
            </div>
            <div class="linha"></div>
            <div class="agendamento-solicitacao">
              <p class="tipo">Data: <?= date('d/m/Y', strtotime($solicitacao->data)) ?></p>
              <p class="tipo">Horário: <?= $solicitacao->horario?></p>
            </div>
            <div class="container-buttons">
              <input type="hidden" name="id_agendamento" value="<?= $solicitacao->id_agendamento?>">
              <button type="submit" name="acao_req" value="negar"><img src="../images/icons/dashboard/button-recusar.svg" alt=""></button>
              <button type="submit" name="acao_req" value="confirmar"><img src="../images/icons/dashboard/button-confirmar.svg" alt=""></button>
            </div>
          </div>
          </form>
          <?php } } ?>


        </div>


      </div>
    </main>
  </div>





</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="../JS/dashboard.js" defer></script>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    let link = document.querySelector("#link");

    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { ?>
      link.innerHTML = "<a href='#'>Dashboard</a>";
    <?php } else { ?>
      link.innerHTML = "<a href='./perfil.php'>Perfil</a>";
    <?php } ?>
  });
</script>
</body>
</html>