<?php

class Group{

  private $name;
  private $ID;

  public Group($n, $GID){
    $this->setName($n);
    $this->setID($GID);
  }
  public funtion getID(){
    return $this->GID;
  }
  public function setID($gid){
    $this->ID = $gid;
  }
  public function getName(){
    return $this->name;
  }
  public function setName($n){
    $this->name = $n;
  }
  public function addToGroupTbl(){
    try {
        // Insert data
        $sql_insert = "INSERT INTO group_tbl (name)
                       VALUES (?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $this->name);
        $stmt->execute();
        return true;
    }
    catch(Exception $e) {
        die(var_dump($e));
        return false;
    }
  }

}

 ?>
