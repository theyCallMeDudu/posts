<?php

class Post {
private $id;
private $id_user;
private $title;
private $foto;
private $hora_publica;
private $content;
private $manipulador;
private $created_at;
private $updated_at;

  public function __get($atributo){
      return $this->$atributo;
  }
  public function __set($atributo, $valor){
     return $this->$atributo = $valor;
  }
}





?>