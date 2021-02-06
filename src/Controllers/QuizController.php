<?php
namespace src\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class QuizController extends Action {

  public function index() {
    $quiz = Container::getModel('Quiz');

    $quizes = $quiz->all();
    $this->view->quizes = $quizes;

    $this->render('index');
  }

  public function create() {
    $this->render('create');
  }

  public function show() {
    $quiz_id = $_GET['id'];

    $this->view->quiz_id = $quiz_id;

    $this->render('show');
  }

  public function store() {
    $quiz = Container::getModel('Quiz');
    $quiz->__set('title', $_POST['quiz_title']);
    $quiz->__set('user_id', 1);
    $quiz->__set('created_at', date('Y-m-d'));
    $result_id = $quiz->insert();

    foreach($_POST['quiz_questions'] as $question_text) {
      $question = Container::getModel('Question');
      $question->__set('question_text', $question_text);
      $question->__set('quiz_id', $result_id);
      $question->insert();
    }

    header("Location: /");
  }

}