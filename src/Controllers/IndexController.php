<?php
namespace src\Controllers;

use MF\Controller\Action;
use src\Models\Produto;

class IndexController extends Action {

  public function index() {
    $produto = new Produto();
    $produtos = $produto->getProdutos();
    $this->view->dados = $produtos;

    $this->render('index');
  }

  public function sobreNos() {
    $this->view->dados = array('computador', 'celular');
    $this->render('sobreNos');
  }

}