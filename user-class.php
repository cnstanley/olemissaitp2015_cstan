<?php

public class User{
  private $conn; //connection variable to access database
  private $name;
  private $email;
  public User($name1, $email1){
    $this->setUser($name1, $email1);
  }
  public setConn($c){
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
        return true;
    }
    catch(Exception $e) {
        die(var_dump($e));
        return false;
    }
  }
}

 ?>
