<?php
// Incluir o arquivo de conexão
include 'central/conexao.php';

// Consultar imóveis no banco de dados
$sql = "SELECT codigo, tipo_imovel, qtd_comodos, m2, endereco, endereco_numero, cidade, estado FROM imoveis";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Imóveis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include "central/includes/menu_site_externo.php"; ?>
    
    <!-- Listagem de Imóveis -->
    <div class="container my-5">
        <h3 class="text-center mb-4">Propriedades Disponíveis</h3>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                // Exibir cada imóvel em uma "card"
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="https://via.placeholder.com/350x150" class="card-img-top" alt="Imagem do imóvel">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["tipo_imovel"] . ' - ' . $row["cidade"] . '</h5>';
                    echo '<p class="card-text">' . $row["qtd_comodos"] . ' cômodos, ' . $row["m2"] . ' m²</p>';
                    echo '<p class="card-text">' . $row["endereco"] . ', ' . $row["endereco_numero"] . ', ' . $row["cidade"] . ' - ' . $row["estado"] . '</p>';
                    echo '<a href="#" class="btn btn-primary">Ver Detalhes</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">Nenhuma propriedade encontrada.</p>';
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3 bg-dark text-white"><?php echo $info_rodape; ?></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
