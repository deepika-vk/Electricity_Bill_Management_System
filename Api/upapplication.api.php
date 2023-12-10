<?php
include '../Config/Database.php';

// include '../Formater/Format.php'; 
$id=$_GET['readid'];
$sql="UPDATE application SET msg_status='0' WHERE id=:id";
// $fm=new Format();

$db=new Database();
$conn=$db->connect();
 $stmt = $conn->prepare($sql);
      // Bind Param
      $stmt->bindParam(':id', $id);
      // Execute query
      if($stmt->execute()){
      	header("Location:../application.php?success=msgread");
      }
      else{
      	   	header("Location:../application.php?error=dontread");
      }



?>