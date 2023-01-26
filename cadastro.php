<?php
include_once("partials/header.html.php");
include_once("helpers/urlBase.php");
?>
<main class="cadastro">
    <div class="cadastro-main-conteudo">
        <h1>Cadastro<span class="purple-letter">.</span></h1>
        <form action="./acoes/insert.php" method="post">
            <div class="input-group">
                <div class="input-group-full">
                    <label>
                        Nome<br />
                        <input type="text" required name="nome" autofocus>
                    </label>
                    <br>
                    <label>
                        Endereço<br />
                        <input type="text" required name="endereco" placeholder="Rua, Nª, Bairro...">
                    </label>
                </div>
                <div class="input-group-even-1">
                    <label>
                        RG<br />
                        <input type="text" required name="rg">
                    </label>
                    <br>
                    <label>
                        CPF<br />
                        <input type="text" required name="cpf" placeholder="000.000.000-00">
                    </label>
                </div>
                <div class="input-group-even-2">
                    <label>
                        E-mail<br />
                        <input type="email" required name="email" placeholder="seuemail@email.com">
                    </label>
                    <br>
                    <label>
                        Senha<br />
                        <input type="password" required name="senha">
                    </label>
                </div>
            </div>

            <div class="button-group">
                <button class="button light" type="submit">Enviar</button>
                <a class="button light" href="index.php">Voltar</a>
            </div>
        </form>
    </div>
    <img src="<?= $BASE_URL ?>assets/img/cadastro.svg" alt="">
</main>

<?php
include_once("partials/footer.html.php");
?>