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
// DB connection info
$host = "us-cdbr-azure-southcentral-e.cloudapp.net";
$user = "b59e50473555e9";
$pwd = "26114531";
$db = "acsm_0e7ddff7b7d920f";
// Connect to database.
try {
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    //echo "<p> connected </p>";
}
catch(Exception $e){
    die(var_dump($e));
    //echo "<p> not connected... </p>";
}

// Add to DB
if(!empty($_POST)) {
try {
    $name = $_POST['name'];
    $email = $_POST['email'];
    // Insert data
    $sql_insert = "INSERT INTO user_tbl (name, email)
                   VALUES (?,?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $email);
    $stmt->execute();
}
catch(Exception $e) {
  $group = $_GET['competition'];
  foreach ($group as $cname){
  echo $cname."<br />";

  }
    //die(var_dump($e));
}
echo "<h3>Your're registered!</h3>";
}

$sql_select = "SELECT * FROM user_tbl";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll();
if(count($registrants) > 0) {
    echo "<h2>People who are registered:</h2>";
    echo "<table>";
    echo "<tr><th>Name</th>";
    echo "<th>Email</th>";
    foreach($registrants as $registrant) {
        echo "<tr><td>".$registrant['name']."</td>";
        echo "<td>".$registrant['email']."</td>";
    }
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}
?>
</body>
</html>
