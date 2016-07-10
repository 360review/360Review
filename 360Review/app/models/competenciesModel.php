<?php
  require_once "dbModel.php";

  class competenciesModel extends DB {
    function getCompetencies() {
      $statement = $this->executeQuery("SELECT * FROM competencies");
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
  }