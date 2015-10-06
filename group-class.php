<?php

class Group{
  private $name;
  private $ID;

  public function Group($n){
    $this->setName($n);
  }

  public function getID(){
    return $this->GID;
  }

  public function getName(){
    return $this->name;
  }

  public function setName($n){
    $this->name = $n;
  }

  public function addToGroupTbl($conn){
    try {
        // Insert data
        $sql_insert = "INSERT INTO group_tbl (name)
                       VALUES (?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $this->name);
        $stmt->execute();
        return $this->syncGroup($conn);
    }
    catch(Exception $e) {
        die(var_dump($e));
        return false;
    }
  }
  public function syncGroup($conn){
    $sql_select = "SELECT * FROM group_tbl WHERE name = "."'".$this->name."'";
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
      return $this->addToGroupTbl($conn);

    }
  }

}

 ?>
