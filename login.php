<?php

session_start();

if (!isset($_POST["email"]) || !isset($_POST["password"])) {
  header("Location: index.php");
  exit();
}

require_once "connect.php";

try {
  $connection = new mysqli($host, $db_user, $db_password, $db_name, $db_port);


  if ($connection->connect_errno) {
    throw new Exception("Connection failed: " . $connection->connect_error);
  }

  $login = $_POST['email'];
  $password = $_POST['password'];

  $login = htmlentities($login, ENT_QUOTES, "UTF-8");
  $password = htmlentities($password, ENT_QUOTES, "UTF-8");





  if (
    $result = @$connection->query(
      sprintf(
        "SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
        mysqli_real_escape_string($connection, $login),
        mysqli_real_escape_string($connection, $password),
      )
    )
  ) {
    $users_Number = $result->num_rows;
    if ($users_Number > 0) {
      $_SESSION["is_user_loggedin"] = true;
      $row = $result->fetch_assoc();
      $_SESSION["user_id"] = $row["id"];
      $_SESSION['user'] = $row['user'];
      $_SESSION['wood'] = $row['drewno'];
      $_SESSION['stone'] = $row['kamien'];
      $_SESSION['grain'] = $row['zboze'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['premium_left'] = $row['dnipremium'];

      unset($_SESSION['login_error']);
      $result->free_result();
      header('Location: game.php');
    } else {
      $_SESSION['login_error'] = '<span style="color:red"> Wrong Email or Password!</span>';
      header('Location: index.php');
    }

  }

  $connection->close();
} catch (Exception $e) {

  error_log($e->getMessage(), 3, "C:\xampp\php\logs\php_errors.log");


  echo "Sorry, something went wrong. Please try again later.";
}
