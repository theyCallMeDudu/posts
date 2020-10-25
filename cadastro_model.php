<?php

class Cadastro {
private $id;
private $nome;
private $usuario;
private $senha;

  public function __get($atributo){
      return $this->$atributo;
  }
  public function __set($atributo, $valor){
     return $this->$atributo = $valor;
  }
}





?>