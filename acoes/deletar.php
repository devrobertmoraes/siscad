<?php 
session_start();

if ((!isset($_SESSION["email"])) && (!isset($_SESSION["senha"]))) {
    unset($_SESSION["email"]);
    unset($_SESSION["senha"]);
    header("Location: login.php");
}

if (!empty($_GET["id"])) {
    require_once("conexao.php");

    $id = $_GET["id"];

    $stmt = $conexao->query("SELECT * FROM cliente WHERE id = $id");

    if ($stmt->rowCount() > 0) {
        $conexao->query("DELETE FROM cliente_login WHERE id_cliente = $id");
        $conexao->query("DELETE FROM cliente_documento WHERE id_cliente = $id");
        $conexao->query("DELETE FROM cliente WHERE id = $id");
        session_destroy();
        header("Location: ../../index.php");
    } else {
        header("Location: ../cliente_data.php");
    }
}

