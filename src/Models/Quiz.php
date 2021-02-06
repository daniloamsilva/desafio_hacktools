<?php
namespace src\Models;

use MF\Model\Model;

class Quiz extends Model {

  private $id;
  private $title;
  private $user_id;
  private $created_at;

  public function __get($attr){
    return $this->$attr;
  }

  public function __set($attr, $value){
    $this->$attr = $value;
  }

  public function all() {
    $query = "SELECT id, title, created_at FROM tb_quizes";
    return $this->db->query($query)->fetchAll();
  }

  public function insert() {
    $query = "INSERT INTO tb_quizes(title, user_id, created_at) VALUES (:title, :user_id, :created_at)";
    $stmt = $this->db->prepare($query);

    $stmt->bindValue(':title', $this->__get('title'));
    $stmt->bindValue(':user_id', $this->__get('user_id'));
    $stmt->bindValue(':created_at', $this->__get('created_at'));
    $stmt->execute();

    return $this->db->lastInsertId();
  }

}