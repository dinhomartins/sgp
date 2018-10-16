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
                <div class="panel panel-danger">
                <div class="panel-heading" style="background-color:#e8863c">
                    <h2 style="color:#fff" >Cadastro</h2>
                    <p style="color:#fff";>Por favor preencha todos os campos.</p>
                </div>
                <!-- Inicio do corpo do painel -->
                <div class="panel-body">
                    <form method="post" action="cad_aluno.php" id="formCadastrarse">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label >Informe o nome completo.</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo">
                                </div>
                            </div>

<!--
                            <div class="col-md-4">
                                <div class="form-grupo">
                                   <label >Informe o nome da rua, bairro e quadra</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Enderço">
                                </div>
                            </div>
-->
<!--
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label >Informe o nome da cidade.</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="cidade">
                                </div>
                            </div>
-->
<!--
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
-->
<!--
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telefone.</label>
                                    <input type="number" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                                </div>
                            </div>
-->
<!--
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
-->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Curso.</label>
                                    <select class="form-control" id="curso" name="curso">
                                        <option value=""></option>
                                        <option>Informix</option>
                                        <option>Desenvedor Websites</option>
                                        <option>Atendente de farmacia</option>
                                        <option>Secretariado Executivo</option>
                                        <option>Operador de caixa individual</option>
                                        <option>Atendente de Farmacia</option>
                                        <option>Cabelereiro Profissional</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Modalidade.</label>
                                    <select class="form-control" id="modalidade" name="modalidade">
                                        <option value=""></option>
                                        <option>INTERATIVO</option>
                                        <option>PRESENCIAL</option>
                                        <option>VIP</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                     <label >Data Inicio do curso</label>
                                     <input type="date" name="data_inicio_curso" id="data_inicio_curso" min="2018-01-01"
                                            max="2040-12-31" class="form-control">
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                     <label >Data Fim do curso</label>
                                     <input type="date" name="data_fim_curso" id="data_fim_curso" min="2018-01-01"
                                            max="2040-12-31" class="form-control">
                                    </div>
                            </div>

<!-- Fechamento Linha -->   </div>
<!-- Abertura   Linha -->   <div class="row">
                               <div class="col-md-3">
                                   <div class="form-group">
                                    <label>Dia da turma</label>
                                    <select class="form-control" id="dia" name="dia">
                                        <option value=""></option>
                                        <option value="Segunda - Quarta"> Segunda - Quarta</option>
                                        <option value="Terça - Quinta"> Terça - Quinta</option>
                                        <option value="Quarta"> Quarta </option>
                                        <option value="Sexta"> Sexta </option>
                                        <option value="Sábado"> Sábado </option>
                                    </select>
                                </div>
                               </div>
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label>Horário</label>
                                    <select class="form-control" id="horario" name="horario">
                                        <option value=""></option>
                                        <option value="08:00 - 09:00"> 08:00 - 09:00</option>
                                        <option value="08:00 - 10:00"> 08:00 - 10:00</option>
                                        <option value="09:00 - 10:00"> 09:00 - 10:00</option>
                                        <option value="09:00 - 11:00"> 09:00 - 11:00</option>
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Status Pedagógico</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value=""></option>
                                            <option value="espera">Espera</option>
                                            <option value="cursando">Cursando</option>
                                            <option value="trancado">Trancado</option>
                                            <option value="cancelado">Cancelado</option>
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

        <script type="text/javascript">
            $(document).ready(function(){
                $('#btn_cadastrar').click(function(){
                        alert('clicou');
                       var campo_vazio = false;
                    //     nome do campo
                    if($('#nome').val() == ''){
                        // se o campo nome estiver vazio mude a cor para
                        // muda a bordar do campo para vermelhor caso estaja vezio
                        $('#nome').css({'border-color':'#A94442'});
                        campo_vazio = true;
                    } else {
                        $('#nome').css({'border-color':'##CCC'});
                    }
                    if($('#nome').val() == ''){
                        alert("Por favor preencha o campo Nome.");
                        campo_vazio = true;
                    }


                    if($('#curso').val() == ''){
                        alert("Por favor preencha o campo Curso.");
                        campo_vazio = true;
                    }
                    if($('#curso').val() == ''){
                        $('#curso').css({'border-color':'#A94442'});
                        campo_vazio = true;
                    } else {
                        $('#curso').css({'border-color':'##CCC'});
                    }

                    if($('#horario').val() == ''){
                        alert("Por favor preencha o campo horario.");
                        campo_vazio = true;
                    }
                    if($('#horario').val() == ''){
                        $('#horario').css({'border-color':'#A94442'});
                        campo_vazio = true;
                    } else {
                        $('#horario').css({'border-color':'##CCC'});
                    }

                    if($('#dia').val() == ''){
                        alert("Por favor preencha o campo Dia ta turma.");
                        campo_vazio = true;
                    }
                    if($('#dia').val() == ''){
                        $('#dia').css({'border-color':'#A94442'});
                        campo_vazio = true;
                    } else {
                        $('#dia').css({'border-color':'##CCC'});
                    }
                    if(campo_vazio) return false;
                });
            })
        </script>
    </body>
</html>
