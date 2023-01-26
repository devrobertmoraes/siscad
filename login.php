<?php
include_once("partials/header.html.php");
?>
<main class="login">
    <div class="login-main-conteudo">
        <h1>Login<span class="purple-letter">.</span></h1>

        <form action="acoes/validacaoLogin.php" method="post">
            <div class="input-group">
                <label>
                    E-mail<br />
                    <input type="email" required name="email" placeholder="seuemail@email.com">
                </label>
                <label>
                    Senha<br />
                    <input type="password" required name="senha">
                </label>
            </div>

            <div class="button-group">
                <button class="button light" type="submit">Login</button>
                <a class="button light" href="index.php">Voltar</a>
            </div>
        </form>
    </div>
    <img src="<?= $BASE_URL ?>assets/img/login.svg" alt="">
</main>
<?php
include_once("partials/footer.html.php"); 
?>