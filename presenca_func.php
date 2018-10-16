<?php

    session_start(); 
    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php?erro=1');
    }
    require_once('db.class.php');
 
    $objDb = new db();
    // cria uma variavel que irá acessar os metodos de conexão
    
    $link = $objDb->conecta_mysql();

   // $id = mysqli_escape_string($link, $_GET['id']);
   // $nome = mysqli_escape_string($link, $_GET['nome']);
    $id = $_GET['id'];
    $nome = $_GET['nome'];
   $presenca = $_GET['presenca'];



 $sql = "INSERT INTO presenca (id, nome, presenca) VALUES ('$id', '$nome', '$presenca') ";

 $execute = mysqli_query($link, $sql);

if($execute){
    echo 'gravado com sucesso';
}else{
    echo 'erro ao gravar';
}

var_dump($nome);





?>