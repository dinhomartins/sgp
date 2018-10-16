<?php 
    session_start(); 
    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php?erro=1');
    }
    require_once('db.class.php');
    include("mpdf60/mpdf.php");
 
    $objDb = new db();
    // cria uma variavel que irá acessar os metodos de conexão
    $link = $objDb->conecta_mysql();
    
    $id = '32';
    $turma = '0900_1000';
    //Seleciona todos os registro da tabela cad_aluno ou o que for armazenado pela variavel pesquisada
    $resultado_todos =    " SELECT * FROM cad_aluno WHERE turma = '$id' ";
    // Busca todos os registros ou o que for digitado no campo pesquisar
    $query_todos = mysqli_query($link, $resultado_todos);
    
//Iniciar o buff
ob_start();

$html = ob_get_clean();

$html = utf8_decode($html);

$html .= '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff; width:100%;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-mb3i{background-color:#D2E4FC;text-align:right;vertical-align:top}
.tg .tg-lqy6{text-align:right;vertical-align:top}
.tg .tg-6k2t{background-color:#D2E4FC;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class="tg">
  <tr>
    <th class="tg-baqh" colspan="6">Chamada</th>
  </tr>
  <tr>
    '.while($resultado_pesquisa_db = mysqli_fetch_array($query_todos)){.'
    <td class="tg-6k2t">'.$id.'</td>
    <td class="tg-6k2t">'.$resultado['nome'].'</td>
    <td class="tg-6k2t">'.$resultado['nome'].'</td>
    <td class="tg-6k2t">'.$resultado['nome'].'</td>
    <td class="tg-6k2t">'.$resultado['nome'].'</td>
    <td class="tg-6k2t">'.$resultado['nome'].'</td>
    '.}.'
    
  </tr>
  <tr>
    <td class="tg-yw4l">1</td>
    <td class="tg-yw4l">Swimming</td>
    <td class="tg-lqy6">1:30</td>
    <td class="tg-lqy6">2:05</td>
    <td class="tg-lqy6">1:15</td>
    <td class="tg-lqy6">1:41</td>
  </tr>
  <tr>
    <td class="tg-6k2t">2</td>
    <td class="tg-6k2t">Running</td>
    <td class="tg-mb3i">15:30</td>
    <td class="tg-mb3i">14:10</td>
    <td class="tg-mb3i">15:45</td>
    <td class="tg-mb3i">16:00</td>
  </tr>
  <tr>
    <td class="tg-yw4l">3</td>
    <td class="tg-yw4l">Shooting</td>
    <td class="tg-lqy6">70%</td>
    <td class="tg-lqy6">55%</td>
    <td class="tg-lqy6">90%</td>
    <td class="tg-lqy6">88%</td>
  </tr>
</table>';



//criar objeto

$mpdf = new mPDF();

$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = 'UTF-8';

$mpdf->WriteHTML($html);

$mpdf->Output('meu-pdf','I');

exit();
?>