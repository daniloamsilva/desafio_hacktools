<?php
namespace src\Models;

use MF\Model\Model;

class QuizAnswer extends Model {

  public function insert() {
    $query = "
      INSERT INTO tb_quiz_answers(quiz_id, latitude, longitude, created_at) 
      VALUES (:quiz_id, :latitude, :longitude, :created_at)
    ";
    $stmt = $this->db->prepare($query);

    $stmt->bindValue(':quiz_id', $this->__get('quiz_id'));
    $stmt->bindValue(':latitude', $this->__get('latitude'));
    $stmt->bindValue(':longitude', $this->__get('longitude'));
    $stmt->bindValue(':created_at', $this->__get('created_at'));
    $stmt->execute();

    return $this->db->lastInsertId();
  }

  public function find($quiz_id) {
    $query = "SELECT id, quiz_id, latitude, longitude, created_at FROM tb_quiz_answers WHERE quiz_id = " . $quiz_id;
    return $this->db->query($query)->fetch();
  }

}