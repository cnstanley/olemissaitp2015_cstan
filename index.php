<html>
<head>
<Title>Registration Form</Title>
<style type="text/css">
    body { background-color: #fff; border-top: solid 10px #000;
        color: #333; font-size: .85em; margin: 20; padding: 20;
        font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
    }
    h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
    h1 { font-size: 2em; }
    h2 { font-size: 1.75em; }
    h3 { font-size: 1.2em; }
    table { margin-top: 0.75em; }
    th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
    td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style>
</head>
<body>
<h1>Register here!</h1>
<p>Fill in your name and email address, then click <strong>Submit</strong> to register.</p>
<form method="POST" action="index.php" enctype="multipart/form-data">
  <fieldset><legend>Personal information</legend>
    Name:<br>
    <input type="text" name="name"  id="name">
    <br>
    Email:<br>
    <input type="text" name="email" id="email">
  </fieldset>
  <fieldset><legend>Competitions</legend>
    <input type="checkbox" name="check_list[]" value="National Collegiate Competition"> National Collegiate Competition<br>
    <input type="checkbox" name="check_list[]" value="Regionals"> Regionals<br>
  </fieldset>
  <fieldset><legend>Focus Groups</legend>
    <input type="checkbox" name="check_list[]" value="Database Design"> Database Design<br>
    <input type="checkbox" name="check_list[]" value="Microsoft Office"> Microsoft Office<br>
    <input type="checkbox" name="check_list[]" value="Mobile Applications"> Mobile Applications<br>
    <input type="checkbox" name="check_list[]" value="Network Design"> Network Design<br>
    <input type="checkbox" name="check_list[]" value="PC Troubleshooting/Support"> PC Troubleshooting/Support<br>
    <input type="checkbox" name="check_list[]" value="Security"> Security<br>
    <input type="checkbox" name="check_list[]" value="System Analysis & Design"> System Analysis & Design<br>
  </fieldset>
  <fieldset><legend>Other</legend>
    <input type="checkbox" name="check_list[]" value="Website"> Website<br>
  </fieldset>
  <input type="submit" name="submit" value="Submit">
</form>
<?php
session_start();
require ('conntodb.php');
include ('registration-class.php');
include ('user-class.php');
include ('group-class.php');

if(!isset ($_SESSION['conn'])){
  $_SESSION['conn'] = $conn;
}
else {
    $conn = $_SESSION['conn'];
}
$Registration = new Registration();

// Add to DB
if(!empty($_POST)) {
/*attempt at using user class to save to db
  $user = new User($_POST['name'],$_POST['name']);
  $user->setConn($conn);
  if (!$user->saveToDB())
    echo 'error: user->saveToDB()';
*/

$user = new User($_POST['name'],$_POST['email']);
$user->syncUser($conn);

  if(!empty($_POST['check_list'])) {
      foreach($_POST['check_list'] as $gname) {
              $group = new Group($gname);
              $group->syncGroup($conn);
              $Registration->signUp($user, $group, $conn);
      }
  }
}

$Registration->showRegistrants($conn);
?>
</body>
</html>
