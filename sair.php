<?php

    session_start();

unset($_SESSION['usuario']);
unset($_SESSION['id']);
echo  "<script>alert('Deslogado com sucesso !');</script>";
echo '<meta http-equiv="refresh" content="1;URL=index.php" />';
?>