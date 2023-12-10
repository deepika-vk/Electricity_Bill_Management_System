<?php
include '../Config/Database.php';
// include '../models/Users.php';

include '../Formater/Format.php';
$fm=new Format();
$db=new Database();
$conn=$db->connect();
 // $users = new Users($db);

if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$pass=$_POST['password'];
  if(empty($email)||empty($pass)){
    header("Location: loginform.php?error=emptyinputfield");

  }else{
    $email=$fm->validation($email);
    $pass=$fm->validation($pass);


    $query = "SELECT * FROM users WHERE email =:email AND password = :pass;";
          // Prepare statement
      $stmt = $conn->prepare($query);
      // Bind Param
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':pass', $pass);
 



      // Execute query
      $stmt->execute();

    // Valid Login
    // echo $stmt->rowCount();
    if($stmt->rowCount()>0) {
      // Get Result
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      
      // Set session for user
      session_start();
      $_SESSION['user']['id'] = $result['id'];
      $_SESSION['user']['name'] = $result['name'];
      $_SESSION['users']['email'] = $result['email'];
      $_SESSION['users']['address'] = $result['address'];
      $_SESSION['users']['phone'] = $result['phone'];
      $_SESSION['users']['password'] = $result['password'];
      $_SESSION['users']['types'] = $result['types'];
      header("Location:../index.php?success=loginSuccessfully");
    }

}}else{
	header("Location: login.php?error=plzlogin");


}
 


 ?>