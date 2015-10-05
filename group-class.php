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
  public function lookUp(){
    $sql_select = "SELECT * FROM group_tbl WHERE name = ".$this->name;
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll();
    if(count($registrants) > 0) {
      foreach($registrants as $registrant) {
          $this->setUID($registrant['gid']);
          $this->setName($registrant['name']);
      }
      return ;
    }
    else {
      $this->addToGroupTbl();
      return 0;
    }
  }

}

 ?>
