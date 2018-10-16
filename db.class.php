<?php
    //Classe de conexão com o banco de dados
	class db{
		// host
		private $host = 'localhost';
		// usuario
		private $usuario = 'root';
		// senha 
		private $senha = '';
		// database
		private $database = 'sgp5';
        
        //Função de conexão com o banco de dados
		public function conecta_mysql(){
            
			// Variavel conexao
			$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database );
            
			// charset de conexao
			mysqli_set_charset($con, "utf8");
            
            // Verificar se contem erros de conexão
			if(mysqli_connect_errno()){
				echo 'Erro ao tentar se conectar'. mysqli_connect_erro();
			}
			// retornar conexao
			return $con;
		}
	}
?>