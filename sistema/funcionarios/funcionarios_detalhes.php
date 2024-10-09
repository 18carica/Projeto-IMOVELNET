<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: ../../index.php'); // Redireciona para a página de login
    exit();
}

// Conexão com o banco de dados
include "../../central/includes/db_connection.php";

// Verifica se o ID do funcionário foi fornecido
if (!isset($_GET['id'])) {
    header('Location: index.php'); // Redireciona para a página de listagem de funcionários
    exit();
}

// Obtém os dados do funcionário
$id_funcionario = $_GET['id'];
$sql = "SELECT * FROM funcionarios WHERE id_funcionario = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_funcionario]);
$funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?php include "../../central/includes/menu_site_externo.php"; ?>

    <div class="container my-5">
        <h3 class="text-center mb-4">Detalhes do Funcionário</h3>
        <div class="mb-3">
            <label class="form-label">Código:</label>
            <p><?php echo $funcionario['codigo']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Nome Completo:</label>
            <p><?php echo $funcionario['nome']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">CPF:</label>
            <p><?php echo $funcionario['cpf']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail:</label>
            <p><?php echo $funcionario['email']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefone:</label>
            <p><?php echo $funcionario['telefone']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Cargo:</label>
            <p><?php echo $funcionario['cargo']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Salário:</label>
            <p><?php echo $funcionario['salario']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Observações:</label>
            <p><?php echo $funcionario['obs']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Status:</label>
            <p><?php echo ($funcionario['status'] == '1') ? 'Ativo' : 'Inativo'; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Entrada:</label>
            <p><?php echo $funcionario['dt_entrada']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Saída:</label>
            <p><?php echo $funcionario['dt_saida']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Registro:</label>
            <p><?php echo $funcionario['dt_reg']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Última Alteração:</label>
            <p><?php echo $funcionario['dt_alt']; ?></p>
        </div>
        <a href="funcionarios_alterar.php?id=<?php echo $funcionario['id_funcionario']; ?>" class="btn btn-primary">Editar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
