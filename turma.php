
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
    $sx0911 = '09:00 - 11:00';
    $sx1416 = '14:00 - 16:00';
    // filtro segunda e quarta
    $segSegQua = 'Segunda - Quarta';
    $TerQui = 'Terça - Quinta';
    $quarta18 = 'Quarta';
    $sexta = 'Sexta';

    // Filtro pesquisa por status
    $cursando = 'cursando';
    $trancado = 'trancado';
    $cancelado = 'cancelado';
    $espera = 'espera';


    $res_seg_08 = "SELECT * FROM cad_aluno WHERE horario = '$sg0809' AND dia = '$segSegQua' AND status = 'cursando' ";
    $res_seg_09 = "SELECT * FROM cad_aluno WHERE horario = '$sg0910' AND dia = '$segSegQua' AND status = 'cursando' ";
    $res_ter_qui_09 = "SELECT * FROM cad_aluno WHERE horario = '$tq0910' AND dia = '$TerQui' AND status = 'cursando' ";
    $res_ter_qui_14 = "SELECT * FROM cad_aluno WHERE horario = '$tq1415' AND dia = '$TerQui' AND status = 'cursando' ";
    $res_ter_qui_15 = "SELECT * FROM cad_aluno WHERE horario = '$tq1516' AND dia = '$TerQui' AND status = 'cursando' ";
    $res_ter_qui_17 = "SELECT * FROM cad_aluno WHERE horario = '$tq1718' AND dia = '$TerQui' AND status = 'cursando' ";
    $res_quarta_18 = "SELECT * FROM cad_aluno WHERE horario = '$quarta' AND dia = '$quarta18' AND status = 'cursando' ";
    $res_sexta_09 =  "SELECT * FROM cad_aluno WHERE horario = '$sx0911' AND dia = '$sexta'    AND status = 'cursando' ";
    $res_sexta_14 =  "SELECT * FROM cad_aluno WHERE horario = '$sx1416' AND dia = '$sexta' AND status = 'cursando' ";

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
    $query_res_sexta_09 = mysqli_query($link, $res_sexta_09);
    $query_res_sexta_14 = mysqli_query($link, $res_sexta_14);

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
                    <li >
                        <a href="cadastrar.php">Cadastrar</a>
                    </li>
                    <li>
                        <a href="pesquisar.php">Pesquisar</a>
                    </li>
                    <li class="active">
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

<!--
                <ul class="list-unstyled CTAs">
                    <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Documentação</a></li>
                </ul>
-->
            </nav>
            <!-- Page Content Holder -->
            <div id="content">
                <nav class="navbar navbar-default navbar-custom">
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
                            </ul>
                        </div>
                    </div>
                </nav>

                <h2></h2>


                <div class="line"></div>
                <div class="container">
                <div class="menu-admin">
                </div>
                </div>
                <div class="line"></div>
                    <div class="content-line">
                    </div>
                <div class="line"></div>
                <!--Inicio do container do corpo-->
                <div class="container">



                    <!--Inicio do painel-->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 >Cadastro</h2>
                            <p style="color:#fff";>Por favor preencha todos os campos.</p>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <table class="table">
                                     <form method="post" action="switch_turma.php">
                                        <thead class="thead-dark">
                                        <tr >
                                          <th scope="col" style="background-color:#4286f4; color:#fff">Curso</th>
                                          <th scope="col" style="background-color:#4286f4; color:#fff">Dias</th>
                                          <th scope="col" style="background-color:#4286f4; color:#fff">Horário</th>
                                          <th scope="col" style="background-color:#4286f4; color:#fff">Qt. Alunos</th>
                                          <th scope="col" style="background-color:#4286f4; color:#fff">Ações</th>
                                          <th scope="col" style="background-color:#4286f4; color:#fff">Lista de presença</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                          <th scope="row">Interativo</th>
                                          <td><p>Segunda - Quarta</p></td>
                                          <td><p>08:00 às 09:00</p></td>
                                          <td><?php $totSg_08 = mysqli_num_rows($query_res_seg_08); ?>
                                              <?php echo $totSg_08 ?></td>
                                          <td>
                                        <input type="hidden" id="tipo" name="tipo" class="form-control" value="1" >
                                            <a href="turma_08.php" class="btn btn-primary">Visualizar</a>
                                            </td>
                                            <td><a href="turma_08pdf2.php" target="_blank" class="btn btn-warning">Lista de presença</a> </td>
                                        </tr>

                                        <tr>
                                          <th scope="row">Interativo</th>
                                          <td><p>Segunda - Quarta</p></td>
                                          <td><p>09:00 às 10:00</p></td>
                                          <td><?php $totsg_09 = mysqli_num_rows($query_res_seg_09); ?>
                                              <?php echo $totsg_09 ?></td>
                                          <td>
                                           <input type="hidden" id="tipo" name="tipo" class="form-control" value="2" >
                                          <a href="turma_09.php" class="btn btn-primary">Visualizar</a></td>
                                          <td>
                                          <a href="turma_09pdf.php" target="_blank" class="btn btn-warning">Lista de presença</a></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Interativo</th>
                                          <td><p>Terça - Quinta</p></td>
                                          <td><p>09:00 às 10:00</p></td>
                                          <td><?php $tottq_09 = mysqli_num_rows($query_res_ter_qui_09); ?>
                                              <?php echo $tottq_09 ?></td>
                                          <td><a href="turma_09.php" class="btn btn-primary">Visualizar</a>
                                          </td>
                                          <td><a href="turma_09pdf.php" target="_blank" class="btn btn-warning">Lista de presença</a></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Interativo</th>
                                          <td><p>Terça - Quinta</p></td>
                                          <td><p>14:00 às 15:00</p></td>
                                          <td><?php $tottq_14 = mysqli_num_rows($query_res_ter_qui_14); ?>
                                              <?php echo $tottq_14 ?></td>
                                          <td><a href="turma_14.php" class="btn btn-primary">Visualizar</a>
                                          </td>
                                          <td><a href="turma_14_pdf.php" target="_blank" class="btn btn-warning">Lista de presença</a></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Interativo</th>
                                          <td><p>Terça - Quinta</p></td>
                                          <td><p>15:00 às 16:00</p></td>
                                          <td><?php $tottq_14 = mysqli_num_rows($query_res_ter_qui_14); ?>
                                              <?php echo $tottq_14 ?></td>
                                          <td><a href="turma_15.php" class="btn btn-primary">Visualizar</a>
                                          </td>
                                          <td><a href="turma_15_pdf.php" target="_blank" class="btn btn-warning">Lista de presença</a></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Interativo</th>
                                          <td><p>Terça - Quinta</p></td>
                                          <td><p>17:00 às 18:00</p></td>
                                          <td><?php $tottq_17 = mysqli_num_rows($query_res_ter_qui_17); ?>
                                              <?php echo $tottq_17 ?></td>
                                          <td><a href="turma_17.php" class="btn btn-primary">Visualizar</a>
                                          </td>
                                          <td><a href="turma_17_pdf.php" target="_blank" class="btn btn-warning">Lista de presença</a></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Interativo</th>
                                          <td><p>Quarta</p></td>
                                          <td><p>18:00</p></td>
                                          <td><?php $totquarta_18 = mysqli_num_rows($query_res_quarta_18); ?>
                                              <?php echo $totquarta_18 ?></td>
                                          <td><a href="turma_q_18.php" class="btn btn-primary">Visualizar</a>
                                          </td>
                                          <td><a href="turma_q_18_pdf.php" target="_blank" class="btn btn-warning">Lista de presença</a></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Interativo</th>
                                          <td><p>Sexta</p></td>
                                          <td><p>09:00 - 11::00</p></td>
                                          <td><?php $sext09 = mysqli_num_rows($query_res_sexta_09); ?>
                                              <?php echo $sext09 ?></td>
                                          <td><a href="turma_sexta_9.php" class="btn btn-primary">Visualizar</a>
                                          </td>
                                          <td><a href="turma_sexta_9_pdf.php" target="_blank" class="btn btn-warning">Lista de presença</a></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Interativo</th>
                                          <td><p>Sexta</p></td>
                                          <td><p>14:00 - 18:00</p></td>
                                          <td><?php $sx14 = mysqli_num_rows($query_res_sexta_14); ?>
                                              <?php echo $sx14 ?></td>
                                          <td><a href="turma_sexta_14.php" class="btn btn-primary">Visualizar</a>
                                          </td>
                                          <td><a href="turma_sexta_14_pdf.php" target="_blank" class="btn btn-warning">Lista de presença</a></td>
                                        </tr>
                                        </tbody>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- Fim container -->
            </div>
        </div>

        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
         </script>

    </body>
</html>
