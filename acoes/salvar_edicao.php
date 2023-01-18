<?php 
require_once("conexao.php");

if (count($_POST) > 0) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];


    $cliente = $conexao->prepare("UPDATE cliente SET nome = :nome, endereco = :endereco WHERE id = :id");
    $cliente->bindParam(":nome", $nome, PDO::PARAM_STR);
    $cliente->bindParam(":endereco", $endereco, PDO::PARAM_STR);
    $cliente->bindParam(":id", $id, PDO::PARAM_INT);
    $cliente->execute();

    $cliente_documento = $conexao->prepare("UPDATE cliente_documento SET cpf = :cpf, rg = :rg WHERE id_cliente = :id");
    $cliente_documento->bindParam(":cpf", $cpf, PDO::PARAM_STR);
    $cliente_documento->bindParam(":rg", $rg, PDO::PARAM_STR);
    $cliente_documento->bindParam(":id", $id, PDO::PARAM_INT);
    $cliente_documento->execute();

    $cliente_login = $conexao->prepare("UPDATE cliente_login SET email = :email, senha = :senha WHERE id_cliente = :id");
    $cliente_login->bindParam(":email", $email, PDO::PARAM_STR);
    $cliente_login->bindParam(":senha", $senha, PDO::PARAM_STR);
    $cliente_login->bindParam(":id", $id, PDO::PARAM_INT);
    $cliente_login->execute();

    header("Location: ../cliente_data.php");
}

