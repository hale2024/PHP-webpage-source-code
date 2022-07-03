<?php 
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    die();
}

include "lib.profile.php";

$mode = $_GET["mode"] ?? "read";
$user = $_GET["u"] ?? $_SESSION["user"];

if($mode == "create") {
  $check = create($_SESSION["user"]);
  if ($check == 0) 
    echo "<script>alert('Successfully Created'); location.href='index.php';</script>";
  else 
    echo "<script>alert('Creation failed'); location.href='index.php';</script>";
  die();
}
else if($mode == "remove") {
  $check = remove($_SESSION["user"]);
  if ($check == 0)
    echo "<script>alert('Successfully Removed'); location.href='index.php';</script>";
  else
    echo "<script>alert('Remove failed'); location.href='index.php';</script>";
  die();
}

$profile = get_profile($user);
if($profile == -1) {
  echo "<script>alert('Profile not exists'); location.href='index.php';</script>";
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$user?>'s Profile</title>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container">
    <!-- You have to edit here -->
    <div class="left card">
        <img src="images/free-portrait.jpg" style="width:100%">
        <h1><?=$profile["profile_name"]?></h1>
        <p class="school">KAIST</p>
        <p><button id="contact">Contact</button></p>
    </div>
    <div class="right card">
      <div>
        <h2>Private Info</h1>
        <p class="category">Introduction</p>
        <p class="information"><?=$profile["profile_bio"]?></p>
        <p class="category">Home Address</p>
        <p class="information">291 Daehak-ro, Yuseong-gu, Daejeon, Korea</p>
        <p class="category">Phone Number</p>
        <p class="information">010-XXX-XXXX</p>
        <p class="category">Fake Portal ID</p>
        <p class="information">iamthebest</p>
        <p class="category">Fake Password</p>
        <p class="information">kaist1234</p>
      </div>
    </div>
  </div>
</body>
</html>




