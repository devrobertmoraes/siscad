<?php
session_start();

if (!empty($_POST["email"]) && !empty($_POST["senha"])) {
    require_once("conexao.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $id_cliente = $conexao->prepare("SELECT id_cliente FROM cliente_login WHERE email = :email");
    $id_cliente->bindParam(":email", $email, PDO::PARAM_STR);
    $id_cliente->execute();
    $res = $id_cliente->fetch(PDO::FETCH_ASSOC);
    $id_cliente = $res["id_cliente"];


    $login = $conexao->prepare("SELECT * FROM cliente_login WHERE email = :email");
    $login->bindParam(":email", $email, PDO::PARAM_STR);
    $login->execute();
    $user = $login->fetch(PDO::FETCH_ASSOC);

    if (($login->rowCount() > 0) and password_verify($senha, $user["senha"])) {
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $senha;
        $_SESSION["id_cliente"] = $id_cliente;
        header("Location: ../cliente_data.php");
    } else {
        unset($_SESSION["email"]);
        unset($_SESSION["senha"]);
        header("Location: ../login.php");
    }
}
