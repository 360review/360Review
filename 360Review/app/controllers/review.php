<?php

  class Review {
    function __construct() {
      if (isset($_SESSION) && !empty($_SESSION["userId"])) {
        include VIEWS."review_view.php";
      } else {
        header("Location: " . BASE_URL . "home");
      }
    }

    function index() {
//      if (isset($_SESSION) && !empty($_SESSION["userId"])) {
//        include VIEWS."review_view.php";
//      } else {
//        header("Location: " . BASE_URL . "home");
//      }
    }

    function postReview() {
      $grades = json_decode(file_get_contents('php://input'), true);

      require MODELS . "gradesModel.php";
      $gradesModel = new GradesModel();

      foreach ($grades as $grade) {
        $grade["voter_id"] = $_SESSION["userId"];
        $gradesModel->addGrade($grade);
      }

    }
  }