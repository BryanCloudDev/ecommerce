<?php
session_start();

if(isset($_POST['submit'])){
    [
        'email' => $email,
        'password' => $password
    ] = $_POST;
}

?>