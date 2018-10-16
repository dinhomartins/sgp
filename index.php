
<?php
session_start();
    require_once('db.class.php');
    
    $objDb = new db();
    // cria uma variavel que irá acessar os metodos de conexão
    $link = $objDb->conecta_mysql();
    //Seleciona todos os registro da tabela cad_aluno ou o que for armazenado pela variavel pesquisada   
?>
<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

           <!-- Our Custom CSS -->
        <link rel="stylesheet" href="estilo.css">
        <link rel="stylesheet" href="style_login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="js/jquery.js"></script>
        <script src="js/Chart.bundle.js"></script>
    <title>Bem vindo ao SGP</title>
  </head>
<body>
 
    <div class="welcome">
        <div class="box">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="txt-h2">S G P</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-group" method="post" action="logar.php">
                            <input class="form-control input" type="text" id="usuario" name="usuario" >
                            <input class="form-control input"  type="password" id="senha" name="senha" >
                            <button type="submit" class="btn btn-danger btn-logar">Logar</button>
                        </form>
                    </div>
                </div>
            </div>   
        </div>
    </div>
    
   
    <script src="js/wow.min.js"></script>
        <script>
        new WOW().init();
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>