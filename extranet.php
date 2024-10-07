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
            // Comparação direta de senhas
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
    <title>Login Funcionário - Extranet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2 class="text-center">Login Funcionário</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" name="senha" class="form-control" id="senha" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
            <?php if (isset($error)): ?>
                <div class="error-message mt-3 text-center"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
