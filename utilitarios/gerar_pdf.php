<?php
require '../verifica_sessao/sessao.php';
$pdo2 = new PDO('sqlite:../db/desmembramento.db');
$sql = "SELECT * FROM desmembramento LEFT JOIN itens_desmembramento on desmembramento.id_formula = itens_desmembramento.id_desmembramento where desmembramento.status = 'A' and sessao = :sessao";
$sql = $pdo2->prepare($sql);
$sql->bindValue(':sessao', $_SESSION['id']);
$sql->execute();
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

// Incluir a biblioteca FPDF
require './FPDF/fpdf.php';

// Criar o objeto FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Adicionar logo
$pdf->Image('../img/logo.png', 80, 0, 50); // Ajuste conforme necessário

// Definir posição vertical
$pdf->SetY(30); // Ajuste conforme necessário para a distância desejada do topo

$pdf->SetFont('Arial', '', 15);

// Títulos das colunas
$pdf->Cell(0, 20, 'FORMULA DE DESMEMBRAMENTO', 0, 1, 'C'); // Centralize o texto

$pdf->SetFont('Arial', '', 10);

$pdf->Cell(0, 5, utf8_decode('NOME DA FORMULA : ' . strtolower($dados[0]['nome_formula'])), 0, 1, 'L');
$pdf->Cell(0, 5, utf8_decode('CUSTO TOTAL PRODUTO : R$ ' . number_format($dados[0]['custo_total'], 2, ',', '')), 0, 1, 'L');
$pdf->Cell(0, 5, utf8_decode('PESO TOTAL DO PRODUTO : ' . number_format($dados[0]['peso_total'], 2, ',', '') . 'KG'), 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);

$pdf->Cell(0, 10, utf8_decode('PRODUTOS GERADOS PÓS DESMEMBRAMENTO'), 0, 1, 'L');

// Títulos das colunas
$pdf->Cell(20, 10, 'NUMERO', 0, 0, 'C');
$pdf->Cell(80, 10, 'NOME', 0, 0, 'C');
$pdf->Cell(30, 10, 'QUANTIDADE', 0, 0, 'C');
$pdf->Cell(30, 10, '%QUANTIDADE', 0, 0, 'C');
$pdf->Cell(30, 10, '%CUSTO', 0, 0, 'C');
$pdf->Ln();

// Preencher os dados do banco de dados no arquivo PDF
$n = 1;
foreach ($dados as $dados) {
    $pdf->Cell(20, 6, $n++, 1, 0, 'C');
    $pdf->Cell(80, 6, utf8_decode($dados['nome_produto']), 1, 0, 'C');
    $pdf->Cell(30, 6, number_format($dados['quantidade'], 2, ',', ''), 1, 0, 'C');
    $pdf->Cell(30, 6, number_format($dados['porcentagem_quantidade'], 4, ',', ''), 1, 0, 'C');
    $pdf->Cell(30, 6, number_format($dados['porcentagem_custo'], 4, ',', ''), 1, 0, 'C');
    $pdf->Ln();
}

$pdf->SetFont('Arial', '', 15);

// Títulos das colunas
$pdf->Cell(0, 20, utf8_decode('TOTAL DE PERDA ' . number_format($dados['perda'], 4, ',', '') . '%'), 0, 1, 'C'); // Centralize o texto

// Definir o nome do arquivo
$nomeArquivo = 'desmembramento.pdf';

// Saída para o navegador
$pdf->Output($nomeArquivo, 'D', 'UTF-8');
