<?php
namespace src\Models;

class Quiz {

  private $quizes = [
    [
      "id" => "sdhksddflsdfa",
      "title" => "Questionário de exemplo 1",
      "user" => "usuario_logado",
      "created_at" => "2020-02-05"  
    ],
  ];

  public function all() {
    return $this->quizes;
  }

  public function insert(array $data) {
    array_push($this->quizes, [
      "id" => md5($data['title']),
      "title" => $data['title'],
      "user" => "usuario_logado",
      "created_at" => date("Y-m-d")
    ]);
  }

}