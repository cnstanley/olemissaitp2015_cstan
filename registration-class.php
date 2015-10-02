<?php
/**
 *
 */
class Registration
{

  public function addToDB($conn)
  {
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
        die(var_dump($e));
    }
    echo "<h3>Your're registered!</h3>";
  }

  public function showRegistrants($conn)
  {
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
  }
}


 ?>
