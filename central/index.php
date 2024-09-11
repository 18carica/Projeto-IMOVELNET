<?php
session_start();

if (!isset($_SESSION['id_funcionario'])) {
    header("Location: ../extranet.php");
    exit();
}

// Se estiver autenticado, pode acessar a página
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Central</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h1>
    <a href="cadastros.php">Ir para cadastros</a>
    <a href="listagens.php">Ir para listagens</a>
    <a href="../logout.php">Sair</a>
</body>
</html>
