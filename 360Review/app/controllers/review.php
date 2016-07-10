<?php

  class Review {
    function index() {
      if (isset($_SESSION) && !empty($_SESSION["userId"])) {
        include VIEWS."review_view.php";
      } else {
        header("Location: " . BASE_URL . "home");
      }

    }
  }