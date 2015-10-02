<html>
<title>Action</title>

<form method="POST" action="action.php" enctype="multipart/form-data">
  <fieldset><legend>Personal information</legend>
    Name:<br>
    <input type="text" name="name"  id="name">
    <br>
    Email:<br>
    <input type="text" name="email" id="email">
  </fieldset>
  <fieldset><legend>Competitions</legend>
    <input type="checkbox" name="competion[]" id="competition" value="ncc"> National Collegiate Competition<br>
    <input type="checkbox" name="competion[]" id="competition" value="regionals"> Regionals<br>
  </fieldset>
  <fieldset><legend>Focus Groups</legend>
    <input type="checkbox" name="group[]" id="group" value="business analytics"> Business Analytics<br>
    <input type="checkbox" name="group[]" id="group" value="database design"> Database Design<br>
    <input type="checkbox" name="group[]" id="group" value="microsoft office"> Microsoft Office<br>
    <input type="checkbox" name="group[]" id="group" value="mobile applications"> Mobile Applications<br>
    <input type="checkbox" name="group[]" id="group" value="network design"> Network Design<br>
    <input type="checkbox" name="group[]" id="group" value="pc troubleshooting"> PC Troubleshooting/Support<br>
    <input type="checkbox" name="group[]" id="group" value="security"> Security<br>
    <input type="checkbox" name="group[]" id="group" value="system analysis"> System Analysis & Design<br>
  </fieldset>
  <input type="submit" name="submit" value="Submit">
</form>

<?php

$name = $_POST['competion'];

if(isset($_POST['competition'])) {
  echo 'you chose:<br />';
  foreach ($name as $c){
  echo $c."<br />";

  }
}
else {
  echo 'error getting competitions';
}
 ?>

</html>
