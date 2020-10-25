<?php
class CadastroService{

    private $conexao;
    private $cadastro;

    public function __construct(Conexao $conexao, Cadastro $cadastro){
        $this->conexao = $conexao->conectar();
        $this->cadastro = $cadastro;
    }
    public function inserir(){
      $query = 'insert into usuarios (nome, email, senha) values (:nome, :email, :senha)';
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(':nome', $this->cadastro->__get('nome'));
      $stmt->bindValue(':email', $this->cadastro->__get('email'));
      $stmt->bindValue(':senha', $this->cadastro->__get('senha'));

      return $stmt->execute();
    }

    public function verificar(){
        $query = 'select email from usuarios where email = :email';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':email', $_POST['email_cad']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function verificarAuntenticacao(){
        $query = 'select * from usuarios where email = :email and senha = :senha';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':email', $_POST['email_login']);
        $stmt->bindValue(':senha', $_POST['senha_login']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
}


?>