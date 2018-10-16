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
    

$result = " SELECT id_evento, title, color, start, endd FROM eventos ";

$resultado_events = mysqli_query($link, $result);

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
        <link href='css/fullcalendar.min.css' rel='stylesheet' />
        <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="estilo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        
        <script src="js/jquery.js"></script>
        <script src="js/Chart.bundle.js"></script>
        <script src='js/moment.min.js'></script>
        <script src='js/jquery.min.js'></script>
        <script src='js/fullcalendar.min.js'></script>
        <script src='locale/pt-br.js'></script>
      <script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: Date(),
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      eventClick: function(calEvent, jsEvent, view) {

//        alert('Event: ' + calEvent.title);
        $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
      },
          
      events: [
      // listagem de eventos
      // bloco php que irá listar os eventos nas datas 
        <?php 
          while ($row_events = mysqli_fetch_array($resultado_events)) {
              ?>
              // abre o bloco com as {}
              {
              id: '<?php echo $row_events['id_evento']; ?>',
              title: '<?php echo $row_events['title']; ?>',
              start: '<?php echo $row_events['start']; ?>',
              end: '<?php echo $row_events['endd']; ?>',
              color: '<?php echo $row_events['color']; ?>',
              },<?php 
          }
        ?>
      ]
    });

  });

</script>
        
        
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
                     <li>
                        <a href="dashboard.php">Relatorio Geral </a>
                    </li>
                    <li>
                        <a href="quadrahorario.php">Quadro de Horarios </a>
                    </li>
                    <li  class="active">
                        <a href="agenda2.php">Agenda de horários</a>
                    </li>
                    <li  >
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
                
                <div id='calendar'></div>
                </div>
                <hr>
                
                
            </div>
          
        </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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










