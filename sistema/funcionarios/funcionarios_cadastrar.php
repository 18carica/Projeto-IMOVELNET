<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: ../../index.php'); // Redireciona para a página de login
    exit();
}

// Conexão com o banco de dados
include "../../central/includes/db_connection.php";

// Processa o formulário se enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografia da senha
    $telefone = $_POST['telefone'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];
    $obs = $_POST['obs'];
    $status = $_POST['status'];
    $dt_entrada = $_POST['dt_entrada'];
    $dt_saida = $_POST['dt_saida'];

    $sql = "INSERT INTO funcionarios (codigo, nome, cpf, email, senha, telefone, cargo, salario, obs, status, dt_entrada, dt_saida, dt_reg) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([$codigo, $nome, $cpf, $email, $senha, $telefone, $cargo, $salario, $obs, $status, $dt_entrada, $dt_saida]);

    // Redireciona para a lista de funcionários após o cadastro
    header('Location: funcionarios_listar.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?php include "../../central/includes/menu_site_externo.php"; ?>

    <div class="container my-5">
        <h3 class="text-center mb-4">Cadastrar Funcionário</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" maxlength="11" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="cargo" name="cargo" required>
            </div>
            <div class="mb-3">
                <label for="salario" class="form-label">Salário</label>
                <input type="number" step="0.01" class="form-control" id="salario" name="salario" required>
            </div>
            <div class="mb-3">
                <label for="obs" class="form-label">Observações</label>
                <input type="text" class="form-control" id="obs" name="obs">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="dt_entrada" class="form-label">Data de Entrada</label>
                <input type="date" class="form-control" id="dt_entrada" name="dt_entrada" required>
            </div>
            <div class="mb-3">
                <label for="dt_saida" class="form-label">Data de Saída</label>
                <input type="date" class="form-control" id="dt_saida" name="dt_saida">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Funcionário</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
