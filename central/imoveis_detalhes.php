<?php
// Incluir o arquivo de conexão
include 'conexao.php';

// Verificar se o parâmetro "id" foi passado pela URL
if (isset($_GET['imovel'])) {
    $codigo = intval($_GET['codigo']);

    // Consultar detalhes do imóvel no banco de dados
    $sql = "SELECT * FROM imoveis WHERE codigo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $codigo);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o imóvel foi encontrado
    if ($result->num_rows > 0) {
        $imovel = $result->fetch_assoc();
    } else {
        echo "Imóvel não encontrado.";
        exit();
    }
} else {
    echo "ID do imóvel não fornecido.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Imóvel - <?php echo $imovel['codigo']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?php include "includes/menu_site_externo.php"; ?>

    <!-- Detalhes do Imóvel -->
    <div class="container my-5">
        <h3 class="text-center mb-4">Detalhes do Imóvel</h3>
        
        <div class="row">
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x300" class="img-fluid" alt="Imagem do imóvel">
            </div>
            <div class="col-md-6">
                <h4>Código: <?php echo $imovel['codigo']; ?></h4>
                <p><strong>Tipo:</strong> <?php echo $imovel['tipo_imovel']; ?></p>
                <p><strong>Endereço:</strong> <?php echo $imovel['endereco'] . ', ' . $imovel['endereco_numero'] . ', ' . $imovel['cidade'] . ' - ' . $imovel['estado']; ?></p>
                <p><strong>Área:</strong> <?php echo $imovel['m2']; ?> m²</p>
                <p><strong>Quantidade de Cômodos:</strong> <?php echo $imovel['qtd_comodos']; ?></p>
                <p><strong>Quantidade de Fotos:</strong> <?php echo $imovel['qtd_fotos']; ?></p>
                <p><strong>Status:</strong> <?php echo ($imovel['status'] == '1' ? 'Ativo' : 'Inativo'); ?></p>
                <p><strong>Observações:</strong> <?php echo $imovel['obs']; ?></p>
                <p><strong>Data de Registro:</strong> <?php echo date('d/m/Y H:i:s', strtotime($imovel['dt_reg'])); ?></p>
                <p><strong>Última Alteração:</strong> <?php echo date('d/m/Y H:i:s', strtotime($imovel['dt_alt'])); ?></p>
            </div>
        </div>

        <div class="mt-4">
            <a href="listagem_cardex.php" class="btn btn-secondary">Voltar à Listagem</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3 bg-dark text-white"><?php echo $info_rodape; ?></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
