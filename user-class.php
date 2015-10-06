<?php

class User{
  private $name;
  private $email;
  private $uid;
  public function User($name1, $email1){
    $this->setUser($name1, $email1);
  }
  public function getUID(){
    return $this->uid;
  }
  public function setUID($id){
    $this->uid = $id;
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
  private function addToUserTbl($conn){
    try {
        // Insert data
        $sql_insert = "INSERT INTO user_tbl (name, email)
                       VALUES (?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $this->name);
        $stmt->bindValue(2, $this->email);
        $stmt->execute();
        return $this->syncUser($conn);
    }
    catch(Exception $e) {
        die(var_dump($e));
        return false;
    }
  }

  // find Name and User ID and store
  public function syncUser($conn){
    $sql_select = "SELECT * FROM user_tbl WHERE email = "."'".$this->email."'";
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
      return $this->addToUserTbl($conn);
    }
  }
}

 ?>
