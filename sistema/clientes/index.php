<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php'); // Redireciona para a página de login
    exit();
}

// Conexão com o banco de dados
include "../../central/includes/db_connection.php"; // Certifique-se de que o caminho está correto

// Definir o número de clientes por página
$clientes_por_pagina = 10;

// Verificar a página atual, se não estiver definida, a página padrão será 1
$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina_atual - 1) * $clientes_por_pagina;

// Consultar o número total de clientes
$sql_total = "SELECT COUNT(*) as total FROM clientes";
$stmt_total = $conn->query($sql_total);
$total_clientes = $stmt_total->fetch(PDO::FETCH_ASSOC)['total'];

// Calcular o total de páginas
$total_paginas = ceil($total_clientes / $clientes_por_pagina);

// Consultar clientes com paginação
$sql = "SELECT * FROM clientes LIMIT $clientes_por_pagina OFFSET $offset";
$stmt = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardex de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?php include "../../central/includes/menu_site_externo.php"; ?>

    <!-- Cardex de Clientes -->
    <div class="container my-5">
        <h3 class="text-center mb-4">Cardex de Clientes</h3>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome Completo</th>
                    <th scope="col">Tipo Pessoa</th>
                    <th scope="col">Documento</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        echo '<td>' . $row["codigo"] . '</td>';
                        echo '<td>' . $row["nome_completo"] . '</td>';
                        echo '<td>' . $row["tipo_pessoa"] . '</td>';
                        echo '<td>' . $row["documento"] . '</td>';
                        echo '<td>' . $row["email"] . '</td>';
                        echo '<td>' . $row["telefone"] . '</td>';
                        echo '<td>' . $row["cidade"] . '</td>';
                        echo '<td>' . $row["estado"] . '</td>';
                        echo '<td>' . ($row["status"] == '1' ? 'Ativo' : 'Inativo') . '</td>';
                        echo '<td>
                                <a href="cliente_detalhes.php?codigo=' . $row["codigo"] . '" class="btn btn-info btn-sm">Ver Detalhes</a>
                                <a href="cliente_editar.php?codigo=' . $row["codigo"] . '" class="btn btn-warning btn-sm">Editar</a>
                              </td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="10" class="text-center">Nenhum cliente encontrado.</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <!-- Navegação de Paginação -->
        <nav>
            <ul class="pagination justify-content-center">
                <!-- Link para a página anterior -->
                <?php if ($pagina_atual > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $pagina_atual - 1; ?>" aria-label="Anterior">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Links para as páginas -->
                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <li class="page-item <?php if ($i == $pagina_atual) echo 'active'; ?>">
                        <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Link para a próxima página -->
                <?php if ($pagina_atual < $total_paginas): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $pagina_atual + 1; ?>" aria-label="Próximo">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3 bg-dark text-white"><?php echo $info_rodape; ?></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>