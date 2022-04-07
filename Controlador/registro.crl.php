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

    //verificar nombre
    if(strlen($name) >= 4 && strlen($name) <= 20){
        $regExp = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/';
        if(!preg_match($regExp,$name)){
            $errors['name'] = 'Please enter a valid name';
        }
    }
    else{
        $errors['name'] = 'Enter a name between 4 and 20 characters long';
    }

    //verificar apellido
    if(strlen($lastName) >= 4 && strlen($lastName) <= 20){
        $regExp = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/';
        if(!preg_match($regExp,$lastName)){
            $errors['lastName'] = 'Please enter a valid last name';
        }
    }
    else{
        $errors['lastName'] = 'Enter a last name between 4 and 20 characters long';
    }

    //verificar correo
    if(strlen($email) >= 10 && strlen($email) <= 50){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Please enter a valid email address';
        }
        if(Usuario::existsEmail($email) > 0){
            $errors['email'] = 'This email is already in use. <a href="login.php">Log in?<a>';
        }
    }
    else{
        $errors['email'] = 'Please enter a valid email address';
    }

    //verficar contraseña
    if(strlen($password) >= 8 && strlen($password) <= 30){
        $regExp = '/^[a-zA-Z0-9-_%*?!@#$]+$/';
        if(!preg_match($regExp,$password)){
            $errors['password'] = 'Special characters allowed: -_%*?!@#$';
        }
    }
    else{
        $errors['password'] = 'Use a password between 8 and 30 characters long';
    }

    //verificar usuario
    if(strlen($username) >= 4 && strlen($username) <= 10){
        $regExp = '/^[a-zA-Z0-9_]+$/';
        if(!preg_match($regExp,$password)){
            $errors['username'] = 'Username can only contain numbers and underslash "_"';
        }
        if(Usuario::existsUser($username) > 0){
            $errors['username'] = 'Username has been already taken';
        }
    }
    else{
        $errors['username'] = 'Username can be between 4 and 10 characters long';
    }

    //verificando el tipo de archivo
    if(isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['error'] === UPLOAD_ERR_OK){
        $fileTmpPath = $_FILES['profilePhoto']['tmp_name'];
        $fileName = $_FILES['profilePhoto']['name'];
        $fileSize = $_FILES['profilePhoto']['size'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5($fileName) . '.' . $fileExtension;
        $uploadFileDir = './Media/profilePhoto/';

        if(!typeOfPhoto($fileExtension)){
            $errors['profilePhoto'] = 'You can only upload .jpg, .gif and .png images';
        }
        elseif($fileSize > 2097152){
            $errors['profilePhoto'] = 'Max allowed size for photo is 2MB';
        }
        else{
            if($errors == []){
                $dest_path = $uploadFileDir . $newFileName;
                move_uploaded_file($fileTmpPath, $dest_path);
            }
        }
    }
    else{
        $dest_path = './Media/profilePhoto/default.jpg';
    }
    if($errors == []){
        $key = '5e83b87c6ff6b1cc4d941bf315281da1';
        $token = md5($email.$password.$key);
        $password = Usuario::encPass($password);
        // if(password_verify($password,$hash)){
        // }
        $user = new Usuario($token,$name,$lastName,$email,$password,$username,$dest_path);
        $user->createNewUser();
    }
}
