<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Incluir o arquivo de conexão
include 'conexao.php';

// Verificar se o parâmetro "codigo" foi passado pela URL
if (isset($_GET['codigo'])) {
    $codigo_cliente = $_GET['codigo'];

    // Consultar os dados do cliente no banco de dados
    $sql = "SELECT * FROM clientes WHERE codigo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $codigo_cliente);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o cliente foi encontrado
    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
    } else {
        echo "Cliente não encontrado.";
        exit();
    }
} else {
    echo "Código do cliente não fornecido.";
    exit();
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // Verificar se o CEP já existe na tabela 'ceps'
    $sql = "SELECT * FROM ceps WHERE codigo_IBGE_cep = ? AND cidade_cep = ? AND uf_cep = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $endereco, $cidade, $estado);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Caso o CEP não exista, inserir na tabela 'ceps'
        $sql_insert_cep = "INSERT INTO ceps (tipo_cep, subtipo_cep, uf_cep, cidade_cep, bairro_cep, endereco_cep, complemento_cep, codigo_IBGE_cep) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert_cep);
        $tipo_cep = 'Tipo padrão';  // Ajuste conforme necessário
        $subtipo_cep = 'Subtipo padrão';  // Ajuste conforme necessário
        $bairro_cep = 'Bairro padrão';  // Ajuste conforme necessário
        $codigo_IBGE_cep = '000000';  // Ajuste conforme necessário

        $stmt_insert->bind_param("ssssssss", $tipo_cep, $subtipo_cep, $estado, $cidade, $bairro_cep, $endereco, $complemento, $codigo_IBGE_cep);
        $stmt_insert->execute();
    }

    // Atualizar os dados do cliente no banco de dados
    $sql = "UPDATE clientes SET 
                nome_completo = ?, tipo_pessoa = ?, documento = ?, tipo_cliente = ?, 
                email = ?, telefone = ?, cep = ?, endereco = ?, 
                endereco_numero = ?, complemento = ?, bairro = ?, cidade = ?, estado = ?, 
                obs = ?, status = ?, dt_alt = NOW() 
            WHERE codigo = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssss", 
        $nome_completo, $tipo_pessoa, $documento, $tipo_cliente, 
        $email, $telefone, $cep, $endereco, $endereco_numero, 
        $complemento, $bairro, $cidade, $estado, $obs, $status, $codigo_cliente);

    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso.";
        header("Location: clientes_listagem_cardex.php"); // Redirecionar para a listagem de clientes
        exit();
    } else {
        echo "Erro ao atualizar os dados: " . $conn->error;
    }
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
    <?php include "includes/menu_site_externo.php"; ?>

    <!-- Formulário de Edição -->
    <div class="container my-5">
        <h3 class="text-center mb-4">Editar Cliente</h3>
        <form method="post" action="">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nome_completo" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="<?php echo $cliente['nome_completo']; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="tipo_pessoa" class="form-label">Tipo de Pessoa</label>
                    <select class="form-select" id="tipo_pessoa" name="tipo_pessoa" required>
                        <option value="PF" <?php if ($cliente['tipo_pessoa'] == 'PF') echo 'selected'; ?>>Pessoa Física</option>
                        <option value="PJ" <?php if ($cliente['tipo_pessoa'] == 'PJ') echo 'selected'; ?>>Pessoa Jurídica</option>
                        <option value="ESTRANGEIRO" <?php if ($cliente['tipo_pessoa'] == 'ESTRANGEIRO') echo 'selected'; ?>>Estrangeiro</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="documento" class="form-label">Documento</label>
                    <input type="text" class="form-control" id="documento" name="documento" value="<?php echo $cliente['documento']; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="tipo_cliente" class="form-label">Tipo de Cliente</label>
                    <select class="form-select" id="tipo_cliente" name="tipo_cliente" required>
                        <option value="INQUILICO" <?php if ($cliente['tipo_cliente'] == 'INQUILICO') echo 'selected'; ?>>Inquilino</option>
                        <option value="COMPRADOR" <?php if ($cliente['tipo_cliente'] == 'COMPRADOR') echo 'selected'; ?>>Comprador</option>
                        <option value="VENDEDOR" <?php if ($cliente['tipo_cliente'] == 'VENDEDOR') echo 'selected'; ?>>Vendedor</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $cliente['email']; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $cliente['telefone']; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $cliente['cep']; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $cliente['endereco']; ?>" required>
                </div>
                <div class="col-md-2">
                    <label for="endereco_numero" class="form-label">Número</label>
                    <input type="text" class="form-control" id="endereco_numero" name="endereco_numero" value="<?php echo $cliente['endereco_numero']; ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $cliente['complemento']; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cliente['cidade']; ?>" required>
                </div>
                <div class="col-md-2">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $cliente['estado']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="obs" class="form-label">Observações</label>
                    <textarea class="form-control" id="obs" name="obs"><?php echo $cliente['obs']; ?></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="1" <?php if ($cliente['status'] == '1') echo 'selected'; ?>>Ativo</option>
                        <option value="0" <?php if ($cliente['status'] == '0') echo 'selected'; ?>>Inativo</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="clientes_listagem_cardex.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){
    $('#cep').on('blur', function(){
        var cep = $(this).val();
        if (cep != "") {
            $.ajax({
                url: 'buscar_cep.php',
                type: 'GET',
                data: {cep: cep},
                dataType: 'json',
                success: function(response){
                    if(response.error){
                        alert(response.error);
                    } else {
                        $('#endereco').val(response.endereco_cep);
                        $('#bairro').val(response.bairro_cep);
                        $('#cidade').val(response.cidade_cep);
                        $('#estado').val(response.uf_cep);
                        $('#complemento').val(response.complemento_cep);
                    }
                },
                error: function(){
                    alert('Erro ao buscar o CEP.');
                }
            });
        }
    });
});
</script>

</body>
</html>