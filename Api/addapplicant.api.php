<?php
include '../Config/Database.php';
// include '../models/Users.php';

include '../Formater/Format.php';

$fm=new Format();

$db=new Database();
$conn=$db->connect();
 // $users = new Users($db);

if(isset($_GET['appid'])){
  $uid=$_GET['appid'];
  $sql1="SELECT * FROM application WHERE id=:uid";
  $stmt=$conn->prepare($sql1);
  $stmt->bindParam(":uid",$uid);
  if($stmt->execute()){
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($result);
    $name=$result['name'];
    $phone=$result['phone'];
    $address=$result['address'];
    $email=$result['email'];
    $pass=$result['password'];
    $type="consumer";
  }



  if(empty($email)||empty($pass)||empty($type) || empty($name)||empty($phone)||empty($address)){
    header("Location: loginform.php?error=emptyinputfield");

  }else{
    $name=$fm->validation($name);
    $phone=$fm->validation($phone);
    $address=$fm->validation($address);
    $email=$fm->validation($email);
    $pass=$fm->validation($pass);
    $type=$fm->validation($type);
    // echo $name;
    // echo $phone;
    // echo $address;
    // echo $email;
    // echo $pass;
    // echo $type;


    $query = "INSERT INTO users(name,address,phone,email, password, types) VALUES (:name,:address,:phone,:email,:pass,:types)";
          // Prepare statement
    $stmt = $conn->prepare($query);
      // Bind Param
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $pass);

    $stmt->bindParam(':types', $type);


    if($type=='consumer'){
      if($stmt->execute()){
        $userid=$conn->lastInsertId();
        $metername="meter".$userid;
        $sql1="INSERT INTO meters( user_id, meter_name) VALUES (:uid,:mname)";
        $stmt=$conn->prepare($sql1);
        $stmt->bindParam(':uid',$userid);
        $stmt->bindParam(':mname',$metername);
        $stmt->execute();
        header("Location: ../application.php?success=addUserSuccessfully");
      };
    }else{
     if($stmt->execute()){
      header("Location: ../application.php?success=addUserSuccessfully");
    };

  }

      // Execute query


}
}else{
	header("Location: ../application.php?error=somethingwrong");


}



?>