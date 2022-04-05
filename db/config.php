<?php

class Conn{
    static function Con(){
        $dsn = 'mysql:host=localhost;dbname=ecommerce';
        $user = 'root';
        $password = '1234'; 
        try{
            $conn = new PDO($dsn,$user,$password);
            return $conn;
        }
        catch(PDOException $e){
            return $e->getMessage();
        }
    }
}



?>