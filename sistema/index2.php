<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php'); // Redireciona para a página de login
    exit();
}

// Conteúdo da dashboard
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ImovelNet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Bem-vindo à Dashboard, <?= htmlspecialchars($_SESSION['usuario']); ?>!</h2>
        <p>Esta é a sua área de gerenciamento.</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Clientes</h5>
                        <p class="card-text">Gerencie seus clientes.</p>
                        <a href="../sistema/clientes/index.php" class="btn btn-primary">Ver Clientes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Funcionários</h5>
                        <p class="card-text">Gerencie seus funcionários.</p>
                        <a href="../sistema/funcionarios/index.php" class="btn btn-primary">Ver Funcionários</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Imóveis</h5>
                        <p class="card-text">Gerencie seus imóveis.</p>
                        <a href="../sistema/imoveis/index.php" class="btn btn-primary">Ver Imóveis</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
