<?php 
    session_start();
    unset($_SESSION['id_Usuario']);
    header("location: index.html");
?>