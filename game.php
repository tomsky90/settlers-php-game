<?php

session_start();

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
  <?php

  echo "<p> Good to see you again  " . $_SESSION['user'] . "!</p>";
  echo "<p> <b>Wood:</b> " . $_SESSION['wood'];
  echo " | <b>Stone:</b> " . $_SESSION['stone'];
  echo " | <b>Grain:</b> " . $_SESSION['grain'] . "</p>";

  echo "<p> <b>E-mail: </b>" . $_SESSION['email'];
  echo "<br><b>Premium left:</b> " . $_SESSION['premium_left'] . "</p>";

  ?>

</body>

</html>