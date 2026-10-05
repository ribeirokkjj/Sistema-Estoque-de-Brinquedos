<?php

function validarBrinquedo(array $dados): array
{
    $erros = [];

    $nome = trim($dados['nome']);
    $categoria = trim($dados['categoria']);
    $faixaEtaria = trim($dados['faixa_etaria']);
    $preco = $dados['preco'];
    $quantidade = $dados['quantidade_estoque'];

    if ($nome === '' || strlen($nome) > 120) {
        $erros[] = 'Informe um nome válido com até 120 caracteres.';
    }

    if ($categoria === '' || strlen($categoria) > 80) {
        $erros[] = 'Informe uma categoria válida com até 80 caracteres.';
    }

    if ($faixaEtaria === '' || strlen($faixaEtaria) > 40) {
        $erros[] = 'Informe uma faixa etária válida com até 40 caracteres.';
    }

    if (!is_numeric($preco) || (float) $preco <= 0) {
        $erros[] = 'Informe um preço válido maior que zero.';
    }

    if (!is_numeric($quantidade) || (int) $quantidade < 0) {
        $erros[] = 'Informe uma quantidade em estoque válida (inteiro maior ou igual a zero).';
    }

    return $erros;
}

?>