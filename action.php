
<title>Action</title>

<form action="action.php" method="post">
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
<input type="submit" />
</form>
<?php
if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
            echo $check;
            //insert sql here.
            //$check is the group name
    }
}
?>

</html>
