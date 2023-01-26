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

<?php
include_once("partials/header.html.php");
include_once("helpers/urlBase.php");
?>
<main class="dados">
    <div class="dados-main-conteudo">
        <h1>Olá<span class="purple-letter">,</span> <?= $dados['nome'] ?></h1>

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
                    <?php foreach ($dados as $dado) { ?>
                        <td><?= $dado; ?></td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>

        <div class="button-group">
            <a class="button light" href="./acoes/deletar.php/?id=<?= $dados['id'] ?>">Deletar</a>
            <a class="button light" href="<?= $BASE_URL ?>acoes/editar.php/?id=<?= $dados['id'] ?>">Editar</a>
            <a class="button logout" href="<?= $BASE_URL ?>logout.php">Logout</a>
        </div>
    </div>

    <img src="<?= $BASE_URL ?>assets/img/perfil.svg" alt="">
</main>
<?php
include_once("partials/footer.html.php");
?>