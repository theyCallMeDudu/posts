<?php
 
 session_start();
 $verifica = $_SESSION["autenticado"];
 if($verifica){
   //echo "esta autenticado";
 }else {
    header('location: login.php');
    
 }




?>