<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir o arquivo de conexão
include 'conexao.php';

// Consultar clientes no banco de dados
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
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
    <?php include "includes/menu_site_externo.php"; ?>

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
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
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
                                <a href="cliente_editar.php?codigo='   . $row["codigo"] . '" class="btn btn-warning btn-sm">Editar</a>
                                <a href="cliente_excluir.php?codigo='  . $row["codigo"] . '" class="btn btn-danger btn-sm">Excluir</a>
                              </td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="10" class="text-center">Nenhum cliente encontrado.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3 bg-dark text-white"><?php echo $info_rodape; ?></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
