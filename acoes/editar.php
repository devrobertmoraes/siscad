<?php
session_start();

if ((!isset($_SESSION["email"])) && (!isset($_SESSION["senha"]))) {
    unset($_SESSION["email"]);
    unset($_SESSION["senha"]);
    header("Location: ../login.php");
}

if (!empty($_GET["id"])) {
    require_once("conexao.php");

    $id = $_GET["id"];

    $stmt = $conexao->prepare("SELECT cliente.id AS id, cliente.nome AS nome, cliente.endereco AS endereco, cliente_documento.cpf AS cpf, cliente_documento.rg AS rg, cliente_login.email AS email, cliente_login.senha AS senha FROM cliente INNER JOIN cliente_documento ON cliente.id = cliente_documento.id_cliente INNER JOIN cliente_login ON cliente.id = cliente_login.id_cliente WHERE cliente.id = :id_cliente");
    $stmt->bindParam(":id_cliente", $id, PDO::PARAM_INT);
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    $dados["senha"] = $_SESSION["senha"];
}
?>

<?php
include_once("../helpers/urlBase.php"); 
$BASE_URL_EDIT = dirname($BASE_URL, 2);

include_once("../partials/header.html.php");
?>
<link rel="stylesheet" href="<?= $BASE_URL_EDIT; ?>/assets/css/styles.css">
<main class="cadastro">
    <div class="cadastro-main-conteudo">
        <h1>Edição<span class="purple-letter">.</span></h1>
        <form action="<?= $BASE_URL_EDIT; ?>/acoes/salvar_edicao.php" method="post">
            <div class="input-group">
                <div class="input-group-full">
                    <label>
                        Nome<br />
                        <input value="<?= isset($dados["nome"]) ? $dados["nome"] : ""; ?>" type="text" required name="nome" autofocus>
                    </label>
                    <br>
                    <label>
                        Endereço<br />
                        <input value="<?= isset($dados["endereco"]) ? $dados["endereco"] : ""; ?>" type="text" required name="endereco" placeholder="Rua, Nª, Bairro...">
                    </label>
                </div>
                <div class="input-group-even-1">
                    <label>
                        RG<br />
                        <input value="<?= isset($dados["rg"]) ? $dados["rg"] : ""; ?>" type="text" required name="rg">
                    </label>
                    <br>
                    <label>
                        CPF<br />
                        <input value="<?= isset($dados["cpf"]) ? $dados["cpf"] : ""; ?>" type="text" required name="cpf" placeholder="000.000.000-00">
                    </label>
                </div>
                <div class="input-group-even-2">
                    <label>
                        E-mail<br />
                        <input value="<?= isset($dados["email"]) ? $dados["email"] : ""; ?>" type="email" required name="email" placeholder="seuemail@email.com">
                    </label>
                    <br>
                    <label>
                        Senha<br />
                        <input value="<?= isset($dados["senha"]) ? $dados["senha"] : ""; ?>" type="text" required name="senha">
                    </label>
                    <input type="hidden" name="id" value="<?= $id ?>">
                </div>
            </div>

            <div class="button-group">
                <button class="button light" type="submit">Editar</button>
                <a class="button light" href="<?= $BASE_URL_EDIT; ?>/cliente_data.php">Voltar</a>
            </div>
        </form>
    </div>
    <img src="<?= $BASE_URL_EDIT ?>/assets/img/editar.svg" alt="">
</main>

<?php
include_once("../partials/footer.html.php");
?>