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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/perfil.css">
    <title>Perfil de Usuários</title>
</head>

<body>

    <!-- NAVBAR -->

    <div class="header">
        <div class="logo"><img id="jr" src="./images/jr_navbar.svg"><img id="carwash" src="./images/carwash.svg">
            <a href="./func/logout.php"><img id="logout" src="./images/icons/dashboard/logout_icon.png"></a>
        </div>
        <div class="navbar">
            <ul>
                <li><a href="./agendamento.php">Agendamento</a></li>
                <li><a href="./informacoes.php">Informações</a></li>
                <li><a href="./galeria.php">Galeria</a></li>
                <li style="background-color: #63C3FF;"><a href="./perfil.php">Perfil</a></li>
            </ul>
        </div>
    </div>

    <?php 

$pastaImagensCliente = "./images/upload_clientes/";

$fotoCaminho = (strpos($cliente->foto, '../images/upload_clientes/') === 0)
    ? substr($cliente->foto, strlen('../images/upload_clientes/'))
    : $cliente->foto;

$caminhoImagem = (file_exists($pastaImagensCliente . $fotoCaminho))
    ? htmlspecialchars($pastaImagensCliente . $fotoCaminho)
    : './images/upload_clientes/perfil_default.png';

?>

    <!-- CONTEÚDO -->
    <div class="content">
        <div class="side">
        <div class="perfil" style="background-image: url('<?= $caminhoImagem; ?>');">  
                <button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="./images/icons/perfil/Icon_bell.svg"></button>
                <button class="edit" id="lapinho">
                    <img src="./images/icons/perfil/edit_icon.svg">
                </button>
            </div>
        </div>

        <!-- infos -->
         <?php 
        $telefoneComMascara = '(' . substr($cliente->telefone, 0, 2) . ') ' .
        substr($cliente->telefone, 2, 5) . '-' .
        substr($cliente->telefone, 7, 4);
        ?>
        <div class="aside">
            <div class="infos">
                <div class="dado" id="item1">
                    <div class="text">
                        <p class="titulo">Nome</p>
                        <p><?php echo htmlspecialchars($cliente->nome); ?></p>
                    </div>
                </div>
                <div class="dado" id="item2">
                    <div class="text">
                        <p class="titulo">Senha</p>
                        <p>***********</p>
                    </div>
                </div>
                <div class="dado" id="item3">
                    <div class="text">
                        <p class="titulo">Telefone</p>
                        <p><?php echo htmlspecialchars($telefoneComMascara); ?></p>
                    </div>
                </div>
                <div class="dado" id="item4">
                    <div class="text">
                        <p class="titulo">Endereço</p>
                        <p><?php echo htmlspecialchars($cliente->endereco); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="cabecalho">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agendamentos</h1>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody class="table-body">

                            <tr class="table-header">
                                <th scope="col">Serviço</th>
                                <th scope="col">Horário</th>
                                <th scope="col">Data</th>
                                <th scope="col">Status</th>
                            </tr>

                            <?php
                            $sqlReq = "SELECT a.id_agendamento, a.status, s.nome as nome_servico,  c.nome as nome_cliente, a.data, a.horario FROM agendamento as a 
                    INNER JOIN cliente as c ON a.fk_id_cliente = c.id_cliente
                    INNER JOIN servico as s ON a.fk_id_servico = s.id_servico 
                    WHERE a.status = 1 or a.status = 0
                    ORDER BY a.data ASC";

                            $stmt = $conn->query($sqlReq);

                            if ($stmt->rowCount() > 0) {

                                $solicitacoes = $stmt->fetchAll(PDO::FETCH_OBJ);

                                foreach ($solicitacoes as $solicitacao) { ?>
                                    <tr>
                                        <td><?= $solicitacao->nome_servico ?></td>
                                        <td><?= $solicitacao->horario ?></td>
                                        <td><?= $solicitacao->data ?></td>
                                        <td><?php
                                            if ($solicitacao->status == 1) {
                                                echo "Aceito";
                                            }
                                            if ($solicitacao->status == 0) {
                                                echo "Pendente";
                                            }

                                            ?></td>
                                    
                                            <!-- Botões de Ação -->
                                           <td> <button class="btn btn-primary btn-sm" onclick="reagendar(<?= $solicitacao->id_agendamento ?>)">Reagendar</button> </td>
                                            <td> <button class="btn btn-danger btn-sm" onclick="excluir(<?= $solicitacao->id_agendamento ?>)">Excluir</button> </td>
                                        
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Editar Nome-->
    <div class="modal fade" id="modalnome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="cabecalho">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Nome</h1>
                </div>
                <div class="corpinho">
                    <form action="./func/func_updatePerfil.php" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nome</label>
                            <input name="nome" type="text" class="form-control" id="recipient-name">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="acao" value="atualizar_nome" class="btn btn-primary btn-sm confirm-btn">CONFIRMAR</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar Senha -->
    <div class="modal fade" id="senha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="cabecalho">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Senha</h1>
                </div>
                <div class="corpinho">
                    <form action="./func/func_updatePerfil.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="current-password" class="col-form-label">Senha atual</label>
                            <input name="senha_atual" type="password" id="senha-atual" class="form-control" aria-describedby="passwordHelpBlock">

                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Nova Senha</label>
                            <input name="nova_senha" type="password" id="nova-senha" class="form-control" aria-describedby="passwordHelpBlock">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="acao" value="atualizar_senha" class="btn btn-primary btn-sm confirm-btn">CONFIRMAR</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar Telefone -->
    <div class="modal fade" id="telefone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="cabecalho">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Telefone</h1>
                </div>
                <div class="corpinho">
                    <form action="./func/func_updatePerfil.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="call" class="col-form-label">Telefone</label>
                            <input type="tel" id="call" placeholder="Telefone (com DDD)" pattern="\([0-9]){2}\)[9]{1}[0-9]{4}-[0-9]{4}" name="telefone" required class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="acao" value="atualizar_telefone" class="btn btn-primary btn-sm confirm-btn">CONFIRMAR</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar Endereço -->
    <div class="modal fade" id="endereco" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="cabecalho">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Endereço</h1>
                </div>
                <div class="corpinho">
                    <form action="./func/func_updatePerfil.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="address" class="col-form-label">Endereço</label>
                            <input name="endereco" type="text" class="form-control" id="address">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="acao" value="atualizar_endereco" class="btn btn-primary btn-sm confirm-btn">CONFIRMAR</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="cabecalho">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Imagem de perfil</h1>
                </div>

                <div class="corpinho">
                    <form action="./func/func_updatePerfil.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="file-upload" class="custom-file-upload">
                                <div class="upload-box">
                                    <span>Escolher Imagem</span>
                                </div>
                            </label>
                            <input id="file-upload" type="file" placeholder="Arquivo" id="imagem1" name="foto" accept="image/*">
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="acao" value="atualizar_foto" class="btn btn-primary btn-sm">CONFIRMAR</button>
                </div>
                </form>
            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="./JS/perfil.js"></script>
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