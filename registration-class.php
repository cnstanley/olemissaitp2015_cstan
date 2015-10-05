<?php
/**
 *
 */
class Registration
{

  public function addToUserTbl($conn, $name, $email)
  {
    try {
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
    echo "<h3>You're Signed Up!</h3>";
  }

  public function addToSignedUpTbl($conn, $name, $group)
  {
    try {
        // Insert data
        $sql_insert = "INSERT INTO signed_up_tbl (gname, uname)
                       VALUES (?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $group);
        $stmt->bindValue(2, $name);
        $stmt->execute();
    }
    catch(Exception $e) {
        die(var_dump($e));
    }
  }

  public function addMemberToDb($conn, $name, $email){
    //needs to be tested
    try {
      $sql_insert = "INSERT INTO user_tbl (name, email)
                     VALUES (?,?)";
      $stmt = $conn->prepare($sql_insert);
      $stmt->bindValue(1, $name);
      $stmt->bindValue(2, $email);
      $stmt->execute();
    } catch (Exception $e) {
      die(var_dump($e));
    }
  }
  public function addMemberToGroup($conn, $email, $group){
    //needs to be tested
    try {
      $sql_insert = "INSERT INTO group_tbl (email, gname)
                     VALUES (?,?)";
      $stmt = $conn->prepare($sql_insert);
      $stmt->bindValue(1, $email);
      $stmt->bindValue(2, $group);
      $stmt->execute();
    } catch (Exception $e) {
      die(var_dump($e));
    }
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
            echo "<td>".$registrant['email']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>No one is currently registered.</h3>";
    }
  }
  public function showGroups($conn){
    //needs to be tested
    $sql_select = "SELECT * FROM group_tbl";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll();
    if(count($registrants) > 0) {
        echo "<h2>Groups with people registered:</h2>";
        echo "<table>";
        echo "<tr><th>Name</th>";
        echo "<th>Email</th>";
        foreach($registrants as $registrant) {
            echo "<tr><td>".$registrant['email']."</td>";
            echo "<td>".$registrant['gname']."</td></tr>";//group column name?
        }
        echo "</table>";
    } else {
        echo "<h3>No one is currently registered.</h3>";
    }
  }

  public function signUp($user, $group){
    $userExists = false;

    $sql_select = "SELECT email FROM user_tbl WHERE email = ".$user->getEmail();
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll();
    if(count($registrants) > 0) {
        $userExists = true;
    }

    // if user not in user_tbl
    if ($userExists !== true){
      $user->addToUserTbl();
    }

    //find User ID
    $sql_select = "SELECT userid FROM user_tbl WHERE email = ".$user->getEmail();
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll();
    if(count($registrants) > 0) {
      foreach($registrants as $registrant) {
          $user->setUID($registrant['userid']);
      }
    }

    //find Group ID
    //find User ID
    $sql_select = "SELECT userid FROM group_tbl
    WHERE group_name = ".$group->getGroup_Name();
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll();
    if(count($registrants) > 0) {
      foreach($registrants as $registrant) {
          $user->setUID($registrant['userid']);
      }
    }
  }
}


 ?>
