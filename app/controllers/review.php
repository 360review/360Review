<?php

class Review
{
  function __construct()
  {
    if (isset($_SESSION) && !empty($_SESSION["userId"])) {
      include VIEWS . "review_view.php";
    } else {
      header("Location: " . BASE_URL . "home");
    }
  }

  function index()
  {
//      if (isset($_SESSION) && !empty($_SESSION["userId"])) {
//        include VIEWS."review_view.php";
//      } else {
//        header("Location: " . BASE_URL . "home");
//      }
  }

  function postReview()
  {
    $grades = json_decode(file_get_contents('php://input'), true);

    if (!is_null($grades)) {

      require MODELS . "gradesModel.php";
      $gradesModel = new GradesModel();
      $gradesValid = true;
      foreach ($grades as $grade) {
        if ($grade["grade"] > 0 && $grade["grade"] <= 5) {
          $grade["voter_id"] = $_SESSION["userId"];
        } else {
          $gradesValid = false;
          header('X-PHP-Response-Code: 400 - Bad input. Grades out of range', true, 400);
          break;
        }
      }
      if ($gradesValid == true) {
        $gradesModel->addGrades($grades);
      }

    } else {
      header('X-PHP-Response-Code: 400 - Bad input. Null value', true, 400);
    }
  }
}