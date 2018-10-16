<?php
    session_start(); 
    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php?erro=1');
    }
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
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 3</title>

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
                        <a href="pesquisa_turma.php">Pesquisar Turma</a>
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

                <ul class="list-unstyled CTAs">
                    <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Documentação</a></li>
                </ul>
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
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
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
                   <div class="container">
                    <form method="post" action="" id="formCadastrarse">

                        <div class="row">
                            
                            
                            <div class="container">
                                <div class="row">
                                   <div class="col-md-4">
                                       <a href="turma_17_pdf.php" target="_blank" class="btn btn-warning" style="margin-bottom:20px" >Imprimir lista de presença</a>
                                   </div>
                               </div>
                                <p>Resultado da pesquisa:</p> 
                                <?php while($resultado_pesquisa_db = mysqli_fetch_array($query_todos)): ?> 
                                        
                                <table class="table table-striped">
                                
                                <thead>
                                  <tr>
                                    <th style="width:30%;" >Nome</th>
                                    <th>Curso</th> 
                                    <th>Ação</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><?php echo $resultado_pesquisa_db['nome'];?></td>
                                    <td><?php echo $resultado_pesquisa_db['curso'];?></td>
<!--                                    <td><?php echo $resultado_pesquisa_db['id'];?></td>-->
                                    <td><a href="visualizar.php?id=<?php echo $resultado_pesquisa_db['id'];?>" class="btn btn-primary">Visualizar</a></td>
                                  </tr>
                                </tbody>
                              </table>
                              <?php endwhile; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                </div> <!-- Fim container -->    
            </div>
            </div>
        </div>

<!--Php Registro Aluno-->




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
