<?php

require_once "dbModel.php";

class UsersModel extends DB {
  
  function login($email, $password) {
      $statement = $this->executeQuery("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."' LIMIT 1");
      return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  function register($array) {
    $statement = $this->executeQuery("INSERT INTO users (first_name, last_name, team, email, password) values ('".$array["firstName"]."', '".$array["lastName"]."','".$array["team"]."','".$array["email"]."','".$array["password"]."');");
    return $this->db -> lastInsertId ();
  }
} 
?>