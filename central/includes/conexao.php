<?php
$servername = 'localhost';
$dbname = 'IMOVELNET';
$username = 'root';
$password = 'admin';

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
//echo "Conexão bem-sucedida";
?>