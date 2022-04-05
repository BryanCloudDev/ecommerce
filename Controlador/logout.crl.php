<?php 
session_start();

if(!isset($_SESSION["user"])){
    header('Location: login.php');
}

session_destroy();

$_SESSION = array();

header('Location: login.php');

exit;