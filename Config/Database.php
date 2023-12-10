<?php
class Database{
  private $servername = "localhost:3306";
  private $username = "root";
  private $password = "";
  private $db_name="electricity_bill_system";
  private $conn;
  public  function connect(){
    try {
      $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db_name."", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
    }
    return $this->conn;

  }
}



?>