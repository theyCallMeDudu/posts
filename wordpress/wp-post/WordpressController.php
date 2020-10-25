<?php
  require "banco.php";
  require "Wordpost.php";
  require "WordService.php";
  
  

  $wordpost = new WordPost();
  $banco = new Banco();
  $wordservice = new WordService($banco, $wordpost);
  $arrayPosts = $wordservice->recuperar();
  
  // $dir    =  '../../../../app/../tests';
  // $files1 = scandir($dir);
  
  //foreach($arrayPosts as $key => $valor){
   // $variavelValor = $valor->image;
   // $Foto[] = substr($variavelValor, 11); 
 // }


?>