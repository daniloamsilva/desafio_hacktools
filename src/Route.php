<?php
namespace src;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

  protected function initRoutes() {

    $routes['index'] = array(
      'route' => '/',
      'controller' => 'QuizController',
      'action' => 'index'
    );

    $routes['create'] = array(
      'route' => '/create',
      'controller' => 'QuizController',
      'action' => 'create'
    );

    $routes['show'] = array(
      'route' => '/show',
      'controller' => 'QuizController',
      'action' => 'show'
    );

    $routes['store'] = array(
      'route' => '/store',
      'controller' => 'QuizController',
      'action' => 'store'
    );

    $routes['update'] = array(
      'route' => '/update',
      'controller' => 'QuizController',
      'action' => 'update'
    );

    $this->setRoutes($routes);
  }

}