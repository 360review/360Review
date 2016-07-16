<?php

require_once "dbModel.php";

class GradesModel extends DB {

  function addGrade($grades) { //What one user graded

    $columns = implode(", ", array_keys($grades));
    $escaped_values = array_map($this->db->prepare, array_values($grades));
    $values  = implode(", ", $escaped_values);
    $sql = "INSERT INTO `grades`($columns) VALUES ($values)";

    $this->executeQuery($sql);
  }

  function addGrades($grades) { //What one user graded; $grades is an array with all the review data
    $columns = implode(", ", array_keys($grades[0]));

    foreach ($grades as $row) {
      $voter_id = $row["voter_id"];
      $user_id = $row["user_id"];
      $competence_id = $row["competence_id"];
      $grade = $row["grade"];
      $valuesArr[] = "('$voter_id', '$user_id', '$competence_id', '$grade')";
    }

    $values  = implode(", ", $valuesArr);
    $sql = "INSERT INTO `grades`($columns) VALUES $values";

    $this->executeQuery($sql);
  }

  function getSelfGrades() {
    $sql = "SELECT grades.grade, competencies.name as competence
            FROM grades
            INNER JOIN competencies
            ON competencies.id=grades.competence_id
            WHERE (grades.user_id='".$_SESSION["userId"]."') && (grades.voter_id='".$_SESSION["userId"]."')";

    $statement = $this->executeQuery($sql);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  function getTeamGrades() {
    $sql = "SELECT grades.grade, competencies.name AS competence, users.first_name AS team_member
            FROM grades JOIN competencies ON competencies.id=grades.competence_id
            JOIN users ON users.id = grades.voter_id
            WHERE (grades.user_id='".$_SESSION['userId']."' ) &&
            (grades.sprint = 'sprint1') && (grades.voter_id<>grades.user_id)
            ORDER BY grades.voter_id";

    $statement = $this->executeQuery($sql);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
