<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: ./adminLogin.php");
    }
    session_abort();
?>