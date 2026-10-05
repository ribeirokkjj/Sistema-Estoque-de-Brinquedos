<?php
include("../infra/conexao.php");

$id = $_POST["id"];

$query = "DELETE FROM brinquedo WHERE id = ?";

$comando = mysqli_prepare($conexao, $query);
mysqli_stmt_bind_param($comando, "i", $id);
mysqli_stmt_execute($comando);

header("Location: ../index.php");
exit();
?>
