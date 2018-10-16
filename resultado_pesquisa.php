<?php 
    session_start(); 
    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php?erro=1');
    }
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
                        <a href="index.php"  aria-expanded="false">Inicio</a>    
                    </li>
                    <li class="active">
                        <a href="cadastrar.php">Cadastrar</a>
                    </li>
                    <li>
                        <a href="#">Adicionar Curso</a>
                    </li>
                    <li>
                        <a href="pesquisa_turma.php">Turmas</a>
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
                    <form method="post" action="cad_aluno.php" id="formCadastrarse">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label >Informe o nome completo.</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-grupo">
                                   <label >Informe o nome da rua, bairro e quadra</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Enderço">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label >Informe o nome da cidade.</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="cidade">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-grupo">
                                   <label >CEP</label>
                                    <input type="number" class="form-control" id="cep" name="cep" placeholder="CEP">
                                </div>
                            </div>
                            <div class="col-md-2">
                                    <div class="form-group">
                                     <label >Data Nascimento</label>
                                     <input type="date" name="data_nasc" id="data_nasc" min="2018-01-01"
                                            max="2040-12-31" class="form-control">
                                    </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                     <label >Data Inicio do curso</label>
                                     <input type="date" name="data_inicio_curso" id="data_inicio_curso" min="2018-01-01"
                                            max="2040-12-31" class="form-control">
                                    </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                     <label >Data Fim do curso</label>
                                     <input type="date" name="data_fim_curso" id="data_fim_curso" min="2018-01-01"
                                            max="2040-12-31" class="form-control">
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telefone.</label>
                                    <input type="number" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                                </div>
                            </div>
                        </div>
                        <!-- Responsavel Legal -->
                        <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome do responsavel</label>
                                        <input type="text" id="nome_responsavel" name="nome_responsavel" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Telefone.</label>
                                        <input type="number" class="form-control" id="tel_responsavel" name="tel_responsavel" placeholder="Telefone">
                                    </div>
                                </div>
                        </div>
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
                                    <label>Turma</label>
                                    <select class="form-control" id="turma" name="turma">
                                        <option> 08:00 - 09:00</option>
                                    </select>
                                </div>
                            </div>
                                <div class="col-md-4">
                                   <label>Clique no botão para efetuar o cadastro.</label>
                                    <button class="btn btn-primary btn-block" type="submit" id="btn_cadastrar">Cadastrar</button>
                                </div>    
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
