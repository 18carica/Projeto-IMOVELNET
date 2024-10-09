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
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?php include "../../central/includes/menu_site_externo.php"; ?>

    <div class="container my-5">
        <h3 class="text-center mb-4">Detalhes do Cliente</h3>
        <div class="mb-3">
            <label class="form-label">Nome Completo:</label>
            <p><?php echo $cliente['nome_completo']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de Pessoa:</label>
            <p><?php echo $cliente['tipo_pessoa']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Documento:</label>
            <p><?php echo $cliente['documento']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail:</label>
            <p><?php echo $cliente['email']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefone:</label>
            <p><?php echo $cliente['telefone']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">CEP:</label>
            <p><?php echo $cliente['cep']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Endereço:</label>
            <p><?php echo $cliente['endereco']; ?>, Nº <?php echo $cliente['endereco_numero']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Complemento:</label>
            <p><?php echo $cliente['complemento']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Bairro:</label>
            <p><?php echo $cliente['bairro']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Cidade:</label>
            <p><?php echo $cliente['cidade']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Estado:</label>
            <p><?php echo $cliente['estado']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Status:</label>
            <p><?php echo ($cliente['status'] == '1') ? 'Ativo' : 'Inativo'; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Registro:</label>
            <p><?php echo $cliente['dt_reg']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Última Alteração:</label>
            <p><?php echo $cliente['dt_alt']; ?></p>
        </div>
        <a href="cliente_alterar.php?codigo=<?php echo $cliente['codigo']; ?>" class="btn btn-primary">Editar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
