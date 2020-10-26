<?php
 
 require "cadastro_model.php";
 require "cadastro_service.php";
 require "conexao.php";

 $acao = isset($_GET['acao']) ? $_GET['acao']  : $acao;

 if($acao == 'inserir'){
     $cadastro = new Cadastro();
     $cadastro->__set('nome', $_POST['nome_cad']);
     $cadastro->__set('email', $_POST['email_cad']);
     $cadastro->__set('senha', $_POST['senha_cad']);

     $conexao = new Conexao();
     $cadastroService = new CadastroService($conexao, $cadastro);
     $email = $cadastroService->verificar(); 
 
    foreach($email as $key => $valor){
        $array[] = $valor->email;
    }
     if(in_array($_POST['email_cad'], $array)){
        header('location: registra.php?cadastro=1');
     } else {
         $cadastroService->inserir();
     }
   
  
 } else if($acao == 'autenticar'){
      $cadastro = new Cadastro();
      $cadastro->__set('email', $_POST['email_login']);
      $cadastro->__set('senha', $_POST['senha_login']);

      $conexao = new Conexao();
      $cadastroService =  new CadastroService($conexao, $cadastro);
      $autenticar = $cadastroService->verificarAuntenticacao();
      if(empty($autenticar)){
          header('location: login.php');
      } else {
        session_start();
        foreach($autenticar as $key => $valor){
            $_SESSION["autenticado"] = $valor->id;
        }
        header('location: nova_postagem.php');
      }
 }




?>