<?php

include "lib.user.php";

session_start();

if(isset($_SESSION["user"])) {
    header("Location: index.php");
    die();
}

if(isset($_POST["userid"]) && isset($_POST["password"])) {
  $check = register($_POST["userid"], $_POST["password"]);
  if ($check == 0) {
    echo "<script>alert('Successfully Registerd'); location.href='login.php';</script>";
    die();
  }
  else {
    echo "<script>alert('Register failed');</script>";
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div class="login-panel">
      <h1 style="font-family: system-ui; color: black">Register</h1>
      <form method="POST">
        <p><input class="input-field" type="text" name="userid" placeholder="User ID" required></p>
        <p><input class="input-field" type="password" name="password" placeholder="Password" required></p>
        <p><input class="input-button" type="submit" value="Register"></p>
      </form>
    </div>
  </body>
</html>
