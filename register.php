<?php
session_start();
if (isset($_POST['email'])) {
  $validation_ok = true;

  $nick = $_POST['nick'];

  if ((strlen($nick) < 3) || (strlen($nick) > 20)) {
    $validation_ok = false;
    $_SESSION['e_nick'] = "Nick must be betwen 3 - 20 signs";
  }


  if (ctype_alnum($nick) == false) {
    $validation_ok = false;
    $_SESSION['e_nick'] = "Please use only letters and numbers for nick name";
  }

  //check email
  $email = $_POST['email'];
  $email_sanitized = filter_var($email, FILTER_SANITIZE_EMAIL);

  if ((filter_var($email_sanitized, FILTER_VALIDATE_EMAIL) == false) || $email_sanitized != $email) {
    $validation_ok = false;
    $_SESSION['e_email'] = 'Incorect email';
  }

  //checko password

  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];

  if (strlen(($password1)) < 8 || strlen($password1) > 20) {
    $validation_ok = false;
    $_SESSION['e_password'] = 'Password needs to be betwen 8 and 20 signs';
  }

  if ($password1 != $password2) {
    $validation_ok = false;
    $_SESSION['e_password'] = 'Both passwords need to be the same';
  }

  $password_hash = password_hash($password1, PASSWORD_DEFAULT);


  //checkbox

  echo $_POST['terms'], exit();

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

    <?php
    if (isset($_SESSION['e_email'])) {
      echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
      unset($_SESSION['e_email']);
    }
    ?>

    Password: <br><input type="password" name="password1"><br>
    <?php
    if (isset($_SESSION['e_password'])) {
      echo '<div class="error">' . $_SESSION['e_password'] . '</div>';
      unset($_SESSION['e_password']);
    }
    ?>
    Repeat Password: <br><input type="password" name="password2"><br>
    <label>
      <input type="checkbox" name="terms">Accept terms and conditions<br>
    </label>

    <input type="submit" value="Submit">
  </form>

</body>

</html>