<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: ../../index.php'); // Redireciona para a página de login
    exit();
}

// Conexão com o banco de dados
include "../../central/includes/db_connection.php";

// Verifica se o código do cliente foi fornecido
if (!isset($_GET['codigo'])) {
    header('Location: index.php'); // Redireciona para a página de listagem de clientes
    exit();
}

// Obtém os dados do cliente
$codigo_cliente = $_GET['codigo'];
$sql = "SELECT * FROM clientes WHERE codigo = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$codigo_cliente]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

// Atualiza os dados se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_completo = $_POST['nome_completo'];
    $tipo_pessoa = $_POST['tipo_pessoa'];
    $documento = $_POST['documento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $endereco_numero = $_POST['endereco_numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $status = $_POST['status'];

    $sql_update = "UPDATE clientes 
                   SET nome_completo = ?, tipo_pessoa = ?, documento = ?, email = ?, telefone = ?, cep = ?, endereco = ?, endereco_numero = ?, complemento = ?, bairro = ?, cidade = ?, estado = ?, status = ?, dt_alt = NOW()
                   WHERE codigo = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->execute([$nome_completo, $tipo_pessoa, $documento, $email, $telefone, $cep, $endereco, $endereco_numero, $complemento, $bairro, $cidade, $estado, $status, $codigo_cliente]);

    // Redireciona após a atualização
    header("Location: cliente_detalhes.php?codigo=$codigo_cliente");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?php include "../../central/includes/menu_site_externo.php"; ?>

    <div class="container my-5">
        <h3 class="text-center mb-4">Editar Cliente</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="nome_completo" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="<?php echo $cliente['nome_completo']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tipo_pessoa" class="form-label">Tipo de Pessoa</label>
                <select class="form-control" id="tipo_pessoa" name="tipo_pessoa" required>
                    <option value="PJ" <?php echo ($cliente['tipo_pessoa'] == 'PJ') ? 'selected' : ''; ?>>Pessoa Jurídica</option>
                    <option value="PF" <?php echo ($cliente['tipo_pessoa'] == 'PF') ? 'selected' : ''; ?>>Pessoa Física</option>
                    <option value="ESTRANGEIRO" <?php echo ($cliente['tipo_pessoa'] == 'ESTRANGEIRO') ? 'selected' : ''; ?>>Estrangeiro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" class="form-control" id="documento" name="documento" value="<?php echo $cliente['documento']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $cliente['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $cliente['telefone']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $cliente['cep']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $cliente['endereco']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="endereco_numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="endereco_numero" name="endereco_numero" value="<?php echo $cliente['endereco_numero']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $cliente['complemento']; ?>">
            </div>
            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $cliente['bairro']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cliente['cidade']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $cliente['estado']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" <?php echo ($cliente['status'] == '1') ? 'selected' : ''; ?>>Ativo</option>
                    <option value="0" <?php echo ($cliente['status'] == '0') ? 'selected' : ''; ?>>Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
