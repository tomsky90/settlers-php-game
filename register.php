<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register free today!</title>
</head>

<body>
  <form>
    Nickname: <br><input type="text" name="nick"><br>
    E-mail: <br><input type="text" name="email"><br>
    Password: <br><input type="password" name="password1"><br>
    Repeat Password: <br><input type="password" name="password2"><br>
    <label>
      <input type="checkbox" name="terms">Accept terms and conditions<br>
    </label>
  </form>

</body>

</html>