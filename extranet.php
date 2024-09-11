<?php
session_start();
include "central/includes/db_connection.php"; // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se a conexão foi estabelecida corretamente
    if (isset($pdo)) {
        $query = $pdo->prepare("SELECT * FROM funcionarios WHERE email = :email AND status = '1'");
        $query->bindParam(':email', $email);
        $query->execute();

        $funcionario = $query->fetch(PDO::FETCH_ASSOC);

        if ($funcionario) {
            // Alteração: comparação direta de senhas
            if ($senha === $funcionario['senha']) {
                // Login bem-sucedido, criando a sessão
                $_SESSION['id_funcionario'] = $funcionario['id_funcionario'];
                $_SESSION['nome'] = $funcionario['nome'];
                header('Location: central/index.php');
                exit();
            } else {
                $error = "Senha incorreta!";
            }
        } else {
            $error = "Email não encontrado ou funcionário inativo!";
        }
    } else {
        $error = "Erro na conexão com o banco de dados!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Funcionário</title>
</head>
<body>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <br>
        <button type="submit">Entrar</button>
        <?php if (isset($error)) echo $error; ?>
    </form>
</body>
</html>
