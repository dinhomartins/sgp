<?php

    require_once('db.class.php');
 
    $objDb = new db();
    // cria uma variavel que irá acessar os metodos de conexão
    $link = $objDb->conecta_mysql();

    
    $filtro_curso = $_POST['curso'];
    $filtro_horario = $_POST['horario'];
    //Seleciona todos os registro da tabela cad_aluno ou o que for armazenado pela variavel pesquisada
    $resultado_todos = " SELECT * FROM cad_aluno WHERE curso LIKE '$filtro_curso' AND turma LIKE '$filtro_horario' ";
    //$resultado_todos =    " SELECT * FROM cad_aluno WHERE nome LIKE '%$pesquisar%' ";
    // Busca todos os registros ou o que for digitado no campo pesquisar
    $query_todos = mysqli_query($link, $resultado_todos);
    $result = $query_todos;
    
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
                        <a href="index.php"  aria-expanded="false">Inicio</a>    
                    </li>
                    <li >
                        <a href="cadastrar.php">Cadastrar</a>
                    </li>
                    <li >
                        <a href="pesquisar.php">Pesquisar</a>
                    </li>
                    <li>
                        <a href="turma.php">Turmas</a>
                    </li>
                    <li class="active">
                        <a href="pesquisa_turma.php">Pesquisar Turmas</a>
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
                    <form method="post" action="" id="formCadastrarse">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Curso.</label>
                                    <select class="form-control" id="curso" name="curso">
                                        <option>Informix</option>
                                        <option>Desenvedor Websites</option>
                                        <option>Atendente de farmacia</option>
                                        <option>Secretariado Executivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Horário</label>
                                    <select class="form-control" id="horario" name="horario">
                                        <option value="08:00 - 09:00"> 08:00 - 09:00</option>
                                        <option value="09:00 - 10:00"> 09:00 - 10:00</option>
                                        <option value="10:00 - 11:00"> 10:00 - 11:00</option>
                                        <option value="14:00 - 15:00"> 14:00 - 15:00</option>
                                    </select>
                                </div>
                            </div>
                            
                                <div class="col-md-4">
                                   <label>Clique no botão para efetuar a pesquisa.</label>
                                    <button class="btn btn-primary btn-block" type="submit" id="btn_pesquisar" name="btn-pesquisar">Pesquisar</button>
                                </div>    
                        </div> 
                        
                    </form>
                    <div class="row">
                           
                            

                            <div class="container">
                                         
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th style="width:30%;" >Nome</th>
                                    <th></th>
                                    
                                    <th>Ação</th>
                                    
                                  </tr>
                                </thead>
                                
                                <tbody>
                                  <tr>
                                    <td>contem 20 alunos</td>
                                    <td></td>
                                    <td><button class="btn btn-primary">Vizualizar</button></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                            
                        
                        </div>
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
