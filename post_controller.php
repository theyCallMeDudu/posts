<?php
 
 require "post_model.php";
 require "post_service.php";
 require "conexao.php";
 

 $acao = isset($_GET['acao']) ? $_GET['acao']  : $acao;
  
if($acao == 'inserir'){
    session_start();
    $verifica = $_SESSION["autenticado"];
    $post = new Post();
    $conexao = new conexao();
    $postService = new PostService($conexao, $post);
    
    foreach($postService->quantidade() as $key => $valor){
        $total = $valor->qtd;
    }

 $post->__set('id_user', $verifica);
 $post->__set('title', $_POST['title']);
 $post->__set('content', $_POST['content']);
 $nomedoArquivo = $_FILES['foto']['name'];
 $texto = (string) $total;
 $caminhoAtualArquivo = $_FILES['foto']['tmp_name'];
 $caminhoSalvar = "wordpress/wp-post/".$texto.$nomedoArquivo;
 move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);
 $post->__set('foto', $texto.$nomedoArquivo);
 

 $postService->inserir();
 header('Location: nova_postagem.php?inclusao=1');
} else if($acao == 'recuperar'){
    $post = new Post();
    $conexao = new Conexao();

    $postService = new PostService($conexao, $post);
    $posts = $postService->recuperar();
} else if($acao == 'atualizar'){
   $post = new Post();
   $post->__set('id', $_POST['id']);
   $post->__set('title', $_POST['title']);
   $post->__set('content', $_POST['content']);

   $conexao = new Conexao();
   $postService = new PostService($conexao, $post);
   if($postService->atualizar()){
       header('location: todas_postagens.php');
   }
} else if($acao == 'publicar'){
    $post = new Post();
    date_default_timezone_set('America/Sao_Paulo');
    $hora =  date('Y-m-d  H:i:s');
    $post->__set('id', $_POST['id']);
    $post->__set('manipulador', $hora);
    $conexao = new Conexao();
    $postService = new PostService($conexao, $post);
    $postService->publicar();
    header('location: http://localhost/posts/wordpress/wp-post/original');
} else if($acao == 'recuperarPublica'){
    $post = new Post();
    $conexao = new Conexao();

    $postService = new PostService($conexao, $post);
    $posts = $postService->recuperarPublica();
} else if($acao == 'remover'){
    $post = new Post();
    $post->__set('id', $_POST['id']);

    $conexao = new Conexao();
    $postService = new PostService($conexao, $post);
    $post_remove = $postService->remover();
    header('location: todas_postagens.php');
}

?>