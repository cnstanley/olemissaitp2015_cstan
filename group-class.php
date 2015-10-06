<?php

class Group{
  private $conn;
  private $name;
  private $ID;
  private $conn;

  public Group($n){
    $this->setName($n);
  }

  public funtion getID(){
    return $this->GID;
  }

  public function getName(){
    return $this->name;
  }

  public function setName($n){
    $this->name = $n;
  }

  public function setConn($c){
    $this->conn = $c;
  }

  public function addToGroupTbl(){
    try {
        // Insert data
        $sql_insert = "INSERT INTO group_tbl (name)
                       VALUES (?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $this->name);
        $stmt->execute();
        return $this->syncGroup;
    }
    catch(Exception $e) {
        die(var_dump($e));
        return false;
    }
  }
  public function syncGroup(){
    $sql_select = "SELECT * FROM group_tbl WHERE name = ".$this->name;
    $stmt = $conn->query($sql_select);
    $groups = $stmt->fetchAll();
    if(count($groups) > 0) {
      foreach($groups as $group) {
          $this->setID($group['groupid']);
          $this->setName($group['group_name']);
      }
      return $this->getID();
    }
    else {
      return $this->addToGroupTbl();

    }
  }

}

 ?>
