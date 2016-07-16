<?php

  class Api {

    function getUsers() {
      header('Content-Type: application/json');

      require MODELS."usersModel.php";
      $usersModel = new UsersModel();
      $users = $usersModel->getUsers();
      echo json_encode($users);
    }

    function getCompetencies() {
      header("Content-Type: application/json");

      require MODELS . "competenciesModel.php";
      $competenciesModel = new competenciesModel();
      $competencies = $competenciesModel->getCompetencies();
      echo json_encode($competencies);
    }

    function getSelfGrades() {
      header("Content-Type: application/json");

      require_once MODELS ."GradesModel.php";
      $gradesModel = new GradesModel();
      $grades = $gradesModel->getSelfGrades();
      echo json_encode($grades);
    }

    function getTeamGrades() {
      header("Content-Type: application/json");

      require_once MODELS . "GradesModel.php";
      $gradesModel = new GradesModel();
      $grades = $gradesModel->getTeamGrades();
      echo json_encode($grades);
    }
  }
