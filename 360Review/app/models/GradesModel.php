<?php

require_once "dbModel.php";

class GradesModel extends DB {
  function addGrades($grades) {
    $columns = implode(", ", array_keys($grades));
    $escaped_values = array_map('mysql_real_escape_string', array_values($grades));
    $values  = implode(", ", $escaped_values);
    $sql = "INSERT INTO `grades`($columns) VALUES ($values)";

    $this->executeQuery($sql);
    return $this->db->lastInsertId();
  }
}