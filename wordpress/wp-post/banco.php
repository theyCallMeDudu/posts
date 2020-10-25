<?php
 class Banco{
     private $host = 'localhost';
     private $dbname = 'faculdade';
     private $user = 'root';
     private $pass = '';
     public function conectado(){
        try{
           $banco = new PDO(
             "mysql:host=$this->host;dbname=$this->dbname",
             "$this->user",
             "$this->pass"
           );
           return $banco;

        }catch(PDOException $e){
            echo '<p>' .$e->getMessage(). '</p>';
        }
     }
 }


?>