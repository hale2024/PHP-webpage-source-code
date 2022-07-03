<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    die();
}

include "lib.profile.php";

$profile = get_profile($_SESSION["user"]);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CS492 Profile</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div class="login-panel">
      <h1 style="font-family: system-ui; color: black">Welcome <?=$_SESSION["user"]?></h1>
      <?php
      if ($profile == -1) {
          ?>
          <a href="profile.php?mode=create">Create Profile</a>
          <?php
      }
      else { 
          ?>
          <a href="profile.php?u=<?= $_SESSION["user"]?>">Go to my profile</a><br />
          <a href="profile.php?mode=remove">Remove my profile</a>
          <?php 
      }
      ?>
      <br /><a href="login.php?logout=1">Logout</a>
    </div>
  </body>
</html>
