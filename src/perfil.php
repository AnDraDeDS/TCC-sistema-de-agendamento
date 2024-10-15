<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] == false) {
    header("Location: ./cadastro.php");
    exit();
}

require_once "./lib/conn.php";
$id_cliente = $_SESSION['id_cliente'];

// Verificar se o ID está definido e válido
if (!$id_cliente) {
    echo "ID do cliente não encontrado na sessão.";
    exit();
}

// Selecionar o cliente pelo ID
$sqlListarCliente = "SELECT * FROM cliente WHERE id_cliente = :id_cliente";
$selectCliente = $conn->prepare($sqlListarCliente);
$selectCliente->bindValue(":id_cliente", $id_cliente);
$selectCliente->execute();

// Verificar se algum cliente foi encontrado
if ($selectCliente->rowCount() > 0) {
    $cliente = $selectCliente->fetch(PDO::FETCH_OBJ);
} else {
    // Se nenhum cliente foi encontrado, exibe uma mensagem de erro
    echo "Cliente não encontrado.";
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
    <link rel="stylesheet" href="./css/perfil.css">
    <script src="./js/navbar.js" defer></script>
    <title>Perfil de Usuário</title>
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
                <li><a href="./galeria.php">Galeria</a></li>
                <li style="background-color: #63C3FF;" id="link"><a href="./perfil.php">Perfil</a></li>
            </ul>
        </div>
    </div>

    <!-- CONTEÚDO -->
    <div class="content">
        <div class="side">
            <div class="perfil">
                <button class="edit"><img src="./images/icons/perfil/icon_bell.svg"></button>
                <button class="edit"><img src="./images/icons/perfil/edit_icon.svg"></button>
            </div>
        </div>
        <div class="aside">
            <div class="infos">
                <!-- Exibindo os dados do cliente -->
                <div class="dado" id="item1">
                    <div class="text">
                        <p class="titulo">Nome</p>
                        <p><?php echo htmlspecialchars($cliente->nome); ?></p> <!-- Exibe o nome do cliente -->
                    </div>
                    <div class="arrow"><img src="./images/perfil/arrow_icon.svg"></div>
                </div>
                <div class="dado" id="item2">
                    <div class="text">
                        <p class="titulo">Senha</p>
                        <p>********</p> <!-- Exibe um link para alterar a senha -->
                    </div>
                    <div class="arrow"><a href="./func/alterar_senha.php"><img src="./images/perfil/arrow_icon.svg"></a></div>
                </div>
                <div class="dado" id="item3">
                    <div class="text">
                        <p class="titulo">Telefone</p>
                        <p><?php echo htmlspecialchars($cliente->telefone); ?></p> <!-- Exibe o telefone do cliente -->
                    </div>
                    <div class="arrow"><img src="./images/perfil/arrow_icon.svg"></div>
                </div>
                <div class="dado" id="item4">
                    <div class="text">
                        <p class="titulo">Endereço</p>
                        <p><?php echo htmlspecialchars($cliente->endereco); ?></p> <!-- Exibe o endereço do cliente -->
                    </div>
                    <div class="arrow"><img src="./images/perfil/arrow_icon.svg"></div>
                </div>
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