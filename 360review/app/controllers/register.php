<?php

class Register {
    function index() {
        if (isset($_POST) && !empty($_POST)) {
            
           require MODELS."usersModel.php";
           $users = new UsersModel ();
           $user = $users -> register($_POST);
        
            if ($user) {
               header ("Location: ".BASE_URL."login");
               exit();
            }
            else {
               echo "Register failed";
            }   
        }
      include VIEWS."register_view.php";
  }
}

?>