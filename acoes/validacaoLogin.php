<?php
session_start();

if (!empty($_POST["email"]) && !empty($_POST["senha"])) {
    require_once("conexao.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $id_cliente = $conexao->prepare("SELECT id_cliente FROM cliente_login WHERE email = :email AND senha = :senha");
    $id_cliente->bindParam(":email", $email, PDO::PARAM_STR);
    $id_cliente->bindParam(":senha", $senha, PDO::PARAM_STR);
    $id_cliente->execute();
    $res = $id_cliente->fetch(PDO::FETCH_ASSOC);
    $id_cliente = $res["id_cliente"];


    $login = $conexao->prepare("SELECT * FROM cliente_login WHERE email = :email AND senha = :senha");
    $login->bindParam(":email", $email, PDO::PARAM_STR);
    $login->bindParam(":senha", $senha, PDO::PARAM_STR);
    $login->execute();

    if ($login->rowCount() < 1) {
        unset($_SESSION["email"]);
        unset($_SESSION["senha"]);
        header("Location: ../login.php");
    } else {
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $senha;
        $_SESSION["id_cliente"] = $id_cliente;
        header("Location: ../cliente_data.php");
    }
}