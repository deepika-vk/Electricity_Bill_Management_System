<?php
 include "../Config/Database.php";
 $db= new Database();
 $conn=$db->connect();
 // var_dump($conn); 
 $sql="INSERT INTO students(name, photo) VALUES (:name,:photo)";
 // $conn->exec($sql);
  // $conn->exec($sql);
  // $last_id = $conn->lastInsertId();
  // echo "New record created successfully. Last inserted ID is: " . $last_id;
 
// $sql= "SELECT * FROM 'students'";
 $sql="SELECT * FROM students";
 $stmt=$conn->prepare($sql);
 // $stmt->bindParam(":name",$name);
 // $stmt->bindParam(":photo",$photo);
 // $name="Razin";
 // $photo="razin";
 $stmt->execute();
 echo $stmt->rowCount();
 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
 	 echo $row['name'];
 }



 ?>