<?php
session_start();

require_once('./Modelo/usuarios.class.php');
require_once('./Controlador/functions.php');

$errors = [];

if(isset($_POST['submit'])){

    $name = clean_data($_POST['name']);
    $lastName = clean_data($_POST['lastName']);
    $email = clean_data($_POST['email']);
    $password = clean_data($_POST['password']);
    $username = clean_data($_POST['username']);
    $profilePhoto = $_FILES['profilePhoto'];

    if(strlen($name) >= 4 && strlen($name) <= 20){
        $regExp = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/';
        if(!preg_match($regExp,$name)){
            $errors['name'] = 'Please enter a valid name';
        }
    }
    else{
        $errors['name'] = 'Enter a name between 4 and 20 characters long';
    }

    if(strlen($lastName) >= 4 && strlen($lastName) <= 20){
        $regExp = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/';
        if(!preg_match($regExp,$lastName)){
            $errors['lastName'] = 'Please enter a valid last name';
        }
    }
    else{
        $errors['lastName'] = 'Enter a last name between 4 and 20 characters long';
    }

    

    // if($errors == []){
    //     $user = new Usuario($name,'Portillo','bportillo701@gmail.com','1234','root','none');
    //     $user->createNewUser();
    // }
    // else{
        var_dump($errors);
    // }

}

?>