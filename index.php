<?php
include_once("partials/header.html.php");
include_once("helpers/urlBase.php");
?>

<main class="index">
    <div class="index-main-conteudo">
        <h1>Bem vindo ao SisCad<span class="purple-letter">!</span></h1>
        <p>
            Um sistema de cadastro que foi pensado para que você tenha praticidade na hora de gerir os dados dos seus clientes<span class="purple-letter">.</span>
        </p>
        <h2>Acesse a sua conta ou cadastre-se para ter acesso<span class="purple-letter">:</span></h2>
        <div class="button-group">
            <a class="button light" href="cadastro.php">Cadastrar</a>
            <a class="button light" href="login.php">Login</a>
        </div>
    </div>
    <img src="<?= $BASE_URL ?>assets/img/telaInicial.svg" alt="">
</main>

<?php
include_once("partials/footer.html.php");

echo "$BASE_URL";
?>

