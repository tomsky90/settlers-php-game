<?php

session_start();

if ((isset($_SESSION["is_user_loggedin"])) && ($_SESSION["is_user_loggedin"] = true)) {
  header('Location: game.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settlers
  </title>
  <link href="./style.css" rel="stylesheet">
</head>

<body>
  <h1 class="home__heading">Only the dead have seen the end of war -Plato </h1>
  <br><br>
  <a style="text-align:center; width: 100%;display:block;" href="register.php">Register</a>

  <form action="login.php" method="post">
    <h2>Welcome Back</h2>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="submit" value="Log In">
  </form>

  <?php


  if (isset($_SESSION['login_error'])) {
    echo $_SESSION['login_error'];
  }

  ?>

</body>

</html>