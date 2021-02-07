<?php
namespace src\Models;

use MF\Model\Model;

class QuestionAnswer extends Model {

  private $id;
  private $quiz_answer_id;
  private $question_id;
  private $answer;

  public function __get($attr){
    return $this->$attr;
  }

  public function __set($attr, $value){
    $this->$attr = $value;
  }

  public function insert() {
    $query = "
      INSERT INTO tb_question_answers(quiz_answer_id, question_id, answer) 
      VALUES (:quiz_answer_id, :question_id, :answer)
    ";
    $stmt = $this->db->prepare($query);

    $stmt->bindValue(':quiz_answer_id', $this->__get('quiz_answer_id'));
    $stmt->bindValue(':question_id', $this->__get('question_id'));
    $stmt->bindValue(':answer', $this->__get('answer'));
    $stmt->execute();

    return $this->db->lastInsertId();
  }

  public function getQuizAnswers($quiz_answer_id) {
    $query = "
      SELECT q.question_text, qa.answer FROM tb_question_answers AS qa
      LEFT JOIN tb_questions AS q ON qa.question_id = q.id
      WHERE qa.quiz_answer_id = " . $quiz_answer_id;
    return $this->db->query($query)->fetchAll();
  }

}