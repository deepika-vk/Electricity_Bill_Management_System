<?php   

include 'include/header.php';
include 'Config/Database.php';
$id=$_GET['edituserid'];
$db=new Database();
$conn=$db->connect();
$sql="SELECT * FROM users WHERE id=:id";
$stmt=$conn->prepare($sql);
    $stmt->bindParam(':id', $id);

$stmt->execute();
    if($stmt->rowCount()>0) {
      // Get Result
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      ?>
      <!-- Edit users  -->

      <?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
   
   $name=$_POST['name'];
   $email=$_POST['email'];
   $address=$_POST['address'];
   $phone=$_POST['phone'];
   $password=$_POST['password'];
   $types=$_POST['types'];


    // echo $name;
    // echo $email;
    // echo $password;
    // echo $types;
    $sql1="UPDATE users SET name=:name,address=:address,phone=:phone,email=:email,password=:password,types=:types WHERE id=:id";
    $stmt=$conn->prepare($sql1);

      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':address', $address);
      $stmt->bindParam(':phone', $phone);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':types', $types);
      $stmt->bindParam(':id', $id);


     if($stmt->execute()) {

      header("Location:userlist.php?success=UpdateSuccessfully");

     }




 }





       ?>


 <div class="applycontainer">
        
    <form action="" method="post">
        <h3>Update users</h3>
        <label for="username">Name</label>
        <input type="text" value="<?php  echo $result['name']; ?>" id="username" name='name'>
        <label for="username">E-mail</label>
        <input type="text" value="<?php  echo $result['email']; ?>" id="username" name='email'>
        <label for="username">Address</label>
        <input type="text" value="<?php  echo $result['address']; ?>" id="username" name='address'>
        <label for="username">Phone</label>
        <input type="text" value="<?php  echo $result['phone']; ?>" id="username" name='phone'>

        <label for="username">Password</label>
        <input type="text" value="<?php echo $result['password']; ?>" id="username" name='password'>

        <label for="password">Types</label>
        <input type="text" value="<?php echo $result['types']; ?>" id="username"  name="types">



        <button type="submit" name="submit">Update users</button>
    </form>

    </div>



      <?php


  }


?>

<!-- 
   <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div> -->
   
    
    <?php 
    // include 'include/footer.php';
     ?>