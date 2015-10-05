<?php

public class User{
  private $conn; //connection variable to access database
  private $name;
  private $email;
  private $uid;
  public User($name1, $email1){
    $this->setUser($name1, $email1);
    $this->lookupUser();
  }
  public function getUID(){
    return $this->uid;
  }
  public function setUID($id){
    $this->uid = $id;
  }
  public function setConn($c){
    $this->conn = $c;
  }
  private function setName($s){
    $this->name = $s;
  }
  public function getName(){
    return $this->name;
  }
  private function setEmail($s){
    $this->email = $s;
  }
  public function getEmail(){
    return $this->email;
  }
  public function setUser($n, $e){
    $this->setName($n);
    $this->setEmail($e);
  }
  public function addToUserTbl(){
    try {
        // Insert data
        $sql_insert = "INSERT INTO user_tbl (name, email)
                       VALUES (?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $this->name);
        $stmt->bindValue(2, $this->email);
        $stmt->execute();
        return $this->lookupUser();
    }
    catch(Exception $e) {
        die(var_dump($e));
        return false;
    }
  }

  // find Name and User ID and store
  public function lookupUser(){
    $sql_select = "SELECT * FROM user_tbl WHERE email = ".$this->email;
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll();
    if(count($registrants) > 0) {
      foreach($registrants as $registrant) {
          $this->setUID($registrant['userid']);
          $this->setName($registrant['name']);
      }
      return $this->getUID();
    }
    else {
      return $this->addToUserTbl();
    }
  }
}

 ?>
