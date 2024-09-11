<?php
session_start();
include './central/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT id_funcionario, senha FROM funcionarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id_funcionario, $hashed_password);
        $stmt->fetch();
        
        if (password_verify($senha, $hashed_password)) {
            $_SESSION['id_funcionario'] = $id_funcionario;
            header("Location: index1.php");
            exit();
        } else {
            $error = "Senha inválida!";
        }
    } else {
        $error = "Usuário não encontrado!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post">
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Senha:</label>
        <input type="password" name="senha" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
    <?php if (isset($error)) echo $error; ?>
</body>
</html>
