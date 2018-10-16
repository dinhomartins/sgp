<?php
    session_start(); 
    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php?erro=1');
    }
    require_once('db.class.php');
    //varial recebe novo bando de dados
    $objDb = new db();
    //varial que irá receber o class de conexao mysql
    $link = $objDb->conecta_mysql();
    $id = mysqli_escape_string($link, $_GET['id']);
    $sql = "SELECT * FROM cad_aluno WHERE id = '$id' ";
    $resultado = mysqli_query($link, $sql);
    $dados = mysqli_fetch_array($resultado);
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>S-G-P </title>
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
                    <li class="active">
                        <a href="cadastrar.php">Cadastrar</a>
                    </li>
                    <li>
                        <a href="pesquisar.php">Pesquisar</a>
                    </li>
                    <li>
                        <a href="turma.php">Turmas</a>
                    </li>
                    <li>
                        <a href="quadrahorario.php">Quadro de Horarios </a>
                    </li>
                    <li>
                        <a href="agenda2.php">Agenda de horários</a>
                    </li>
                    <li>
                        <a href="pesquisa_turma.php">Pesquisar Turmas</a>
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
                    <form method="post" action="update.php" id="formCadastrarse">
                       
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label >Nome completo.</label>
                                    <input type="text" class="form-control" readonly="readonly" id="nome" name="nome" value="<?php echo $dados['nome']; ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                   <label >Status Pedagógico</label>
                                    <input type="text" class="form-control" readonly="readonly" id="status" name="status" value="<?php echo $dados['status']; ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                   <label >Curso.</label>
                                    <input type="text" class="form-control" readonly="readonly" id="curso" name="curso" value="<?php echo $dados['curso']; ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                               <label >Dia da semana.</label>
                                <input type="text" class="form-control" readonly="readonly" id="dia" name="dia" value="<?php echo $dados['dia']; ?>">
                            </div>
                            <div class="col-md-2">
                                <div>
                                    <label >horario.</label>
                                    <input type="text" class="form-control" readonly="readonly" id="horario" name="horario" value="<?php echo $dados['horario']; ?>">
                                </div>
                            </div>
                            
                        </div>
                        <!-- Responsavel Legal -->
                        <div class="row">  
                                <div class="col-md-4">
                                   <label>Clique no botão para atualizar os dados.</label>
                                    <a href="update_data.php?id=<?php echo $dados['id'];?>" class="btn btn-primary">Atualizar Dados</a>
                                </div>    
                        </div> 
                        <div class="row">
                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                        </div>
                    </form>
                </div>
            </div>
                </div> <!-- Fim container -->    
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
