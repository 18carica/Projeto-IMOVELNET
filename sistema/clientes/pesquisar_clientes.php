<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conectar ao banco de dados
include "../../central/includes/conexao.php";

// Receber dados via POST (JSON)
$data = json_decode(file_get_contents("php://input"), true);

$cpf = $data['cpf'] ?? null;
$name = $data['name'] ?? null;

if (!$cpf && !$name) {
    echo json_encode(["success" => false, "message" => "CPF ou Nome não fornecidos."]);
    exit();
}

try {
    // Preparar a consulta SQL
    $query = "SELECT * FROM clientes WHERE cpf = :cpf OR nome LIKE :name";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":cpf", $cpf);
    $stmt->bindParam(":name", $nameLike);
    $nameLike = '%' . $name . '%';
    $stmt->execute();

    $client = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($client) {
        echo json_encode(["success" => true, "client" => $client]);
    } else {
        echo json_encode(["success" => false, "message" => "Cliente não encontrado."]);
    }
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Erro no banco de dados: " . $e->getMessage()]);
}
