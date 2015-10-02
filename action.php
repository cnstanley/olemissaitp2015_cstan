<html>
<title>Action</title>

<?php

$name = $_POST['competion'];

if(isset($_POST['competition'])) {
  echo 'you chose';
  foreach ($name as $c){
  echo $c."<br />";

  }
}
else {
  echo 'error getting competitions';
}
 ?>

</html>
