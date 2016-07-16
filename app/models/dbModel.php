<?php
class DB{
        protected $db;

        function __construct(){
            $this->db = new PDO("mysql:host=localhost;dbname=360review", "root", "");
        }

        function executeQuery($val){
            $sth =$this->db->prepare($val);
            $sth->execute();
            return $sth;
        }
    }


?>
