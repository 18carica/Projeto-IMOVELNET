<?php
session_start();

if (!isset($_SESSION['id_funcionario'])) {
    header("Location: login.php");
    exit();
}

// Página interna do sistema
echo "Bem-vindo ao sistema!";
?>
