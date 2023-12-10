<?php
include '../Config/Database.php';

// include '../Formater/Format.php'; 
$id=$_GET['deletid'];
$sql="DELETE FROM application WHERE id=:id";
// $fm=new Format();

$db=new Database();
$conn=$db->connect();
 $stmt = $conn->prepare($sql);
      // Bind Param
      $stmt->bindParam(':id', $id);
      // Execute query
      if($stmt->execute()){
      	header("Location:../application.php?success=DeleteSuccefully");
      }
      else{
      	   	header("Location:../application.php?error=DontDelete");
      }



?>