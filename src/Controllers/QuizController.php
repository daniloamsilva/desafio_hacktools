<?php
namespace src\Controllers;

use MF\Controller\Action;
use src\Models\Quiz;

class QuizController extends Action {

  public function index() {
    $quiz = new Quiz();
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
    $quiz = new Quiz();

    $quiz->insert([
      'title' => $_POST['quiz_title'],
      'questions' => $_POST['quiz_questions']
    ]);

    $quizes = $quiz->all();
    $this->view->quizes = $quizes;

    $this->render('index');
  }

}