<?php

require_once( __DIR__ . '/DAO.php');

class ActivityDAO extends DAO {

  public function selectAllActivities() {
    $sql = "SELECT `activities`.`id` AS `activity_id`, `sports`.`sport`, `activities`.`date`, `activities`.`starthour`, `activities`.`endhour`, `activities`.`intensity`, `locations`.`location`, `sports`.`icon` AS `sport_icon`, `locations`.`icon` AS `location_icon`
    FROM `activities`
    INNER JOIN `sports` ON `activities`.`sport_id` = `sports`.`id`
    INNER JOIN `locations` ON `activities`.`location_id` = `locations`.`id`
    ORDER BY `date`, `starthour`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectActivityById($id){
    $sql = "SELECT `activities`.`id` AS `activity_id`, `sports`.`sport`, `activities`.`date`, `activities`.`starthour`, `activities`.`endhour`, `activities`.`intensity`, `locations`.`location`, `sports`.`icon` AS `sport_icon`, `locations`.`icon` AS `location_icon`
    FROM `activities`
    INNER JOIN `sports` ON `activities`.`sport_id` = `sports`.`id`
    INNER JOIN `locations` ON `activities`.`location_id` = `locations`.`id`
    HAVING `activity_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectFocusByActivityId($id){
    $sql = "SELECT * FROM `activities`
        INNER JOIN `activities_have_focuses` ON `activities`.`id` = `activities_have_focuses`.`activity_id`
        INNER JOIN `focuses` ON `activities_have_focuses`.`focus_id` = `focuses`.`id`
		    WHERE `activities`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectFriendByActivityId($id){
    $sql = "SELECT * FROM `activities`
        INNER JOIN `friends` ON `activities`.`id` = `friends`.`activity_id`
		    WHERE `activity_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllLocations() {
    $sql = "SELECT * FROM `locations`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllFocuses() {
    $sql = "SELECT * FROM `focuses`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllTypes() {
    $sql = "SELECT * FROM `types`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllSports() {
    $sql = "SELECT * FROM `sports`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // public function selectAllSportsByType($type) {
  //   $sql = "SELECT * FROM Sports WHERE type = :type";
  //   $stmt = $this->pdo->prepare($sql);
  //   $stmt->bindValue(':type', $type);
  //   $stmt->execute();
  //   return $stmt->fetchAll(PDO::FETCH_ASSOC);
  // }

  public function insertActivity($data){
    $errors = $this->validateActivity($data);
    if (empty($errors)) {
      $sql = "INSERT INTO `activities` (`sport_id`, `date`, `starthour`, `endhour`, `location_id`, `intensity`, `timestamp`) VALUES (:sport_id, :date, :starthour, :endhour, :location_id, :intensity, :timestamp)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':sport_id', $data['sport_id']);
      $stmt->bindValue(':date', $data['date']);
      $stmt->bindValue(':starthour', $data['starthour']);
      $stmt->bindValue(':endhour', $data['endhour']);
      $stmt->bindValue(':location_id', $data['location_id']);
      $stmt->bindValue(':intensity', $data['intensity']);
      $stmt->bindValue(':timestamp', $data['timestamp']);
      if ($stmt->execute()) {
        return $this->getLastInsertedActivityId();
      }
    }
   return false;
  }

  public function getLastInsertedActivityId() {
    $sql = "SELECT `id`FROM `activities` ORDER BY `timestamp` DESC LIMIT 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function validateActivity($data){
    $errors = [];
    if (!isset($data['sport_id']) || empty($data['sport_id'])) {
      $errors['sport'] = 'Please select a sport for your activity';
    }
    if (empty($data['date'])) {
      $errors['day'] = 'Please select a date for your activity';
    }
    if (empty($data['starthour'])) {
      $errors['starthour'] = 'Please select a starthour for your activity';
    }
    if (empty($data['endhour'])) {
      $errors['endhour'] = 'Please select how long you want your activity to be';
    }
    if (empty($data['location_id'])) {
      $errors['location'] = 'Please select a location for your activity';
    }
    if (empty($data['intensity'])) {
      $errors['intensity'] = 'Please select an intensity for your activity';
    }
    if (empty($data['timestamp'])) {
      $errors['timestamp'] = 'Timestamp';
    }

    return $errors;
  }

   public function delete($id){
    $sql = "DELETE FROM `activities` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
  }

}

