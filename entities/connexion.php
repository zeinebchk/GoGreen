<?php

class connexion{
    public $dsn;
    public $pass;
    public $user;
    public $pdo;

    public function __construct(){
        $dsn="mysql:host=localhost;dbname=gogreen";
        $pass="";
        $user="root";
        try{
            $this->pdo=new PDO($dsn,$user,$pass);
            echo "connexion etablie";
          
        }
        catch(PDOException $e){
            echo "<p>ERREUR:".$e->getMessage();
            die();
        }
    }
    public function getPDO(){
        return $this->pdo;}

    public function __desconstruct(){
        $pdo=null;
    } 
}
$con=new connexion();

?>