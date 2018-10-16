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

    //if(isset($_POST['btn_imprimir'])):
    
    // se o botão for clicado ele envia o formulario com os dados
    //as variaveis armazenará os dados enviado pelo formulário
    $dia = $_GET['dia'];
    $horario = $_GET['horario'];
    $status = 'cursando';
    

    $resultado_todos = " SELECT * FROM cad_aluno WHERE horario LIKE '$horario' AND dia LIKE '$dia' AND status ='cursando' ";
    //Seleciona todos os registro da tabela cad_aluno ou o que for armazenado pela variavel pesquisada
    //$resultado_todos = " SELECT * FROM cad_aluno WHERE curso LIKE '$filtro_curso'  ";
    //$resultado_todos =    " SELECT * FROM cad_aluno WHERE nome LIKE '%$pesquisar%' ";
    // Busca todos os registros ou o que for digitado no campo pesquisar
    $query_todos = mysqli_query($link, $resultado_todos);




$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,'Hello World!');
$pdf->Cell(280,10,utf8_decode("Lista de presença"),0,0,"L");
$pdf->Ln(15);

$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(80,7,"Nome",1,0,"L");
$pdf->Cell(100,7,"Data:",1,0,"L");
$pdf->Cell(100,7,"Data:",1,0,"L");
//Cria nova linha
$pdf->Ln();

while($resultado = mysqli_fetch_assoc($query_todos)){
    //Define fonte tipo de fonte e tamanho da fonte
    $pdf->SetFont("Arial", "I", 10);
    // Define o tamanho da celular bordas e alinhamento 
    $pdf->Cell(80,7,utf8_decode($resultado["nome"]),1,0,"L");
    $pdf->Cell(100,7,"",1,0,"L");
    $pdf->Cell(100,7,"",1,0,"L");
    //Cria nova linha
    $pdf->Ln();
}
$pdf->Output();
//endif;
?>