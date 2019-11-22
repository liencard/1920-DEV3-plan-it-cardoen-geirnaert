<?php

require_once( __DIR__ . '/DAO.php');

class ActivityDAO extends DAO {

  public function selectAllLocations() {
    $sql = "SELECT * FROM locations";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllTypes() {
    $sql = "SELECT * FROM types";
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
}

