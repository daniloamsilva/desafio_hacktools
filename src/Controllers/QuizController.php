<?php
namespace src\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use src\Models\QuestionAnswer;

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
    $quiz = Container::getModel('Quiz');

    $current_quiz = $quiz->find($_GET['id']);
    
    if($current_quiz['created_at']) {
      $quiz_answer = Container::getModel('QuizAnswer');
      $question_answer = Container::getModel('QuestionAnswer');

      $current_quiz_answer = $quiz_answer->find($current_quiz['id']);
      $answers = $question_answer->getQuizAnswers($current_quiz_answer['id']);

      $this->view->quiz = $current_quiz;
      $this->view->answers = $answers;

      $this->render('show_answers');
    }
    else {
      $question = Container::getModel('Question');
      $questions = $question->getQuizQuestions($current_quiz['id']);
  
      $this->view->quiz = $current_quiz;
      $this->view->questions = $questions;
  
      $this->render('show');
    }

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

  public function update() {
    $quiz_answer = Container::getModel('QuizAnswer');
    $quiz_answer->__set('quiz_id', $_POST['quiz_id']);
    $quiz_answer->__set('latitude', $_POST['latitude']);
    $quiz_answer->__set('longitude', $_POST['longitude']);
    $quiz_answer->__set('created_at', date('Y-m-d'));
    $result_id = $quiz_answer->insert();

    foreach($_POST as $key => $value) {
      if(substr($key, 0, 16) == 'answer_question_'){
        $question_answer = Container::getModel('QuestionAnswer');
        $question_answer->__set('quiz_answer_id', $result_id);
        $question_answer->__set('question_id', substr($key, 16));
        $question_answer->__set('answer', $value);
        $question_answer->insert();
      }
    }

    header("Location: /");
  }

}