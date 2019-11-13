<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/TodoDAO.php';

class TodosController extends Controller {

  private $todoDAO;

  function __construct() {
    $this->todoDAO = new TodoDAO();
  }

  public function index() {

    $this->set('title', 'Home');


  }

}
