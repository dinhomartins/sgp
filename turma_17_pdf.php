<?php
    session_start(); 
    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php?erro=1');
    }
require('fpdf/fpdf.php');
require_once('db.class.php');

 
    $objDb = new db();
    // cria uma variavel que irá acessar os metodos de conexão
    $link = $objDb->conecta_mysql();
    
    
    $filtro_horario = '17:00 - 18:00';
    $dia_da_semana = 'Terça - Quinta';
    //Seleciona todos os registro da tabela cad_aluno ou o que for armazenado pela variavel pesquisada
    $resultado_todos = " SELECT * FROM cad_aluno WHERE horario = '$filtro_horario' AND dia = '$dia_da_semana' AND status = 'cursando' ";
    // Busca todos os registros ou o que for digitado no campo pesquisar
    $query_todos = mysqli_query($link, $resultado_todos);



date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');


$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,'Hello World!');
$pdf->Cell(280,10,utf8_decode("Lista de presença"),0,0,"L");
$pdf->Ln();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(280,5,utf8_decode("Instrutor:"),0,0,"L");
$pdf->Ln(15);

$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(80,7,"Nome",1,0,"L");
$pdf->Cell(100,7,"Data:",1,0,"L");
$pdf->Cell(100,7,"Data:",1,0,"L");
$pdf->Ln();

while($resultado = mysqli_fetch_assoc($query_todos)){
    $pdf->SetFont("Arial", "I", 10);
    $pdf->Cell(80,7,utf8_decode($resultado["nome"]),1,0,"L");
    $pdf->Cell(100,7,"",1,0,"L");
    $pdf->Cell(100,7,"",1,0,"L");
    $pdf->Ln();
}

$pdf->Output();
?>