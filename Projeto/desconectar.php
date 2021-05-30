<?php 
    session_start();
    //Destroi a sessao do usuario e retorna para index
    unset($_SESSION['id_Usuario']);
    header("location: index.html");
?>