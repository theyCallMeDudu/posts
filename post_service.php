<?php
class PostService{

    private $conexao;
    private $post;

    public function __construct(Conexao $conexao, Post $post){
        $this->conexao = $conexao->conectar();
        $this->post = $post;
    }
    public function inserir(){
        $query = 'insert into posts(id_user, title, content, foto) values (:id_user, :title, :content, :foto)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_user', $this->post->__get('id_user'));
        $stmt->bindValue(':title', $this->post->__get('title'));
        $stmt->bindValue(':content', $this->post->__get('content'));
        $stmt->bindValue(':foto', $this->post->__get('foto'));

        $stmt->execute();
    }
    public function recuperar(){
      $query = 'select * from posts where id_user = :id_user and manipulador is null';
      $stmt = $this->conexao->prepare($query);
      $verifica = $_SESSION["autenticado"];
      $stmt->bindValue(':id_user', $verifica);
      $stmt->execute();
      return  $stmt->fetchAll(PDO::FETCH_OBJ);

      
    }
    public function recuperarPublica(){
        $query = 'select * from posts where id_user = :id_user and manipulador is not null';
        $stmt = $this->conexao->prepare($query);
        $verifica = $_SESSION["autenticado"];
        $stmt->bindValue(':id_user', $verifica);
        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function atualizar(){
        $query = "update posts set title = :title, content = :content where id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':title', $this->post->__get('title'));
        $stmt->bindValue(':content', $this->post->__get('content'));
        $stmt->bindValue(':id', $this->post->__get('id'));
        return $stmt->execute();
    }

    public function remover(){
        $query = "delete from posts where id =: id";
        $stmt = $this->conexao->prepare($query);
        return $stmt->execute();
    }

    public function quantidade(){
        $query = "select count(*) as qtd from posts";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function publicar(){
        $query = "update posts set manipulador = :manipulador where id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':manipulador', $this->post->__get('manipulador'));
        $stmt->bindValue(':id', $this->post->__get('id'));
        return $stmt->execute();
    }
}


?>