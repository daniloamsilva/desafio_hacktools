<?php
namespace MF\Controller;

abstract class Action {

  protected $view;

  public function __construct() {
    $this->view = new \stdClass();
  }

  protected function render($view) {
    $this->view->page = $view;
    require_once "../src/Views/layout/layout.phtml";
  }

  protected function content() {
    $current_class = get_class($this);
    $current_class = str_replace('src\\Controllers\\', '', $current_class);
    $current_class = strtolower(str_replace('Controller', '', $current_class));

    require_once "../src/Views/". $current_class ."/". $this->view->page .".phtml";
  }

}