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

    $this->set('activity',$activity);
    $this->set('focuses',$focuses);
    $this->set('friends',$friends);
    $this->set('title', 'Overview');
  }

  public function add() {
    $types = $this->activityDAO->selectAllTypes();
    $locations = $this->activityDAO->selectAllLocations();
    $focuses = $this->activityDAO->selectAllFocuses();
    // $sports = $this->activityDAO->selectAllSportsByType(2);


    // DIT HEB IK NOG NIET WERKENDE GEKREGEN :(
    if(!empty($_POST['action'])){
        if($_POST['action'] == 'insertActivity'){
            $data = array(
              'sport_id' => $sport['id'],
              'date' => $_POST['date'],
              'starthour' => $_POST['starthour'],
              'endhour' => $_POST['starthour'],
              'location_id' => 0,
              'intensity' => $_POST['intensity'],
              'timestamp' => date('Y-m-d H:i:s'),
            );
            $insertedActivity = $this->activityDAO->insertActivity($_POST);
            if(!$insertedActivity){
              $errors = $this->activityDAO->validateActivity($_POST);
              $this->set('errors',$errors);
            }else{
              header('Location:index.php?page=add');
              exit();
            }
          header('Location:index.php');
        }
      }

    if (!empty($_GET['action'])) {
      if ($_GET['action'] == 'delete_activity') {
        $activityDAO->delete($_GET['id']);
      }
    }

    $this->set('title', 'Add activity');
    $this->set('types', $types);
    $this->set('locations', $locations);
    $this->set('focuses', $focuses);
  }


}
