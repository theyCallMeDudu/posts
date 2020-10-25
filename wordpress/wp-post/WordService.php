<?php

class WordService{   
   private $banco;
   private $wordpost;

   public function __construct(Banco $banco, WordPost $wordpost)
   {
       $this->banco = $banco->conectado();
       $this->wordpost = $wordpost;
       
   }

  public function recuperar()
  {
   // $query = 'select p.id, p.id_user, p.title, t.image, p.content, p.post_date, p.post_time, p.created_at, p.updated_at from posts as p, photo as t where t.id_post = p.id ORDER BY p.id DESC LIMIT 1';
     $query = 'select * from posts ORDER BY manipulador DESC LIMIT 1';
     $stmt = $this->banco->prepare($query);
     $stmt->execute();
     return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

}



?>