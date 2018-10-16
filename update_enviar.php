<?php
    session_start(); 
    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php?erro=1');
    }
    // Adiciona a classe de conexao
    require_once('db.class.php');

    //varial recebe novo bando de dados
    $objDb = new db();

    //varial que irá receber o class de conexao mysql
    $link = $objDb->conecta_mysql();

    //Teste se o botão foi clicado 
    if(isset($_POST['btn-editar'])):
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $status = $_POST['status'];
    $horario = $_POST['horario'];
    $curso = $_POST['curso'];
    $dia = $_POST['dia'];


    
    //Query de atualização do banco de dados 
    //      atualiza tabela  seta campo  variavel onde campo for igual a variavel
    $sql = "UPDATE cad_aluno SET nome = '$nome', curso = '$curso', horario = '$horario', dia = '$dia', status = '$status' WHERE id = '$id' ";



        if(mysqli_query($link, $sql)):
            echo  "<script>alert('Atualizado com sucesso');</script>";
            echo '<meta http-equiv="refresh" content="1;URL=pesquisar.php" />';
        else:
            echo ' erro ';
        endif;
        endif;
?>