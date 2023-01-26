<?php
include_once("./helpers/urlBase.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $BASE_URL ?>assets/css/styles.css">
    <title>SisCad | Home</title>
</head>

<body>
    <div class="header-container">
        <header>
            <div class="logo">
                <a href="<?= $BASE_URL ?>index.php"><span class="purple-letter">S</span>is<span class="purple-letter">C</span>ad</a>
            </div>
            <nav aria-label="primaria">
                <ul class="header-menu">
                    <li><a class="button" href="<?= $BASE_URL ?>cadastro.php">Cadastrar</a></li>
                    <li><a class="button" href="<?= $BASE_URL ?>login.php">Login</a></li>
                </ul>
            </nav>
        </header>
    </div>