<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "../central/includes/validar_sessao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Imobiliária ImovelNet</title>
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
        <a href="./Clientes/index.php">Clientes</a>
        <a href="./Financeiro/index.php">Financeiro</a>
        <a href="./Funcionarios/index.php">Funcionários</a>
        <a href="./Imoveis/index.php">Imóveis</a>
        <a href="../index.php">Menu Principal</a>
        <a href="../central/includes/sair.php">Sair</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <h3>Página do Funcionário</h3>
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
                <div class="col-md-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Clientes</h5>
                            <p class="card-text">Gerencie os dados dos clientes.</p>
                            <a href="./Clientes/index.php" class="btn btn-light">Acessar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Financeiro</h5>
                            <p class="card-text">Controle financeiro e pagamentos.</p>
                            <a href="./Financeiro/index.php" class="btn btn-light">Acessar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Funcionários</h5>
                            <p class="card-text">Gerenciamento dos funcionários.</p>
                            <a href="./Funcionarios/index.php" class="btn btn-light">Acessar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h5 class="card-title">Imóveis</h5>
                            <p class="card-text">Administração dos imóveis disponíveis.</p>
                            <a href="./Imoveis/index.php" class="btn btn-light">Acessar</a>
                        </div>
                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
