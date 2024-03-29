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
    $sortedActivities = array();
    $previousDate = date('Y-m-d');
    $sortedActivities[$previousDate] = array();

    foreach ($activities as $activity) {
      if ($activity['date'] === $previousDate) {
        array_push($sortedActivities[$previousDate], $activity);
      } else {
        $previousDate = $activity['date'];
        $sortedActivities[$previousDate] = array();
        array_push($sortedActivities[$previousDate], $activity);
      }
    }

    $this->set('sortedActivities', $sortedActivities);
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
      if ($_GET['action'] == 'deleteActivity') {
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
    $errors = array();

    $types = $this->activityDAO->selectAllTypes();
    $locations = $this->activityDAO->selectAllLocations();
    $focuses = $this->activityDAO->selectAllFocuses();
    $sports = $this->activityDAO->selectAllSports();

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //   $_SESSION['formData'] = $_POST;
    //   //unset($_POST);
    // }

    if (!empty($_POST['action']) && $_POST['action'] == 'newActivity'){

      if (isset($_POST['selectType'])){
        if (!empty($_POST['type'])){
          $type = $_POST['type'];
          $sports = $this->activityDAO->selectSportsByTypeId($type);
          $this->set('sports', $sports);
          $this->_saveDataToSession($_POST);
        } else {
          $errors['type'] = "Please select a type";
        }
      }

      if (isset($_POST['addFriend'])){
        $this->_saveDataToSession($_POST);

        if (!empty($_POST['nameFriend'])) {
          $name = $_POST['nameFriend'];
          $_SESSION['sportFriends'][] = $name;
        }
      }

      if (isset($_POST['removeFriend'])) {
        $this->_saveDataToSession($_POST);
        $this->_handleRemove();
        header('Location: index.php?page=add-activity');
      }

      if(isset($_POST['save'])){
        $date = date("Y-m-d", $_POST['date']);
        $selectedFocuses = $_POST['focus'];
        $selectedFriends = $_SESSION['sportFriends'];

        $data = array(
          'sport_id' => $_POST['sport'],
          'date' => $date,
          'starthour' => $_POST['starthour'],
          'endhour' => $this->_getEndHour(),
          'location_id' => $_POST['location'],
          'intensity' => $_POST['intensity'],
          'timestamp' => date('Y-m-d H:i:s'),
        );

        $newActivity = $this->activityDAO->insertActivity($data);

        if (empty($newActivity)) {
          $errors = $this->activityDAO->validateActivity($data);
          $this->set('errors', $errors);
        } else {
          foreach ($selectedFocuses as $focusId) {
            $data['activity_id'] = $newActivity['activity_id'];
            $data['focus_id'] = $focusId;
            $this->activityDAO->insertFocus($data);
          }
          foreach ($selectedFriends as $firstname) {
            $data['activity_id'] = $newActivity['activity_id'];
            $data['firstname'] = $firstname;
            $this->activityDAO->insertFriend($data);
          }
          header('Location:index.php?page=detail&id=' . $newActivity['activity_id']);
          exit();
        }
      }
    }

    $this->set('title', 'Add activity');
    $this->set('types', $types);
    $this->set('locations', $locations);
    $this->set('focuses', $focuses);
    $this->set('days', $this->_getDaysOfNextWeek());
    $this->set('errors', $errors);
  }

  public function edit() {
    if(!empty($_GET['id'])){
      $types = $this->activityDAO->selectAllTypes();
      $locations = $this->activityDAO->selectAllLocations();
      $focuses = $this->activityDAO->selectAllFocuses();
      // $sports = $this->activityDAO->selectAllSports();
      $days = $this->_getDaysOfNextWeek();

      $activity = $this->activityDAO->selectActivityById($_GET['id']);
      $sports = $this->activityDAO->selectSportsByTypeId($activity['type_id']);
      $focuses = $this->activityDAO->selectFocusByActivityId($_GET['id']);
      $friends = $this->activityDAO->selectFriendByActivityId($_GET['id']);
    }

    //var_dump($activity);

        $data = array(
          'type' => $activity['type_id'],
          'sport' => $activity['sport_id'],
          'date' => $activity['date'],
          'starthour' => $activity['starthour'],
          // 'duration' => $_POST['location'],
          'location' => $_POST['intensity'],
          'intensity' => date('Y-m-d H:i:s'),
        );

        $this->_saveDataToSession($data);

      // if (!empty($_POST['action']) && $_POST['action'] == 'editActivity'){
      //   if(isset($_POST['update'])){

      //   $updatedActivity = $this->activityDAO->updateActivity($data);

      //   if (empty($updatedActivity)) {
      //         $errors = $this->activityDAO->validateActivity($data);
      //         $this->set('errors', $errors);
      //       } else {
      //         foreach ($selectedFocuses as $focusId) {
      //           $data['activity_id'] = $updatedActivity['activity_id'];
      //           $data['focus_id'] = $focusId;
      //           $this->activityDAO->updateFocus($data);
      //         }
      //         foreach ($selectedFriends as $firstname) {
      //           $data['activity_id'] = $updatedActivity['activity_id'];
      //           $data['firstname'] = $firstname;
      //           $this->activityDAO->updateFriend($data);
      //         }
      //         header('Location:index.php?page=detail&id=' . $updatedActivity['activity_id']);
      //         exit();
      //       }
      //     }
      // }


    $this->set('title', 'Edit activity');
    $this->set('types', $types);
    $this->set('sports', $sports);
    $this->set('days', $days);
    $this->set('locations', $locations);
    $this->set('focuses', $focuses);
  }

  private function _saveDataToSession($data) {
    unset($_SESSION['newActivity']);

    if (!empty($data['type'])) {
      $_SESSION['newActivity']['type_id'] = $data['type'];
      $_SESSION['newActivity']['sports'] = $this->activityDAO->selectSportsByTypeId($data['type']);
    }

    if (!empty($data['sport'])) {
      $_SESSION['newActivity']['sport_id'] = $data['sport'];
    }

    if (!empty($data['date'])) {
      $_SESSION['newActivity']['date'] = $data['date'];
    }

    if (!empty($data['starthour'])) {
      $_SESSION['newActivity']['starthour'] = $data['starthour'];
    }

    if (!empty($data['duration'])) {
      $_SESSION['newActivity']['duration'] = $data['duration'];
    }

    if (!empty($data['location'])) {
      $_SESSION['newActivity']['location_id'] = $data['location'];
    }

    if (!empty($data['intensity'])) {
      $_SESSION['newActivity']['intensity'] = $data['intensity'];
    }
  }

  private function _handleRemove() {
    if (isset($_SESSION['sportFriends'])) {
        foreach($_SESSION['sportFriends'] as $key => $value){
          if ($value === $_POST['removeFriend']) {
            unset($_SESSION['sportFriends'][$key]);
          };
        }
    }
  }

  private function _getDaysOfNextWeek() {
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

      $nextDay = clone $previousDay;
      $nextDay = $nextDay->modify('+1 day');

      $days[$d] = $nextDay->getTimeStamp();
      $previousDay = $nextDay;
    }

    return $days;
  }

  private function _getEndHour() {
    $duration = ($_POST['duration'] / 4) * 60 * 60;
    $endhour = strtotime($_POST['starthour']) + $duration;
    return date('H:i', $endhour);
  }

}
