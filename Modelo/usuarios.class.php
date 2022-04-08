<?php
require('./db/config.php');

class Usuario{
    private $token;
    private $name;
    private $lastName;
    private $email;
    private $password;
    private $username;
    private $profilePhoto;

    function __construct($token,$name,$lastName,$email,$password,$username,$profilePhoto){
        $this->token = $token;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email; 
        $this->password = $password; 
        $this->username = $username;
        $this->profilePhoto = $profilePhoto;
    }

    public function createNewUser(){
        $stmt = Conn::Con()->prepare(
            "INSERT INTO users(token,name,lastName,email,password,username,profilePhoto) VALUES (:token,:name,:lastName,:email,:password,:username,:profilePhoto)"
        );
        $stmt->execute([
            ':token' => $this->token,
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

    static public function existsUser($username){
        $stmt = Conn::Con()->prepare(
            "SELECT COUNT(username) from users WHERE username = :username"
        );
        $stmt->execute([
            ':username' =>$username
        ]);
        $result = $stmt->fetch(PDO::FETCH_COLUMN, 0);
        $stmt->closeCursor();
        $stmt = null;
        return $result;
    }

    static public function existsEmail($email){
        $stmt = Conn::Con()->prepare(
            "SELECT COUNT(email) from users WHERE email = :email"
        );
        $stmt->execute([
            ':email' => $email
        ]);
        $result = $stmt->fetch(PDO::FETCH_COLUMN, 0);
        $stmt->closeCursor();
        $stmt = null;
        return $result;
    }

    static function encPass($password){
        $password = password_hash($password,PASSWORD_DEFAULT,['cost' => 10]);
        return $password;
    }

    static function verifyUserEmail($value){
        $stmt = Conn::Con()->prepare(
            "SELECT * FROM users WHERE email = :email OR username = :username;
            SELECT FOUND_ROWS();"
        );
        $stmt->execute([
            ':email' => $value,
            ':username' => $value
        ]);
        $result = $stmt->fetch(PDO::FETCH_COLUMN, 0);
        $stmt->closeCursor();
        $stmt = null;
        return $result;
    }

    static function verifyUserPassword($value){
        $stmt = Conn::Con()->prepare(
            "SELECT password FROM users WHERE email = :email OR username = :username;"
        );
        $stmt->execute([
            ':email' => $value,
            ':username' => $value
        ]);
        $result = $stmt->fetch(PDO::FETCH_COLUMN, 0);
        $stmt->closeCursor();
        $stmt = null;
        return $result;
    }
    static function getUserbyId($value){
        $stmt = Conn::Con()->prepare(
            "SELECT * FROM users WHERE email = :email OR username = :username;"
        );
        $stmt->execute([
            ':email' => $value,
            ':username' => $value
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
        return $result;
    }
}
?>