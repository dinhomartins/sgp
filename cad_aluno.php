<?php
    require_once('db.class.php');

    //campos a serem capturados pelo php
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];
    $horario = $_POST['horario'];
    $dia = $_POST['dia'];
    $status = $_POST['status'];


    //varial recebe novo bando de dados
    $objDb = new db();

    //varial que irá receber o class de conexao mysql
    $link = $objDb->conecta_mysql();
    
    // query que irá gravar os dados nos campos do BD
    // Insira na tabela X nos campos(xxx, xxxx,) valores ('$variavel',);
    $sql = "INSERT INTO cad_aluno (nome, curso, horario, dia, status) values ('$nome', '$curso', '$horario', '$dia', '$status') ";
    
    //executar a query
    if(mysqli_query($link, $sql)){
        //echo ' aluno registrado com sucesso';
        echo '<meta http-equiv="refresh" content="2;URL=cadastrar.php" />';
        //header('Location: cadastrado.php');     
    }else{
        echo ' erro '.mysqli_connect_error();
    }
    
?>
