<?php 
require_once("conexao.php");

if (count($_POST) > 0) {
    $nome = htmlspecialchars($_POST["nome"], ENT_HTML5);
    $endereco = htmlspecialchars($_POST["endereco"], ENT_HTML5);
    $rg = htmlspecialchars($_POST["rg"], ENT_HTML5);
    $cpf = htmlspecialchars($_POST["cpf"], ENT_HTML5);
    $senha = htmlspecialchars($_POST["senha"], ENT_HTML5);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
} else {
    header("Location: ../cadastro.php");
}

$cliente = $conexao->prepare("INSERT INTO cliente (nome, endereco) VALUES (:nome, :endereco)");
$cliente->bindParam(":nome", $nome, PDO::PARAM_STR);
$cliente->bindParam(":endereco", $endereco, PDO::PARAM_STR);
$cliente->execute();

$id_cliente = $conexao->lastInsertId();

$cliente_documento = $conexao->prepare("INSERT INTO cliente_documento (cpf, rg, id_cliente) VALUES (:cpf, :rg, :id_cliente)");
$cliente_documento->bindParam(":cpf", $cpf, PDO::PARAM_STR);
$cliente_documento->bindParam(":rg", $rg, PDO::PARAM_STR);
$cliente_documento->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
$cliente_documento->execute();

$login = $conexao->prepare("INSERT INTO cliente_login (email, senha, id_cliente) VALUES (:email, :senha, :id_cliente)");
$login->bindParam(":email", $email, PDO::PARAM_STR);
$login->bindParam(":senha", $senha, PDO::PARAM_STR);
$login->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
$login->execute();

header("Location: ../index.php");