<?php
require('./db/config.php');

class Usuario{
    private $name;
    private $lastName;
    private $email;
    private $password;
    private $username;
    private $profilePhoto;

    function __construct($name,$lastName,$email,$password,$username,$profilePhoto){
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email; 
        $this->password = $password; 
        $this->username = $username;
        $this->profilePhoto = $profilePhoto;
    }

    public function createNewUser(){
        $stmt = Conn::Con()->prepare(
            "INSERT INTO users(name,lastName,email,password,username,profilePhoto) VALUES (:name,:lastName,:email,:password,:username,:profilePhoto)"
        );
        $stmt->execute([
            ':name' => $this->name,
            ':lastName' => $this->lastName,
            ':email' => $this->email,
            ':password' => $this->password,
            ':username' => $this->username,
            ':profilePhoto' => $this->profilePhoto
        ]);
        $stmt->closeCursor();
        $stmt = null;
    }
}
?>