<?php

  class Api {
    function index() {
      echo "index";
    }
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
  }