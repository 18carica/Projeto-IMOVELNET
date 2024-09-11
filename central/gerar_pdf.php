<?php
require('../fpdf186/fpdf.php');
include 'conexao.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Título
$pdf->Cell(0, 10, 'Listagem de CEPs - Leandro Torres Mocelin', 0, 1, 'C');
$pdf->Ln(10);

// Cabeçalho da tabela
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(30, 10, 'CEP', 1);
$pdf->Cell(50, 10, 'Endereco', 1);
$pdf->Cell(20, 10, 'Numero', 1);
$pdf->Cell(30, 10, 'Bairro', 1);
$pdf->Cell(40, 10, 'Cidade', 1);
$pdf->Ln();

// Consultar os dados
$sql = "SELECT * FROM ceps";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(20, 10, $row['id_cep'], 1);
    $pdf->Cell(30, 10, $row['cep'], 1);
    $pdf->Cell(50, 10, $row['endereco'], 1);
    $pdf->Cell(20, 10, $row['endereco_numero'], 1);
    $pdf->Cell(30, 10, $row['bairro'], 1);
    $pdf->Cell(40, 10, $row['cidade'], 1);
    $pdf->Ln();
}

$pdf->Output('D', 'listagem_ceps.pdf');
?>
