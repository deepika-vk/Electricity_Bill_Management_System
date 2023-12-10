<?php
include '../Config/Database.php';

// include '../Formater/Format.php'; 
$id=$_GET['delmetid'];
$sql="DELETE FROM users WHERE id=:id";
// $fm=new Format();

$db=new Database();
$conn=$db->connect();
 $stmt = $conn->prepare($sql);
      // Bind Param
      $stmt->bindParam(':id', $id);
      // Execute query
      if($stmt->execute()){
      	header("Location:../metterlist.php?success=DeleteSuccefully");
      }
      else{
      	   	header("Location:../metterlist.php?error=DontDelete");
      }



?>