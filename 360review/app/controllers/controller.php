<?php
class Controller{

    function __construct(){

          $pages = array(
                "home"         => array("path"=>"home.php", "class"=>"Home"),
                "login"        => array("path"=>"login.php", "class"=>"Login"),
                "register"     => array("path"=>"register.php", "class"=>"Register")
        );

        $uri = $_SERVER["PATH_INFO"];
        $segments = explode("/", $uri);

        $page="home";
        $controller = $segments[1]    ;
        $method= empty($segments[2]) ? "" :$segments[2];

        if(!empty($controller) && $controller != "index.php") {
            if (array_key_exists($controller, $pages)) {
                 $page = $controller;
            }
            else {
                http_response_code(404);
                include VIEWS."error_view.php";
                exit;
            }
        }

        require $pages[$page]['path'];
        $controllerClass= new $pages[$page]['class']();

        if (!empty($method) && method_exists($page, $method)){
            $controllerClass->$method();
        }
        else{
            $controllerClass->index(); 
        }
    }
}
?>
