<?php
include("../infra/conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $faixa_etaria = $_POST["faixa-etaria"];
    $preco = $_POST["preco"];
    $quantidade_estoque = $_POST["quantidade-estoque"];

    $query = "UPDATE brinquedo SET nome = ?, categoria = ?, faixa_etaria = ?, preco = ?, quantidade_estoque = ? WHERE id = ?";

    $comando = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($comando, "sssdii", $nome, $categoria, $faixa_etaria, $preco, $quantidade_estoque, $id);
    mysqli_stmt_execute($comando);

    header("Location: ../index.php");
    exit();
}

$id = $_GET["id"];

$query = "SELECT id, nome, categoria, faixa_etaria, preco, quantidade_estoque FROM brinquedo WHERE id = ?";
$comando = mysqli_prepare($conexao, $query);
mysqli_stmt_bind_param($comando, "i", $id);
mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
$brinquedo = mysqli_fetch_assoc($resultado);
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Brinquedo</title>
</head>

<body>
    <h1>Editar Brinquedo</h1>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $brinquedo['id']; ?>">

        <label for="nome">Nome do Brinquedo:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo $brinquedo['nome']; ?>" required><br>

        <label for="categoria">Categoria:</label><br>
        <input type="text" id="categoria" name="categoria" value="<?php echo $brinquedo['categoria']; ?>" required><br>

        <label for="faixa-etaria">Faixa Etária:</label><br>
        <input type="text" id="faixa-etaria" name="faixa-etaria" value="<?php echo $brinquedo['faixa_etaria']; ?>" required><br>

        <label for="preco">Preço:</label><br>
        <input type="number" step="0.01" id="preco" name="preco" value="<?php echo $brinquedo['preco']; ?>" required><br>

        <label for="quantidade-estoque">Quantidade em Estoque:</label><br>
        <input type="number" id="quantidade-estoque" name="quantidade-estoque" value="<?php echo $brinquedo['quantidade_estoque']; ?>" required><br><br>

        <button type="submit">Salvar Alteracoes</button>
    </form>

</body>

</html>
