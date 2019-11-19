<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivityDAO.php';

class ActivitiesController extends Controller {

  private $activityDAO;

  function __construct() {
    $this->activityDAO = new ActivityDAO();
  }

  public function index() {
    $this->set('title', 'Home');
  }

  public function add() {
    $this->set('title', 'Add activity');
  }

}
