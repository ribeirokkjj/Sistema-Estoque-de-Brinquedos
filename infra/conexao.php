<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "brinquedosdb";
$porta = 6608;

$conexao = new mysqli($host, $usuario, $senha, $banco, $porta);

if ($conexao->connect_error) {
    http_response_code(500);
    die("Erro na conexao com o banco de dados: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");

?>