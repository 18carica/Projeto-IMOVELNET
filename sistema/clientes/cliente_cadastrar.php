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
    $nome_completo = $_POST['nome_completo'];
    $tipo_pessoa = $_POST['tipo_pessoa'];
    $documento = $_POST['documento'];
    $tipo_cliente = $_POST['tipo_cliente'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $endereco_numero = $_POST['endereco_numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $obs = $_POST['obs'];
    $status = $_POST['status'];

    $sql = "INSERT INTO clientes (codigo, nome_completo, tipo_pessoa, documento, tipo_cliente, email, telefone, cep, endereco, endereco_numero, complemento, bairro, cidade, estado, obs, status, dt_reg) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([$codigo, $nome_completo, $tipo_pessoa, $documento, $tipo_cliente, $email, $telefone, $cep, $endereco, $endereco_numero, $complemento, $bairro, $cidade, $estado, $obs, $status]);

    // Redireciona para a lista de clientes após o cadastro
    header('Location: clientes_listar.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?php include "../../central/includes/menu_site_externo.php"; ?>

    <div class="container my-5">
        <h3 class="text-center mb-4">Cadastrar Cliente</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <div class="mb-3">
                <label for="nome_completo" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome_completo" name="nome_completo" required>
            </div>
            <div class="mb-3">
                <label for="tipo_pessoa" class="form-label">Tipo de Pessoa</label>
                <select class="form-control" id="tipo_pessoa" name="tipo_pessoa" required>
                    <option value="PF">Pessoa Física (PF)</option>
                    <option value="PJ">Pessoa Jurídica (PJ)</option>
                    <option value="ESTRANGEIRO">Estrangeiro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" class="form-control" id="documento" name="documento" required>
            </div>
            <div class="mb-3">
                <label for="tipo_cliente" class="form-label">Tipo de Cliente</label>
                <select class="form-control" id="tipo_cliente" name="tipo_cliente" required>
                    <option value="INQUILINO">Inquilino</option>
                    <option value="COMPRADOR">Comprador</option>
                    <option value="VENDEDOR">Vendedor</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
            <div class="mb-3">
                <label for="endereco_numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="endereco_numero" name="endereco_numero" required>
            </div>
            <div class="mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento">
            </div>
            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" required>
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" maxlength="2" required>
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
            <button type="submit" class="btn btn-primary">Cadastrar Cliente</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
