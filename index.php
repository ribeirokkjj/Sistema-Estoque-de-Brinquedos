<?php
include("infra/conexao.php");

$queryTabela = "SELECT id, nome, categoria, faixa_etaria, preco, quantidade_estoque FROM brinquedo ORDER BY id";
$resultadoTabela = mysqli_query($conexao, $queryTabela);
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Gestão de Brinquedos</title>
</head>

<body>

    <h1>Sistema de Gestão de Brinquedos</h1>

    <h2>Cadastrar Novo Brinquedo</h2>

    <form action="components/create.php" method="POST">
        <label for="nome">Nome do Brinquedo:</label><br>
        <input type="text" id="nome" name="nome" required><br>

        <label for="categoria">Categoria:</label><br>
        <input type="text" id="categoria" name="categoria" required><br>

        <label for="faixa-etaria">Faixa Etária:</label><br>
        <input type="text" id="faixa-etaria" name="faixa-etaria" placeholder="Ex.: 6+" required><br>

        <label for="preco">Preço:</label><br>
        <input type="number" step="0.01" id="preco" name="preco" required><br>

        <label for="quantidade-estoque">Quantidade em Estoque:</label><br>
        <input type="number" id="quantidade-estoque" name="quantidade-estoque" min="0" required><br><br>

        <button type="submit">Cadastrar Brinquedo</button>
    </form>

    <hr>

    <h2>Brinquedos Cadastrados</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Faixa Etária</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($brinquedo = mysqli_fetch_assoc($resultadoTabela)) {
                echo '<tr>';
                echo '<td>' . $brinquedo['id'] . '</td>';
                echo '<td>' . $brinquedo['nome'] . '</td>';
                echo '<td>' . $brinquedo['categoria'] . '</td>';
                echo '<td>' . $brinquedo['faixa_etaria'] . '</td>';
                echo '<td>R$ ' . number_format($brinquedo['preco'], 2, ',', '.') . '</td>';
                echo '<td>' . $brinquedo['quantidade_estoque'] . '</td>';
                echo '<td>';
                echo '<a href="components/edit.php?id=' . $brinquedo['id'] . '">Editar</a> | ';
                echo '<form action="components/delete.php" method="POST" style="display:inline;" onsubmit="return confirm(\'Deseja excluir este brinquedo?\');">';
                echo '<input type="hidden" name="id" value="' . $brinquedo['id'] . '">';
                echo '<button type="submit">Excluir</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

</body>

</html>
