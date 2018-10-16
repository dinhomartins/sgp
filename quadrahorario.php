
<?php
    session_start(); 
    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php?erro=1');
    }
    require_once('db.class.php');
 
    $objDb = new db();
    // cria uma variavel que irá acessar os metodos de conexão
    $link = $objDb->conecta_mysql();
    //Seleciona todos os registro da tabela cad_aluno ou o que for armazenado pela variavel pesquisada
    $resultado_todos = " SELECT * FROM cad_aluno ";
    // filtro horario
    $sg0809 = '08:00 - 09:00';
    $sg0910 = '09:00 - 10:00';
    $tq0910 = '09:00 - 10:00';
    $tq1415 = '14:00 - 15:00';
    $tq1516 = '15:00 - 16:00';
    $quarta = '18:00 - 20:00';
    $tq1718 = '17:00 - 18:00';
    $sexta09 = '09:00 - 11:00';
    $sexta14 = '14:00 - 16:00';
    // filtro segunda e quarta
    $segSegQua = 'Segunda - Quarta';
    $TerQui = 'Terça - Quinta';
    $quarta18 = 'Quarta';
    $sexta = 'Sexta';
    
    // busca por dia 
    $res_seg_08 =     "SELECT * FROM cad_aluno WHERE horario = '$sg0809'  AND dia = '$segSegQua' AND status = 'cursando' ";
    $res_seg_09 =     "SELECT * FROM cad_aluno WHERE horario = '$sg0910'  AND dia = '$segSegQua' AND status = 'cursando' ";
    $res_ter_qui_09 = "SELECT * FROM cad_aluno WHERE horario = '$tq0910'  AND dia = '$TerQui'    AND status = 'cursando' ";
    $res_ter_qui_14 = "SELECT * FROM cad_aluno WHERE horario = '$tq1415'  AND dia = '$TerQui'    AND status = 'cursando' ";
    $res_ter_qui_15 = "SELECT * FROM cad_aluno WHERE horario = '$tq1516'  AND dia = '$TerQui'    AND status = 'cursando' ";
    $res_ter_qui_17 = "SELECT * FROM cad_aluno WHERE horario = '$tq1718'  AND dia = '$TerQui'    AND status = 'cursando' ";
    $res_quarta_18 =  "SELECT * FROM cad_aluno WHERE horario = '$quarta'  AND dia = '$quarta18'  AND status = 'cursando' ";
    $res_sexta_09 =   "SELECT * FROM cad_aluno WHERE horario = '$sexta09' AND dia = '$sexta'     AND status = 'cursando' ";
    $res_sexta_14 =   "SELECT * FROM cad_aluno WHERE horario = '$sexta14' AND dia = '$sexta'     AND status = 'cursando' ";

    //buscar ultimso registros
    $ultimos_registros = "SELECT * FROM cad_aluno order by id  DESC limit 3 ";

    // Status busca
    $alunos_cursando = " SELECT * FROM cad_aluno WHERE status = 'cursando' ";
    $alunos_cancelados = " SELECT * FROM cad_aluno WHERE status = 'cancelado' ";
    $alunos_trancados = " SELECT * FROM cad_aluno WHERE status = 'trancado' ";
    $alunos_concluidos = " SELECT * FROM cad_aluno WHERE status = 'concluido' ";
    // Busca todos os registros ou o que for digitado no campo pesquisar
    $query_todos = mysqli_query($link, $resultado_todos); 
    
    // Busca por status
    $query_cursando = mysqli_query($link, $alunos_cursando);
    $query_cancelado = mysqli_query($link, $alunos_cancelados); 
    $query_trancados = mysqli_query($link, $alunos_trancados);
    $query_concluidos = mysqli_query($link, $alunos_concluidos);


    //Query busca dias da semana e filtra
    $query_res_seg_08 = mysqli_query($link, $res_seg_08);
    $query_res_seg_09 = mysqli_query($link, $res_seg_09);
    $query_res_ter_qui_09 = mysqli_query($link, $res_ter_qui_09);
    $query_res_ter_qui_14 = mysqli_query($link, $res_ter_qui_14);
    $query_res_ter_qui_15 = mysqli_query($link, $res_ter_qui_15);
    $query_res_ter_qui_17 = mysqli_query($link, $res_ter_qui_17);
    $query_res_quarta_18 = mysqli_query($link, $res_quarta_18);
    $query_sexta_09 = mysqli_query($link, $res_sexta_09);
    $query_sexta_14 = mysqli_query($link, $res_sexta_14);

    $exebir_ult_reg = mysqli_query($link, $ultimos_registros);
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>S - G - P</title>
         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="estilo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="js/jquery.js"></script>
        <script src="js/Chart.bundle.js"></script>
        
        
    </head>
    <body>
       
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>SGP</h3>
                </div>
                <ul class="list-unstyled components">
                    <p>SISTEMA</p>
                    <li>
                        <a href="home.php"  aria-expanded="false">Inicio</a>    
                    </li>
                    <li>
                        <a href="cadastrar.php">Cadastrar</a>
                    </li>
                    <li>
                        <a href="pesquisar.php">Pesquisar</a>
                    </li>
                    <li>
                        <a href="turma.php">Turmas</a>
                    </li>
                    <li>
                        <a href="pesquisa_turma.php">Pesquisar Turmas</a>
                    </li>
                     <li >
                        <a href="dashboard.php">Relatorio Geral </a>
                    </li>
                    <li class="active" >
                        <a href="quadrahorario.php">Quadro de Horarios </a>
                    </li>
                    <li>
                        <a href="agenda2.php">Agenda de horários</a>
                    </li>
                    <li>
                        <a href="sair.php">Sair </a>
                    </li>                   
                </ul>
            </nav>
            <!-- Page Content Holder -->         
            <div id="content">
                <nav class="navbar navbar-custom">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Menu</span>
                            </button>
                        </div>    
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Inicio Relatorio Geral</a></li>
                                <li><a href="#">Cadastrar</a></li>
                                <li><a href="#">Pesquisar</a></li>
                                <li><a href="#">Turmas</a></li>
                                <li><a href="#">Pesquisa Turma</a></li>
                                <li><a href="#">Relatorio Geral</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <h2></h2>
                <div class="line"></div>
                <div class="container">
                
                
                </div>
                <hr>
                <div class="row">
                    <div class="container">
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                <h5>Interativo</h5>
                                <h5>Segunda / Quarta 08:00 - 09:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px;" >
                                <?php $totSg_08 = mysqli_num_rows($query_res_seg_08); ?>
                                <?php $vagas = '19' - $totSg_08 ?>
                                                           
                                <?php if( $totSg_08 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">temos vagas  </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totSg_08. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totSg_08 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                                
                            </div>                
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                <h5>Interativo</h5>
                                <h5>Segunda / Quarta 09:00 - 10:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px;" >
                                <?php $totSg_09 = mysqli_num_rows($query_res_seg_09); ?>
                                <?php $vagas = '19' - $totSg_09 ?>
                                                           
                                <?php if( $totSg_09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">temos vagas  </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totSg_09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totSg_09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                <h5>Interativo</h5>
                                <h5>Terça / Quinta 09:00 - 10:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $tottq_09 = mysqli_num_rows($query_res_ter_qui_09); ?>
                                <?php $vagas = '19' - $tottq_09 ?>
                                                           
                                <?php if( $tottq_09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">temos vagas  </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $tottq_09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $tottq_09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                <h5>Interativo</h5>
                                <h5>Terça / Quinta 14:00 - 15:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $tottq_14 = mysqli_num_rows($query_res_ter_qui_14); ?>
                                <?php $vagas = '19' - $tottq_14 ?>
                                                           
                                <?php if( $tottq_14 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $tottq_14. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $tottq_14 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                <h5>Interativo</h5>
                                <h5>Terça / Quinta 15:00 - 16:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $tottq_15 = mysqli_num_rows($query_res_ter_qui_15); ?>
                                <?php $vagas = '19' - $tottq_15 ?>
                                                           
                                <?php if( $tottq_15 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $tottq_15. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $tottq_15 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                <h5>Interativo</h5>
                                <h5>Terça / Quinta 17:00 - 18:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $tottq_17 = mysqli_num_rows($query_res_ter_qui_17); ?>
                                <?php $vagas = '19' - $tottq_17 ?>
                                                           
                                <?php if( $tottq_17 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $tottq_17. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $tottq_17 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                <h5>Interativo</h5>
                                <h5>Quarta - 18:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totquarta_18 = mysqli_num_rows($query_res_quarta_18); ?>
                                <?php $vagas = '19' - $totquarta_18 ?>
                                                           
                                <?php if( $totquarta_18 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totquarta_18. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totquarta_18 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                <h5>Interativo</h5>
                                <h5>Sexta 09:00 - 11:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta09 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta09 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                <h5>Interativo</h5>
                                <h5>Sexta 14:00 - 16:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>


                        <!-- Interativo sábado -->


                        <div class="col-md-3">
                            <div class="panel panel-primary" >
                                <div class="panel-heading" style="background-color: #203960" >
                                <h5>Interativo</h5>
                                <h5>Sábado 08:00 - 10:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary" >
                                <div class="panel-heading" style="background-color: #203960" >
                                <h5>Interativo</h5>
                                <h5>Sábado 10:00 - 12:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary" >
                                <div class="panel-heading" style="background-color: #203960" >
                                <h5>Interativo</h5>
                                <h5>Sábado 13:00 - 15:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary" >
                                <div class="panel-heading" style="background-color: #203960" >
                                <h5>Interativo</h5>
                                <h5>Sábado 15:00 - 17:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                    </div>

                    
                    <!-- Cabbeleiri profissional -->
                    <div class="row">
                        <div class="container">
                        <hr>
                        <h4 class="text-muted" style="text-align: center;" >Cabeleireiro Profissional</h4>
                        <div class="col-md-3">
                            <div class="panel panel-primary" style="border: 1px solid #9b0f53" >
                                <div class="panel-heading" style="background-color: #9b0f53" >
                                <h5>Interativo</h5>
                                <h5>Sábado 08:00 - 12:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-primary" style="border: 1px solid #9b0f53" >
                                <div class="panel-heading" style="background-color: #9b0f53" >
                                <h5>Interativo</h5>
                                <h5>Sábado 13:00 - 17:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>
                 <!-- Massoterapia profissional -->
                 <div class="row">
                        <div class="container">
                        <hr>
                        <h4 class="text-muted" style="text-align: center;" >Massoterapia</h4>
                        <div class="col-md-3">
                            <div class="panel panel-primary" style="border: 1px solid #7e0f9b" >
                                <div class="panel-heading" style="background-color: #7e0f9b" >
                                <h5>Interativo</h5>
                                <h5>Sábado 08:00 - 12:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-primary" style="border: 1px solid #7e0f9b" >
                                <div class="panel-heading" style="background-color: #7e0f9b" >
                                <h5>Interativo</h5>
                                <h5>Sábado 13:00 - 17:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>

                 <!-- Atendente de farmacia-->
                 <div class="row">
                        <div class="container">
                        <hr>
                        <h4 class="text-muted" style="text-align: center;" >Atendente de Farmacia</h4>
                        <div class="col-md-3">
                            <div class="panel panel-primary" style="border: 1px solid #0f9b4b" >
                                <div class="panel-heading" style="background-color: #0f9b4b" >
                                <h5>Interativo</h5>
                                <h5>Sábado 08:00 - 12:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-primary" style="border: 1px solid #0f9b4b" >
                                <div class="panel-heading" style="background-color: #0f9b4b" >
                                <h5>Interativo</h5>
                                <h5>Sábado 13:00 - 17:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>

                <!-- Atendente de farmacia-->
                 <div class="row">
                        <div class="container">
                        <hr>
                        <h4 class="text-muted" style="text-align: center;" >Manicure</h4>
                        <div class="col-md-3">
                            <div class="panel panel-primary" style="border: 1px solid #235934" >
                                <div class="panel-heading" style="background-color: #235934" >
                                <h5>Interativo</h5>
                                <h5>Sábado 08:00 - 12:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-primary" style="border: 1px solid #235934" >
                                <div class="panel-heading" style="background-color: #235934" >
                                <h5>Interativo</h5>
                                <h5>Sábado 13:00 - 17:00</h5>
                                </div>
                                <div class="panel-body" style="height:200px; background-color:" >
                                <?php $totsexta14 = mysqli_num_rows($query_sexta_09); ?>
                                <?php $vagas = '19' - $totsexta14 ?>
                                                           
                                <?php if( $totsexta09 < 19):  ?>
                                    <h1 style="color:blue; font-size:18px;" class="wow flash" data-wow-delay="2s" data-wow-iteration="10" data-wow-offset="2">Vagas disponiveis </h1>
                                <?php endif ?>                                   
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Total de alunos: '. $totsexta09. '<br>' ;?> 
                                    
                                <?php echo  '<p style=" font-size:16px; font-weight: 900";> Vagas disponiveis: '.  $vagas.'<br>' ?> 
                                <?php if( $totsexta09 >= '19' ): ?>
                                    <h1 style=" color:red; font-size:16px; font-weight:700" > Não há vagas nesta turma</h1>
                                <?php endif ?>  
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <?php $tot = mysqli_num_rows($query_todos); ?>
                             
                        </div>
                        <div class="col-md-6">
                            <?php $totSg_08 = mysqli_num_rows($query_res_seg_08); ?>
                            <?php // echo $totSg_08 ?>
                            <!-- contagem de linhas no banco de dados -->
                            <?php $totsg_09 = mysqli_num_rows($query_res_seg_09); ?>
                            <?php // echo $totsg_09 ?>
                            
                            <?php $tottq_09 = mysqli_num_rows($query_res_ter_qui_09); ?>
                            <?php // echo $tottq_09 ?>
                            
                            <?php $tottq_14 = mysqli_num_rows($query_res_ter_qui_14); ?>
                            <?php // echo $tottq_14 ?>
                            
                            <?php $tottq_15 = mysqli_num_rows($query_res_ter_qui_15); ?>
                            <?php // echo $tottq_15 ?>
                            
                            <?php $tottq_17 = mysqli_num_rows($query_res_ter_qui_17); ?>
                            <?php //echo $tottq_17 ?>
                            
                            <?php $totquarta_18 = mysqli_num_rows($query_res_quarta_18); ?>
                            <?php // echo $totquarta_18 ?>
                            
                            <?php $totsexta09 = mysqli_num_rows($query_sexta_09 ); ?>
                            <?php // echo $totsexta09 ?>
                            
                            <?php $totsexta14 = mysqli_num_rows($query_sexta_14); ?>
                            <?php // echo $totsexta14 ?>
                        </div>                      
                    </div>
                   
                        </div>
                        <!-- Ultimos registros -->
                        
                            <!-- Gráfico pizza total de alunos -->
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
        
        <footer>
            <div class="rodape" style=" background-color:black; text-align:center; padding-top:10px;">
                <p>S - G - P</p>
            </div>
        </footer>
        <!-- jQuery CDN -->
        <!-- Bootstrap Js CDN -->
        <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
         
        <script src="js/wow.min.js"></script>
            <script>
            new WOW().init();
        </script> 
    </body>
</html>










