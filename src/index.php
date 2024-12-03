<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="stylesheet" href="./css/cadastro.css">
  <link rel="stylesheet" href="./css/output.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
</head>
<body>
  <div class="container w-full h-full">
    <span class="fundo"></span>

    <div class="logo"><img class="JR" src="./images/JR.png" alt=""><img class="car_wash" src="./images/carwash.svg" alt=""></div>
    
    <div class="cadastro_login"><a href="./login.php"><button class="log_button">Login</button></a><a href="./index.php"><button class="cad_button">Cadastro</button></a></div>

    <div class="conteudo">
      <form action="./func/func_cadastrar.php" method="POST">
        <div class="nome"><img  class="icon" src="./images/icons/cadastro_e_login/Icon_nome.svg"><input type="text" placeholder="Nome completo" name="nome" required></div>
        <div class="telefone"><img  class="icon" src="./images/icons/cadastro_e_login/Icon_telefone.svg"><input type="tel" id="telefone" placeholder="Telefone (com DDD)" pattern="\([0-9]){2}\)[9]{1}[0-9]{4}-[0-9]{4}" name="telefone" required minlength="15" maxlength="15"></div>
        <div class="senha"><img  class="icon" src="./images/icons/cadastro_e_login/Icon_senha.svg"><input id="senha" type="password" placeholder="Digite sua senha" name="senha" required><img class="icon" id="eye_open" onclick="olhar()" src="./images/icons/cadastro_e_login/Icon_olho.png"><img class="icon d-none"  id="eye_closed" onclick="esconder()" src="./images/icons/cadastro_e_login/Icon_olho_fechado.png"></div>
      
        <div class="localizacao"><img  class="icon" src="./images/icons/cadastro_e_login/Icon_localizacao.svg"><input type="text" placeholder="Endereço Completo" name="endereco" required></div>
      
        <div class="botao">
          <button class="cadastrar" type="submit" style="color: white; font-family:'League Spartan', sans-serif; font-size: 1.2em;">Cadastrar</button>

        </div>
      </form>
    </div>
  </div>        

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="./JS/cad_login.js"></script>
</html>