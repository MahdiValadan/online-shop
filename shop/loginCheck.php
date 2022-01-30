<?php 
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ./authorization/login.php");
}
session_abort();
?>