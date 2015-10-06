<?php
/**
 *
 */
class Registration
{
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
            echo "<td>".$registrant['email']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>No one is currently registered.</h3>";
    }
  }

  public function signUp($user, $group, $conn){
    try {
        echo "<br>GroupID = ".$group->getID()." UID = ".$user->getUID()."</br>";
        // Insert data
        $sql_insert = "INSERT INTO signed_up_tbl (GID, UID)
                       VALUES (?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $group->getID());
        $stmt->bindValue(2, $user->getUID());
        $stmt->execute();
    }
    catch(Exception $e) {
        die(var_dump($e));
    }
  }
}


 ?>
