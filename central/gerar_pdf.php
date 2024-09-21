<?php
require('../fpdf/fpdf.php');
include 'conexao.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Título
$pdf->Cell(0, 10, 'Listagem de CEPs - Leandro Torres Mocelin', 0, 1, 'C');
$pdf->Ln(10);

// Cabeçalho da tabela
$pdf->Cell(10, 10, 'ID', 1, 0, 'C');
$pdf->Cell(30, 10, 'CEP', 1, 0, 'C');
$pdf->Cell(60, 10, 'Endereço', 1, 0, 'C');
$pdf->Cell(50, 10, 'Bairro', 1, 0, 'C');
$pdf->Cell(40, 10, 'Cidade', 1, 1, 'C');

// Consultar os dados
$sql = "SELECT * FROM ceps";
$result = $conn->query($sql);

// Ajustar fonte para o conteúdo
$pdf->SetFont('Arial', '', 12);

$linha = 0; // Contador de linhas por página
$max_linhas_por_pagina = 50; // Limite de 50 linhas por página

while ($row = $result->fetch_assoc()) {
    // Verificar se atingiu o limite de linhas por página
    if ($linha == $max_linhas_por_pagina) {
        $pdf->AddPage(); // Adicionar nova página
        $pdf->Cell(10, 10, 'ID', 1, 0, 'C');
        $pdf->Cell(30, 10, 'CEP', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Endereço', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Bairro', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Cidade', 1, 1, 'C');
        $linha = 0; // Reiniciar o contador
    }

    $pdf->Cell(10, 10, $row['id_cep'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['cep'], 1, 0, 'C');
    $pdf->MultiCell(60, 10, $row['endereco'], 1, 'L');
    $pdf->Cell(50, 10, $row['bairro'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['cidade'], 1, 1, 'C');

    $linha++;
}

// Gerar o PDF
$pdf->Output('D', 'listagem_ceps.pdf');
?>
