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

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/cadastro.css">
    <title>SisCad | Edição</title>
</head>
<body>
    <header>
        <div class="logo">
            <span class="purple-letter">S</span>is<span class="purple-letter">C</span>ad
        </div>
    </header>
    
    <main>
        <div class="main-box">
            <h1>Edição</h1>
            <form action="../salvar_edicao.php" method="post">
                <div class="input-group">
                    <label>
                        Nome<br />
                        <input value="<?= isset($dados["nome"]) ? $dados["nome"] : "";?>" type="text" required name="nome" autofocus>
                    </label>
                    <label>
                        Endereço<br />
                        <input value="<?= isset($dados["endereco"]) ? $dados["endereco"] : "";?>" type="text" required name="endereco" placeholder="Rua, Nª, Bairro...">
                    </label>
                    <div class="input-group-even">
                        <label>
                            RG<br />
                            <input value="<?= isset($dados["rg"]) ? $dados["rg"] : "";?>" type="text" required name="rg">
                        </label>
                        <label>
                            CPF<br />
                            <input value="<?= isset($dados["cpf"]) ? $dados["cpf"] : "";?>" type="text" required name="cpf" placeholder="000.000.000-00">
                        </label>
                    </div>
                        <label>
                            E-mail<br />
                            <input value="<?= isset($dados["email"]) ? $dados["email"] : "";?>" type="email" required name="email" placeholder="seuemail@email.com">
                        </label>
                        <label>
                            Senha<br />
                            <input value="<?= isset($dados["senha"]) ? $dados["senha"] : "";?>" type="text" required name="senha">
                        </label>
                        <input type="hidden" name="id" value="<?=$id?>">
                </div>
                <div class="main-links">
                    <button class="button" type="submit">Editar</button>
                    <a class="button" href="../../cliente_data.php">Voltar</a>
                </div>
            </form>
        </div>
    </main>

    <footer>SisCad - Todos os direitos reservados<div>Robert Moraes <span class="purple-letter">2023</span></div>
    </footer>
</body>
</html>