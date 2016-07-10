<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>360Review</title>
  </head>
  <body>
    <h1>Home page!!!</h1>

    <?php if (isset($_SESSION) && !empty($_SESSION["userId"])) { ?>
        <a href="<?php echo BASE_URL . "login/logout"; ?>">Logout</a>
    <?php  } else { ?>
        <a href="<?php echo BASE_URL . "login"; ?>">Login</a>
        <a href="<?php echo BASE_URL . "register"; ?>">Register</a>
    <?php } ?>
  </body>
</html>
