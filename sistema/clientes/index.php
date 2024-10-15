<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../../central/includes/validar_sessao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Clientes | Imobiliária ImovelNet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            position: fixed;
            top: 0;
            bottom: 0;
            padding-top: 50px;
        }
        .sidebar a {
            padding: 15px;
            font-size: 18px;
            color: white;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }
        .navbar {
            margin-left: 250px;
        }
        .card {
            margin-bottom: 20px;
        }
        footer {
            background-color: #f8f9fa;
            width: 100%;
            padding: 10px 0;
            text-align: center;
            position: absolute;
            bottom: 0;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand text-center text-white mb-4" href="#">ImovelNet</a>
        <a href="cliente_listagem.php">Listar Clientes</a>
        <a href="cliente_cadastrar.php">Cadastrar Cliente</a>
        <a href="../index2.php">Dashboard</a>
        <a href="../../central/includes/sair.php">Sair</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <h3>Clientes - Dashboard</h3>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container mt-4">
            <?php
                if(isset($_SESSION["msg"]) && $_SESSION["msg"] != null){
                    echo "<div class='alert alert-info'>" . $_SESSION["msg"] . "</div>";
                    $_SESSION["msg"] = null;
                }
            ?>

            <!-- Dashboard Cards -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Listar Clientes</h5>
                            <p class="card-text">Veja todos os clientes cadastrados no sistema.</p>
                            <a href="cliente_listagem.php" class="btn btn-light">Acessar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Cadastrar Cliente</h5>
                            <p class="card-text">Adicione novos clientes ao sistema.</p>
                            <a href="cliente_cadastrar.php" class="btn btn-light">Acessar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Clientes Inativos</h5>
                            <p class="card-text">Gerencie clientes que estão inativos no sistema.</p>
                            <a href="#" class="btn btn-light">Visualizar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Pesquisar Clientes</h5>
                            <p class="card-text">Busque clientes pelo CPF ou Nome.</p>
                            <button class="btn btn-light" id="btnSearchClients">Pesquisar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal de Pesquisa -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pesquisar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="searchForm">
                        <div class="mb-3">
                            <label for="searchCpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="searchCpf" placeholder="Digite o CPF">
                        </div>
                        <div class="mb-3">
                            <label for="searchName" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="searchName" placeholder="Digite o Nome">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btnSubmitSearch">Pesquisar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3 bg-dark text-white">
            <p>© 2024 Imobiliária ImovelNet - Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../central/js/pesquisar_clientes.js"></script>

</body>
</html>
