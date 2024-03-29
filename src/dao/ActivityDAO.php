<?php

require_once( __DIR__ . '/DAO.php');

class ActivityDAO extends DAO {

  public function selectAllActivities() {
    $sql = "SELECT `activities`.`id` AS `activity_id`, `sports`.`sport`, `activities`.`date`, `activities`.`starthour`, `activities`.`endhour`, `activities`.`intensity`, `locations`.`id`, `locations`.`location`, `sports`.`icon` AS `sport_icon`, `locations`.`icon` AS `location_icon`
    FROM `activities`
    INNER JOIN `sports` ON `activities`.`sport_id` = `sports`.`id`
    INNER JOIN `locations` ON `activities`.`location_id` = `locations`.`id`
    WHERE `date` = curdate() OR `date` > curdate()
    ORDER BY `date`, `starthour`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectActivityById($id){
    $sql = "SELECT `activities`.`id` AS `activity_id`, `sports`.`sport`, `activities`.`sport_id`, `sports`.`type_id`, `activities`.`date`, `activities`.`starthour`, `activities`.`endhour`, `activities`.`intensity`, `activities`.`location_id`, `locations`.`location`, `sports`.`icon` AS `sport_icon`, `locations`.`icon` AS `location_icon`
    FROM `activities`
    INNER JOIN `sports` ON `activities`.`sport_id` = `sports`.`id`
    INNER JOIN `locations` ON `activities`.`location_id` = `locations`.`id`
    HAVING `activity_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectSportsByTypeId($id){
    $sql = "SELECT * FROM `sports`
      WHERE `type_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        return $this->selectActivityById($this->pdo->lastInsertId());
      }
    }
   return false;
  }

  public function insertFocus($data) {
    $sql = "INSERT INTO `activities_have_focuses` (`activity_id`, `focus_id`) VALUES (:activity_id, :focus_id)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':activity_id', $data['activity_id']);
    $stmt->bindValue(':focus_id', $data['focus_id']);
    if ($stmt->execute()) {
      return $this->pdo->lastInsertId();
    }
  }

  public function insertFriend($data) {
    $sql = "INSERT INTO `friends` (`firstname`, `activity_id`) VALUES (:firstname, :activity_id)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':firstname', $data['firstname']);
    $stmt->bindValue(':activity_id', $data['activity_id']);
    if ($stmt->execute()) {
      return $this->pdo->lastInsertId();
    }
  }

  public function updateActivity($data) {
    $errors = $this->validateActivity($data);
    if (empty($errors)) {
      $sql = "UPDATE `activities` SET
        `sport_id` = :sport_id,
        `date` = :date,
        `starthour` = :starthour,
        `endhour` = :endhour,
        `location_id` = :location_id,
        `intensity` = :intensity,
        `timestamp` = :timestamp
        WHERE `id` = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':sport_id', $data['sport_id']);
      $stmt->bindValue(':date', $data['date']);
      $stmt->bindValue(':starthour', $data['starthour']);
      $stmt->bindValue(':endhour', $data['endhour']);
      $stmt->bindValue(':location_id', $data['location_id']);
      $stmt->bindValue(':intensity', $data['intensity']);
      $stmt->bindValue(':timestamp', $data['timestamp']);
      $stmt->bindValue(':id', $data['id']);
      if ($stmt->execute()) {
        return $this->selectActivityById($data['id']);
      }
    }
    return false;
  }

  public function updateFocus($data) {
    $errors = $this->validateActivity($data);
    if (empty($errors)) {
      $sql = "UPDATE `activities_have_focuses` SET
        `activity_id` = :activity_id,
        `focus_id` = :focus_id
        WHERE `id` = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':activity_id', $data['activity_id']);
      $stmt->bindValue(':focus_id', $data['focus_id']);
      $stmt->bindValue(':id', $data['id']);
      if ($stmt->execute()) {
        return $this->selectActivityById($data['id']);
      }
    }
    return false;
  }

  public function updateFriends($data) {
    $errors = $this->validateActivity($data);
    if (empty($errors)) {
      $sql = "UPDATE `friends` SET
        `firstname` = :firstname,
        `activity_id` = :activity_id
        WHERE `id` = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':firstname', $data['firstname']);
      $stmt->bindValue(':activity_id', $data['activity_id']);
      $stmt->bindValue(':id', $data['id']);
      if ($stmt->execute()) {
        return $this->selectActivityById($data['id']);
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
    // if (!isset($data['type_id']) || empty($data['type_id'])) {
    //   $errors['type'] = 'Please select a sport type for your activity';
    // }
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

