<?php
namespace src\Models;

class Quiz {

   private $quizes = [
    [
      "id" => "sdhksddflsdfa",
      "title" => "Questionário de exemplo 1",
      "user" => "usuario_logado",
      "created_at" => "2020-02-05 22:13:00"  
    ],
  ];

  public function all() {
    return $this->quizes;
  }

}