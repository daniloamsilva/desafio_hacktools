<?php
namespace src\Models;

use MF\Model\Model;

class Question extends Model {

  private $id;
  private $question_text;
  private $quiz_id;

  public function __get($attr){
    return $this->$attr;
  }

  public function __set($attr, $value){
    $this->$attr = $value;
  }

  public function getQuizQuestions($quiz_id) {
    $query = "
      SELECT id, question_text, quiz_id
      FROM tb_questions
      WHERE quiz_id = ". $quiz_id ."
    ";
    return $this->db->query($query)->fetchAll();
  }

  public function insert() {
    $query = "INSERT INTO tb_questions(question_text, quiz_id) VALUES (:question_text, :quiz_id)";
    $stmt = $this->db->prepare($query);

    $stmt->bindValue(':question_text', $this->__get('question_text'));
    $stmt->bindValue(':quiz_id', $this->__get('quiz_id'));
    $stmt->execute();

    return $this->db->lastInsertId();
  }

}