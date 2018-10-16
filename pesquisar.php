<?php
        session_start(); 
    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php?erro=1');
    }
    require_once('db.class.php');
 
    $objDb = new db();
    // cria uma variavel que irá acessar os metodos de conexão
    $link = $objDb->conecta_mysql();
    
    // Verifica se existe a variavel 
    $pesquisar = isset($_POST['pesquisar']) ? $_POST['pesquisar'] : '';

    //Seleciona todos os registro da tabela cad_aluno ou o que for armazenado pela variavel pesquisada
    $resultado_todos =    " SELECT * FROM cad_aluno WHERE nome LIKE '%$pesquisar%' LIMIT 10 ";

    // Busca todos os registros ou o que for digitado no campo pesquisar
    $query_todos = mysqli_query($link, $resultado_todos);
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
                    <li class="active">
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
<!--                <div class="container">-->
                
                <!--Inicio do painel-->
                <div class="container">
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
                                   <label >Informe o nome completo.</label>
                                    <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Nome Completo">
                                </div>
                            </div>
                                <div class="col-md-4">
                                   <label>Clique no botão para efetuar o cadastro.</label>
                                    <button class="btn btn-primary btn-block" type="submit" id="btn_pesquisar" name="btn_pesquisar">Pesquisar</button>
                                </div>    
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                            
                            <?php while($resultado_pesquisa_db = mysqli_fetch_array($query_todos)): ?>
                            
                            <div class="">
                              <p>Resultado da pesquisa:</p>            
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th style="width:30%;" >Nome</th>
                                    <th>Curso</th>
                                    <th>Id</th>
                                    <th>Ação</th>
                                    
                                  </tr>
                                </thead>
                                
                                <tbody>
                                  <tr>
                                    <td><?php echo $resultado_pesquisa_db['nome'];?></td>
                                    <td><?php echo $resultado_pesquisa_db['curso'];?></td>
                                    <td><?php echo $resultado_pesquisa_db['id'];?></td>
                                    <input type="hidden" name="horario" value="<?php echo $resultado_pesquisa_db['horario'];?>">
                                    <input type="hidden" name="dia" value="<?php echo $resultado_pesquisa_db['dia'];?>">
                                    <input type="hidden" name="status" value="<?php echo $resultado_pesquisa_db['status'];?>">
                                    
                                    <td><a href="visualizar.php?id=<?php echo $resultado_pesquisa_db['id'];?>" class="btn btn-primary">Visualizar</a> </td>
                                    
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        </div>
                        
                    </form>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
<!--            </div>      -->
            
        

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
