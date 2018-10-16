<?php

    session_start(); 
    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php?erro=1');
    }
    require_once('db.class.php');
 
    $objDb = new db();
    // cria uma variavel que irá acessar os metodos de conexão
    $link = $objDb->conecta_mysql();

    
    $f_dia = isset($_POST['dia']) ? $_POST['dia'] : '';
    $f_horario = isset($_POST['horario']) ? $_POST['horario'] : '';
    //Seleciona todos os registro da tabela cad_aluno ou o que for armazenado pela variavel pesquisada
    
    $resultado_todos = " SELECT * FROM cad_aluno WHERE horario = '$f_horario' AND dia = '$f_dia' AND status = 'cursando' ";

    // Busca todos os registros ou o que for digitado no campo pesquisar
    $query_todos = mysqli_query($link, $resultado_todos);

    $presenca = "INSERT INTO presenca "
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
                    <li >
                        <a href="pesquisar.php">Pesquisar</a>
                    </li>
                    <li>
                        <a href="turma.php">Turmas</a>
                    </li>
                    <li class="active">
                        <a href="pesquisa_turma.php">Pesquisar Turmas</a>
                    </li>
                    <li>
                        <a href="dashboard.php">Relatorio Geral </a>
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
                    <h2 >Presença e faltas</h2>
                    <p style="color:#fff";>Por favor preencha todos os campos.</p>
                </div>
                  <div class="panel-body">
                    <form method="post" action="" id="formCadastrarse">
                        <div class="row">
                            <div class="col-md-3">
                                   <div class="form-group">
                                    <label>Dia da turma</label>
                                    <select class="form-control" id="dia" name="dia">
                                        <option value="Segunda - Quarta"> Segunda - Quarta</option>
                                        <option value="Terça - Quinta"> Terça - Quinta</option>
                                        <option value="Quarta"> Quarta </option>
                                        <option value="Sexta"> Sexta </option>
                                        <option value="Sábado"> Sábado </option>
                                    </select>
                                </div>
                               </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Horário</label>
                                    <select class="form-control" id="horario" name="horario">
                                        <option value="08:00 - 09:00"> 08:00 - 09:00</option>
                                        <option value="08:00 - 10:00"> 08:00 - 10:00</option>
                                        <option value="09:00 - 10:00"> 09:00 - 10:00</option>
                                        <option value="09:00 - 10:00"> 09:00 - 11:00</option>
                                        <option value="10:00 - 11:00"> 10:00 - 11:00</option>
                                        <option value="10:00 - 12:00"> 10:00 - 12:00</option>
                                        <option value="12:00 - 14:00"> 12:00 - 14:00</option>
                                        <option value="14:00 - 15:00"> 14:00 - 15:00</option>
                                        <option value="14:00 - 16:00"> 14:00 - 16:00</option>
                                        <option value="15:00 - 16:00"> 15:00 - 16:00</option>
                                        <option value="15:00 - 17:00"> 15:00 - 17:00</option>
                                        <option value="17:00 - 18:00"> 17:00 - 18:00</option>
                                        <option value="18:00 - 20:00"> 18:00 - 20:00</option>
                                    </select>
                                </div>
                            </div>
                            
                                <div class="col-md-4">
                                   <label>Clique no botão para efetuar a pesquisa.</label>
                                    <button class="btn btn-primary btn-block" type="submit" id="btn_pesquisar" name="btn_pesquisar">Pesquisar</button>
                                    <label>Clique no botão para visualizar lista de presença.</label>
                                    <a href="p_t_14_pdf.php?dia=<?php echo $f_dia ?>&horario=<?php echo $f_horario ?>" target="_blank" class="btn btn-primary btn-block" type="submit" id="btn_imprimir" name="btn_imprimir">Lista de resença</a>
                                </div>    
                        </div> 
                        
                    </form>
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-2">
                            
                        </div>
                        <div class="col-md4">
                                    
                        </div>
                    </div>
                    <div class="row" style="color:red">
                        
                            <div class="col-md-8">
                                <?php 
                                    // contar numero de registro com esse filtro
                                    $tot = mysqli_num_rows($query_todos);
                                    $total_vagas = '19';
                                    $total = $total_vagas - $tot;
                                    
                                        echo ' <b> <style="color:green"></style> Ocupação: </b>' .$tot.'<br>'. '<b> Total de vagas: </b> '.$total     
                                ?>
                            </div>
                    </div>
                    <div class="row">
                           <form method="POST" action="presenca_func.php">
                            <?php while($result = mysqli_fetch_array($query_todos)): ?> 
                            
                                    <div class="container">           
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:30%;" >Nome</th>
                                        <th></th>
                                        <th>Presença</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <!-- <td><?php echo $result['nome'];?></td> -->
                                        <td><input type="text" name="nome" value="<?php echo $result['nome'];?>"></td>
                                        <td> <input type="text" name="id" value="<?php echo $result['id']; ?>">  </td>
                                        <td>
                                            
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="presenca" name="presenca" >
                                            <label class="form-check-label" for="exampleCheck1"></label>
                                          </div>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            
                            
                            
                            
                           
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                            <a href="presenca_func.php?id=<?php echo $result['id'];?>&nome=<?php echo $result['nome']; ?>" class="btn btn-primary">Visualizar</a>
                            <?php endwhile; ?>
                            </form>
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
