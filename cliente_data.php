<?php 
session_start();
require_once("./acoes/conexao.php");

if ((!isset($_SESSION["email"])) && (!isset($_SESSION["senha"]))) {
    unset($_SESSION["email"]);
    unset($_SESSION["senha"]);
    header("Location: login.php");
}

require_once("./acoes/read.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/data.css">
    <title>SisCad | Dashboard</title>
</head>
<body>
    <header>
            <div class="logo">
                <span class="purple-letter">S</span>is<span class="purple-letter">C</span>ad
            </div>

            <a class="button" href="logout.php">Sair</a>
    </header>

    <main>
        <div class="main-box">
            <h1><span class="main-before-1">Bem</span> vindo, <span class="main-after-1"><?=$dados['nome']?></span></h1>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Email</th>
                        <th>Senha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach($dados as $dado) { ?>
                            <td><?= $dado; ?></td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
            <div class="main-links">
                <a class="button" href="./acoes/deletar.php/?id=<?= $dados['id']?>">Deletar</a>
                <a class="button" href="./acoes/editar.php/?id=<?= $dados['id']?>">Editar</a>
            </div>
        </div>    
    </main>

    <footer>SisCad - Todos os direitos reservados<div>Robert Moraes <span class="purple-letter">2023</span></div></footer>
</body>
</html>