<?php

  class Login {
    function index() {
      if (isset($_SESSION) && !empty($_SESSION["userId"])) {
        header("Location: " . BASE_URL . "home");
      }

      if (isset($_POST) && !empty($_POST)) {

        require MODELS."usersModel.php";
        $users = new UsersModel();
        $user = $users->login($_POST['email'], $_POST['password']);

        if ($user) {
          $_SESSION["userId"] = $user[0]["id"];
          header("Location:  " . BASE_URL . "review");
          exit();
        }
        else {
          echo "Invalid email or password";
        }
      }
      include VIEWS."login_view.php";
    }

    function logout() {
      if (isset($_SESSION) && !empty($_SESSION["userId"])) {
        session_destroy();
        header("Location:  " . BASE_URL . "home");
      }
    }
  }

?>
