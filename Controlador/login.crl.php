<?php
session_start();

require_once('./Modelo/usuarios.class.php');
require_once('./Controlador/functions.php');

$errors = [];

if(isset($_POST['submit'])){
    $userEmail = clean_data($_POST['userEmail']);
    $password = clean_data($_POST['password']);

    if(Usuario::verifyUserEmail($userEmail) == 1){
        $hash = Usuario::verifyUserPassword($userEmail);

        if(password_verify($password,$hash)){
            $user = Usuario::getUserbyId($userEmail);

            $_SESSION['user'] =  $user['id'];

            header('Location: index.php');
        }
        else{
            $errors['errors'] = 'Incorrect username or password';
        }
    }
    else{
        $errors['errors'] = 'Incorrect username or password';
    }
}