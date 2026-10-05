<?php
include("../infra/conexao.php");

$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$faixa_etaria = $_POST["faixa-etaria"];
$preco = $_POST["preco"];
$quantidade_estoque = $_POST["quantidade-estoque"];

$query = "INSERT INTO brinquedo (nome, categoria, faixa_etaria, preco, quantidade_estoque) VALUES (?, ?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $query);
mysqli_stmt_bind_param($comando, "sssdi", $nome, $categoria, $faixa_etaria, $preco, $quantidade_estoque);

mysqli_stmt_execute($comando);

header("Location: ../index.php");
exit();
?>
