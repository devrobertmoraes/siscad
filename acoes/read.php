<?php 
require_once("conexao.php");

$id_cliente = intval($_SESSION["id_cliente"]);

$stmt = $conexao->prepare("SELECT cliente.id AS id, cliente.nome AS nome, cliente.endereco AS endereco, cliente_documento.cpf AS cpf, cliente_documento.rg AS rg, cliente_login.email AS email FROM cliente INNER JOIN cliente_documento ON cliente.id = cliente_documento.id_cliente INNER JOIN cliente_login ON cliente.id = cliente_login.id_cliente WHERE cliente.id = :id_cliente");
$stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

$dados["senha"] = $_SESSION["senha"];
