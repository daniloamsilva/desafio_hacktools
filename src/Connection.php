<?php
namespace src;

class Connection {

  public static function getDb() {
    try {
      $connection = new \PDO(
        "mysql:host=localhost;dbname=desafio_hacktools;charset=utf8",
        "root",
        ""
      );

      return $connection;
    } catch (\PDOException $e) {
      echo 'Erro de conexão com o banco de dados';
    }
  }

}