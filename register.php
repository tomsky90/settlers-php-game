<?php
session_start();
if (isset($_POST['email'])) {
  $validation_ok = true;

  $nick = $_POST['nick'];

  if ((strlen($nick) < 3) || (strlen($nick) > 20)) {
    $validation_ok = false;
    $_SESSION['e_nick'] = "Nick must be betwen 3 - 20 signs";
  }

  if ($validation_ok == true) {
    //add user
    echo 'udana walidacja';
    exit();
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register free today!</title>
  <style>
    .error {
      color: red;
      margin-top: 10px;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <form method="post">
    Nickname: <br><input type="text" name="nick"><br>
    <?php
    if (isset($_SESSION['e_nick'])) {
      echo '<div class="error">' . $_SESSION['e_nick'] . '</div>';
      unset($_SESSION['e_nick']);
    }

    ?>
    E-mail: <br><input type="text" name="email"><br>
    Password: <br><input type="password" name="password1"><br>
    Repeat Password: <br><input type="password" name="password2"><br>
    <label>
      <input type="checkbox" name="terms">Accept terms and conditions<br>
    </label>

    <input type="submit" value="Submit">
  </form>

</body>

</html>