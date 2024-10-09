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

// Atualiza os dados se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];
    $obs = $_POST['obs'];
    $status = $_POST['status'];
    $dt_entrada = $_POST['dt_entrada'];
    $dt_saida = $_POST['dt_saida'];

    $sql_update = "UPDATE funcionarios 
                   SET codigo = ?, nome = ?, cpf = ?, email = ?, telefone = ?, cargo = ?, salario = ?, obs = ?, status = ?, dt_entrada = ?, dt_saida = ?, dt_alt = NOW()
                   WHERE id_funcionario = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->execute([$codigo, $nome, $cpf, $email, $telefone, $cargo, $salario, $obs, $status, $dt_entrada, $dt_saida, $id_funcionario]);

    // Redireciona após a atualização
    header("Location: funcionarios_detalhes.php?id=$id_funcionario");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?php include "../../central/includes/menu_site_externo.php"; ?>

    <div class="container my-5">
        <h3 class="text-center mb-4">Editar Funcionário</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $funcionario['codigo']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $funcionario['nome']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $funcionario['cpf']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $funcionario['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $funcionario['telefone']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $funcionario['cargo']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="salario" class="form-label">Salário</label>
                <input type="text" class="form-control" id="salario" name="salario" value="<?php echo $funcionario['salario']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="obs" class="form-label">Observações</label>
                <input type="text" class="form-control" id="obs" name="obs" value="<?php echo $funcionario['obs']; ?>">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" <?php echo ($funcionario['status'] == '1') ? 'selected' : ''; ?>>Ativo</option>
                    <option value="0" <?php echo ($funcionario['status'] == '0') ? 'selected' : ''; ?>>Inativo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="dt_entrada" class="form-label">Data de Entrada</label>
                <input type="date" class="form-control" id="dt_entrada" name="dt_entrada" value="<?php echo $funcionario['dt_entrada']; ?>">
            </div>
            <div class="mb-3">
                <label for="dt_saida" class="form-label">Data de Saída</label>
                <input type="date" class="form-control" id="dt_saida" name="dt_saida" value="<?php echo $funcionario['dt_saida']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
