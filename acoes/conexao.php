<?php 
$host = "localhost";
$db = "siscad";
$user = "root";
$pass = "";

try {
    $conexao = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "ERRO: {$e->getMessage()}";
}