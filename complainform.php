  <?php 
 include 'include/header.php';
include 'Config/Database.php';
include 'Formater/Format.php';
$db=new Database();
$conn=$db->connect();
 $selectid=$_SESSION['user']['id'];
$sql="SELECT * FROM users WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$selectid);
$stmt->execute();



 if($_SERVER['REQUEST_METHOD']=='POST'){
     $id=$_SESSION['user']['id'];
     $name=$_SESSION['user']['name'];
     $email=$_SESSION['users']['email'];
     $address=$_SESSION['users']['address'];
    $phone=$_SESSION['users']['phone'];
    $complain=$_POST['complain'];
    $sql1="INSERT INTO complain( user_id, name, email,phone, address, complain) VALUES (:id,:name,:email,:phone,:address,:complain)";
    $stmt=$conn->prepare($sql1);
    $stmt->bindParam(':id',$id);

    $stmt->bindParam(':name',$name);

    $stmt->bindParam(':email',$email);

    $stmt->bindParam(':address',$address);

    $stmt->bindParam(':phone',$phone);

    $stmt->bindParam(':complain',$complain);
    if($stmt->execute()){
        header("Location:complainyour.php?success=complainedSendSuccessfully");
    }else{
        header("Location:index.php?error=occurssomeproblem");
    }

        }





   ?>
<!-- 
   <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div> -->
    <div class="logcontainer">
        
    <form action="" method="post">
        <h3>Write complain</h3>
        <?php
          while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
            ?>



        <label for="username">E-mail</label>
        <input type="email" value="<?php echo $result['email']; ?>" id="username" name='email' readonly>

            <?php
          }

         ?>


        <div class="mb-3">
         <label for="exampleFormControlTextarea1" class="form-label">Write complain</label>
         <textarea style="background:black;" class="form-control text-dark bg-inverse" id="exampleFormControlTextarea1" rows="3" name="complain">Write...</textarea>
        </div>

        <button type="submit" name="submit">Send Message</button>
    </form>

    </div>

    
    <?php include 'include/footer.php'; ?>