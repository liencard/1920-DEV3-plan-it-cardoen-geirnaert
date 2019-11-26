<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ActivityDAO.php';

class ActivitiesController extends Controller {

  private $activityDAO;

  function __construct() {
    $this->activityDAO = new ActivityDAO();
  }

  public function index() {
    $activities = $this->activityDAO->selectAllActivities();
    $this->set('activities', $activities);
    $this->set('title', 'Home');
  }

  public function detail() {
    if(!empty($_GET['id'])){
      $activity = $this->activityDAO->selectActivityById($_GET['id']);
      $focuses = $this->activityDAO->selectFocusByActivityId($_GET['id']);
      $friends = $this->activityDAO->selectFriendByActivityId($_GET['id']);
    }

    if(empty($activity)){
      header('Location: index.php');
      exit();
    }

    if (!empty($_GET['action'])) {
      if ($_GET['action'] == 'delete_activity') {
        $this->activityDAO->delete($_GET['id']);
        header('Location:index.php');
      }
    }

    $this->set('activity',$activity);
    $this->set('focuses',$focuses);
    $this->set('friends',$friends);
    $this->set('title', 'Overview');
  }

  public function add() {
    $types = $this->activityDAO->selectAllTypes();
    $locations = $this->activityDAO->selectAllLocations();
    $focuses = $this->activityDAO->selectAllFocuses();
    $sports = $this->activityDAO->selectAllSports();

    $today = new DateTime();
    $dayOfTheWeek = date('w', strtotime($today->format('Y-m-d')));
    $days = array();

    if ($dayOfTheWeek == 7) {
      $firstMonday= new DateTime('next monday');
    } else {
      $firstMonday = new DateTime('next sunday');
      $firstMonday = $firstMonday->modify('+1 day');
    }
    
    $days[0] = $firstMonday->getTimeStamp();
    $previousDay = $firstMonday;
    $d = 0;

    while($d < 6){
      $d++;

      $previousDay = $previousDay->format('Y-m-d');
      $nextDay = new DateTime($previousDay);
      $nextDay = $nextDay->modify('+1 day');

      $days[$d] = $nextDay->getTimeStamp();
      $previousDay = $nextDay;
    }

    
    var_dump($_POST);
    if (!empty($_POST['action']) && $_POST['action'] == 'newActivity'){
      $date = date("Y-m-d", $_POST['day']);
      var_dump($date);
      $data = array(
        'sport_id' => $_POST['sport'],
        'date' => $date,
        'starthour' => $_POST['starthour'],
        'endhour' => $_POST['starthour'],
        'location_id' => 1,
        'intensity' => $_POST['intensity'],
        'timestamp' => date('Y-m-d H:i:s'),
      );

      $newActivity = $this->activityDAO->insertActivity($data);

      if (empty($newActivity)) {
        $errors = $this->activityDAO->validateActivity($data);
        $this->set('errors', $errors);
      } else {
        header('Location:index.php?page=detail&id=' . $newActivity['id']);
        exit();
      }
    }

    if (!empty($_GET['action']) && $_GET['action'] == 'delete_activity') {
      $activityDAO->delete($_GET['id']);
      header('Location:index.php');
    }

    $this->set('title', 'Add activity');
    $this->set('types', $types);
    $this->set('locations', $locations);
    $this->set('focuses', $focuses);
    $this->set('sports', $sports);
    $this->set('days', $days);
  }


}
