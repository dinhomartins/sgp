<?php
    // Inicia sessões 
        session_start(); 
    if(!isset($_SESSION['usuario'])){
        
        header('Location: index.php?erro=1');
    }
    require_once('db.class.php');
 
    $objDb = new db();
    // cria uma variavel que irá acessar os metodos de conexão
    $link = $objDb->conecta_mysql();

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT usuario, senha FROM usuarios WHERE usuario ='$usuario' AND senha = '$senha' ";
    
    $resultado = mysqli_query($link, $sql);

    
    
    $dados = mysqli_fetch_array($resultado);
    if($dados['usuario'] == $usuario && $dados['senha'] == $senha){
        echo 'logado com sucesso';
        $_SESSION["id"] = $dados["id"];
        $_SESSION["usuario"]= $dados["usuario"];
        $_SESSION["senha"]= $dados["senha"];
 
 
        header("Location: home.php"); 
    }else{
        echo 'Senha incorreta';
    }
    
?>