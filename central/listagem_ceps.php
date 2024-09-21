<?php
include 'conexao.php';

// Definir o número de resultados por página
$limite = 23;

// Descobrir o número da página atual
$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina_atual - 1) * $limite;

// Consultar o número total de registros
$sql_total = "SELECT COUNT(*) as total FROM ceps";
$result_total = $conn->query($sql_total);
$total = $result_total->fetch_assoc()['total'];

// Calcular o total de páginas
$total_paginas = ceil($total / $limite);

// Consultar os dados para a página atual
$sql = "SELECT * FROM ceps LIMIT $inicio, $limite";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de CEPs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h3 class="text-center">Listagem de CEPs - <?php echo 'Leandro Torres Mocelin'; ?></h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CEP</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_cep']; ?></td>
                        <td><?php echo $row['cep']; ?></td>
                        <td><?php echo $row['endereco']; ?></td>
                        <td><?php echo $row['bairro']; ?></td>
                        <td><?php echo $row['cidade']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Botões de navegação -->
        <div class="d-flex justify-content-between my-3">
            <!-- Botão Anterior -->
            <?php if ($pagina_atual > 1): ?>
                <a href="?pagina=<?php echo $pagina_atual - 1; ?>" class="btn btn-secondary">Anterior</a>
            <?php else: ?>
                <a class="btn btn-secondary disabled">Anterior</a>
            <?php endif; ?>

            <!-- Botão Gerar PDF da Página Atual -->
            <a href="gerar_pdf.php?pagina=<?php echo $pagina_atual; ?>" class="btn btn-primary">Gerar PDF</a>

            <!-- Botão Próximo -->
            <?php if ($pagina_atual < $total_paginas): ?>
                <a href="?pagina=<?php echo $pagina_atual + 1; ?>" class="btn btn-secondary">Próximo</a>
            <?php else: ?>
                <a class="btn btn-secondary disabled">Próximo</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
