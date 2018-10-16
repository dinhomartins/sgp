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
    // se o botão for clicado ele envia o formulario com os dados
    //as variaveis armazenará os dados enviado pelo formulário
//    $nome = mysqli_escape_string($link, $_POST['nome']);
//    $turma = mysqli_escape_string($link, $_POST['turma']);
//    $id = mysqli_escape_string($link, $_POST['id']);
    
    //Query de atualização do banco de dados 
    //      atualiza tabela  seta campo  variavel onde campo for igual a variavel
    $sql = "UPDATE cad_aluno SET nome = '$nome', status = '$status' WHERE id = '$id' ";
        if(mysqli_query($link, $sql)):
            echo   'Atualizado com sucesso';
            echo '<meta http-equiv="refresh" content="1;URL=pesquisar.php" />';
        else:
            echo ' erro ';
        endif;
        endif;
?>