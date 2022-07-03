<?php

include "lib.user.php";

session_start();
if(isset($_GET["logout"])) {
  session_destroy();
}

if(isset($_POST["userid"]) && isset($_POST["password"])) {
  $check = login($_POST["userid"], $_POST["password"]);
  if ($check == 0) {
    $_SESSION["user"] = $_POST["userid"];
  }
  else {
    echo "<script>alert('Login failed');</script>";
  }
}

if(isset($_SESSION["user"])) {
  header("Location: index.php");
  die();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div class="login-panel">
      <h1 style="font-family: system-ui; color: black">Login</h1>
      <form method="POST">
        <p><input class="input-field" type="text" name="userid" placeholder="User ID" required></p>
        <p><input class="input-field" type="password" name="password" placeholder="Password" required></p>
        <p><small><a href="./register.php">Don't have account?</a></small></p>
        <p><input class="input-button" type="submit" value="Login"></p>
      </form>
    </div>
  </body>
</html>
