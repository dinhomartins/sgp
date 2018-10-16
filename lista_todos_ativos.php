
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
    $sql = "SELECT * FROM cad_aluno WHERE status = 'cursando' ";

    $query = mysqli_query($link, $sql);

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

<!--
                <ul class="list-unstyled CTAs">
                    <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Documentação</a></li>
                </ul>
-->
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
                <div class="container">
                    
              
                    <div class="row">
                        <div class="col-md-8">
                            

                                <table class="table table-striped">
                                    <?php while($dados = mysqli_fetch_array($query)): ?>
                                <thead>
                                    <tr>
                                        <th style="width:50%;" ></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <!-- <td><?php echo $result['nome'];?></td> -->
                                        <td><?php echo $dados['nome']; ?></td>
                                        <td></td>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endwhile ?>
                                </table>


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