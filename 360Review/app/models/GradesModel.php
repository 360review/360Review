<?php

require_once "dbModel.php";

class GradesModel extends DB {
  function addGrade($grades) { //What one user graded

    $columns = implode(", ", array_keys($grades));
    $escaped_values = array_map($this->db->prepare, array_values($grades));
    $values  = implode(", ", $escaped_values);
    $sql = "INSERT INTO `grades`($columns) VALUES ($values)";

    $this->executeQuery($sql);

//    return $this->db->lastInsertId();
  }
}