
<?php
    // Inicio sessão
    session_start(); 
    // verifica se esta logado
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
    
    // Filtro status
    $status_cursando = 'cursando';

    // filtro segunda e quarta
    $segSegQua = 'Segunda - Quarta';
    $TerQui = 'Terça - Quinta';
    $quarta18 = 'Quarta';
    $sexta = 'Sexta';
    

    $res_seg_08 = "SELECT * FROM cad_aluno WHERE horario = '$sg0809' AND dia = '$segSegQua'  ";
    $res_seg_09 = "SELECT * FROM cad_aluno WHERE horario = '$sg0910' AND dia = '$segSegQua' ";
    $res_ter_qui_09 = "SELECT * FROM cad_aluno WHERE horario = '$tq0910' AND dia = '$TerQui' ";
    $res_ter_qui_14 = "SELECT * FROM cad_aluno WHERE horario = '$tq1415' AND dia = '$TerQui' ";
    $res_ter_qui_15 = "SELECT * FROM cad_aluno WHERE horario = '$tq1516' AND dia = '$TerQui' ";
    $res_ter_qui_17 = "SELECT * FROM cad_aluno WHERE horario = '$tq1718' AND dia = '$TerQui' ";
    $res_quarta_18 = " SElECT * FROM cad_aluno WHERE horario = '$quarta' AND dia = '$quarta18' ";
    $res_sexta_09 = " SELECT * FROM cad_aluno WHERE horario = '$sexta09' AND dia = '$sexta' ";
    $res_sexta_14 = " SELECT * FROM cad_aluno WHERE horario = '$sexta14' AND dia = '$sexta' ";

    //buscar ultimso registros
    $ultimos_registros = "SELECT * FROM cad_aluno order by id  DESC limit 3 ";
    // Busca todos os registros ou o que for digitado no campo pesquisar
    $query_todos = mysqli_query($link, $resultado_todos); 

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
                    <li class="active">
                        <a href="#home.php"  aria-expanded="false">Inicio</a>    
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
                    <li>
                        <a href="dashboard.php">Relatorio Geral </a>
                    </li>
                    <li>
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
                
<!--
                <div class="menu-admin">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="btn-cadastrar">
                        <button type="button" class="btn-gr btn btn-default btn-cadastrar" aria-label="Center Align">
                        
                        <span class="glyphicon glyphicon-plus " aria-hidden="true"></span><br>Adicionar</button>
                    </div>
                        </div>
                        <div class="col-md-3">
                            <div class="btn-cadastra">
                        <button type="button" class="btn-lr btn btn-default btn-cadastrar" aria-label="Center Align">
                        
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span><br>Pesquisar</button>
                    </div>
                        </div>
                        <div class="col-md-3">
                            <div class="btn-cadastrar">
                        <button type="button" class="btn-bl btn btn-default btn-cadastrar" aria-label="Center Align">
                        
                        <span class="glyphicon glyphicon glyphicon-plus glyphicon-align-center" aria-hidden="true"></span></button>
                    </div>
                        </div>
                        <div class="col-md-3">
                            <div class="btn-cadastrar">
                        <button type="button" class="btn-bb btn btn-default btn-cadastrar" aria-label="Center Align">
                        
                        <span class="glyphicon glyphicon glyphicon-plus glyphicon-align-center" aria-hidden="true"></span></button>
                    </div>
                        </div>
                    </div>
                </div>
-->
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h3>INTERATIVO - Relatório geral</h3>
                            Total de alunos
                            <?php $tot = mysqli_num_rows($query_todos); ?>
                            <?php echo $tot ?>
                                <?php if($tot < '100'): ?>
                                        
                                        <button class="btn btn-danger btn-block wow flash" data-wow-delay="2s" data-wow-iteration="5" data-wow-offset="2">Baixa ocupação</button>
                                        
                                <?php   else: ?>
                                        <button class="btn btn-primary btn-block wow flash" data-wow-delay="2s" data-wow-iteration="5" data-wow-offset="2">Estamos chegando lá !</button>
                                <?php endif; ?>   
                        </div>
                        <div class="col-md-6">
                            <!-- contagem de registros -->
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
                            <?= 'Usuario logado no sistema: '. $_SESSION['usuario'] ?>
                            <div class="horario">
                                <?php  ?>
                            </div>
                        </div>                      
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="margin-top:40px;">
                           <div class="grafico">
                               <canvas id="myChart" width="250" height="250"></canvas>
                                <script>
                                var ctx = document.getElementById("myChart").getContext('2d');
                                    
                                /* Captura de veriaveis php para javascript */
                                var data_sg =    <?php echo $totSg_08 ?>;
                                var data_sg_09 = <?php echo $totsg_09 ?>;
                                var data_tq_09 = <?php echo $tottq_09 ?>;
                                var data_tq_14 = <?php echo $tottq_14 ?>;
                                var data_tq_15 = <?php echo $tottq_15 ?>;
                                var data_tq_17 = <?php echo $tottq_17 ?>;
                                var data_quarta_18 = <?php echo $totquarta_18 ?>;
                                var data_sexta_09 = <?php echo $totsexta09 ?>;
                                var data_sexta_14 = <?php echo $totsexta14 ?>;
                               
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ["SG 8/9", "SG 9/10", "TQ 9/10", "TQ 14/15", "TQ 15/16", "TQ 17/18", "QUARTA 18","SEXTA 09","SEXTA 14", "MAX"],
                                        datasets: [{
                                            label: '# Ocupação',
                                            data: [data_sg, data_sg_09, data_tq_09, data_tq_14, data_tq_15, data_tq_17, data_quarta_18, data_sexta_09, data_sexta_14 ,19],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(255, 0, 0, 0.5)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(255, 0, 0, 0.5)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:true
                                                }
                                            }]
                                        }
                                    }
                                });
                                </script>
                        </div>
                        </div>
                        <!-- Ultimos registros -->
                        <div class="col-md-6">
                            <h4>últimos Registros</h4>
                            <table class="table">
                                <thead class="table table-striped table-dark">
                                    <tr>
                                      <th scope="col">Nome</th>
                                      <th scope="col">Curso</th>
                                    </tr>
                                </thead>
                                <?php while($res_ult_cad = mysqli_fetch_array($exebir_ult_reg)): ?>
                                <tbody>
                                    <tr>
                                      <th scope="row"><?php echo $res_ult_cad['nome']; ?></th>
                                      <td><?php echo $res_ult_cad['curso']; ?></td>
                                    </tr>    
                                </tbody>
                              <?php endwhile; ?>
                            </table>
                            
                            <!-- Gráfico pizza total de alunos -->
                            <canvas id="myChart2" width="150" height="100"></canvas>
                                <script>
                                var ctx = document.getElementById("myChart2").getContext('2d');
                                    
                                /* Captura de veriaveis php para javascript */
                                var data_sg =    <?php echo $tot ?>;
                                /* Instancia do gráfico */
                                var myChart = new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: ["Qt. Atual", "META"],
                                        datasets: [{
                                            label: '# Ocupação',
                                            data: [data_sg,247],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)', 
                                                'rgba(255, 0, 0, 0.5)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(255, 0, 0, 0.5)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:true
                                                }
                                            }]
                                        }
                                    }
                                });
                                </script>
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
            <div class="rodape" style="background-color:black; text-align:center; padding-top:10px;">
                
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