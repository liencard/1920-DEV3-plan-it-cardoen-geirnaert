<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivityDAO.php';

class ActivitiesController extends Controller {

  private $activityDAO;

  function __construct() {
    $this->activityDAO = new ActivityDAO();
  }

  public function index() {
    $locations = $this->activityDAO->selectAllLocations();
    // var_dump($locations);
    $this->set('title', 'Home');
  }

  public function detail() {
    $this->set('title', 'Edit activity');
  }

  public function add() {
    $types = $this->activityDAO->selectAllTypes();
    // $sports = $this->activityDAO->selectAllSportsByType(2);
    // var_dump($sports);
    $this->set('title', 'Add activity');
    $this->set('types', $types);

  }

}
