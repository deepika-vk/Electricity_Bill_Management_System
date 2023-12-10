  <?php 
 include 'include/header.php';
include 'Config/Database.php';
include 'Formater/Format.php';
$db=new Database();
$conn=$db->connect();
if($_GET['reaplyid']){
   $id=$_GET['reaplyid'];

 $selectid=$_SESSION['user']['id'];
$sql="SELECT * FROM complain WHERE id=:id and reaply_status='1'";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute(); 
}else{
    $uid=$_GET['userid'];
}




 if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    // $email=$_POST['complain'];
    $reaply=$_POST['reaply'];
    $usid=$_POST['id'];
    $status='0';

    $sql1="INSERT INTO complain(user_id,email, complain, reaply_status) VALUES (:uid,:email,:complain,:status)";
    $sql2="UPDATE complain SET reaply_status='0' WHERE id=:usid";

    $stmt=$conn->prepare($sql1);
    $stmt2=$conn->prepare($sql2);
    $stmt2->bindParam(':usid',$usid);


    $stmt->bindParam(':uid',$uid);
    $stmt->bindParam(':email',$email);

    $stmt->bindParam(':complain',$reaply);
    $stmt->bindParam(':status',$status);

    if($stmt->execute() && $stmt2->execute() ){
        header("Location:complain.php?success=reaplySuccessfully");
    }else{
        header("Location:index.php?error=notreaply");
    }

        }





   ?>
<!-- 
   <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div> -->
    <div class="logcontainer" style="height: 120vh;">
          <?php
          while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
            // var_dump($result);
            ?>
      
    <form action="?userid=<?php echo $result['user_id']; ?>" method="post" style="height:800px;">
        <h3>Write complain</h3>




        <label for="username">ID</label>
        <input type="email" value="<?php echo $result['id']; ?>" id="username" name='id' readonly>
        <label for="username">E-mail</label>
        <input type="email" value="<?php echo $result['email']; ?>" id="username" name='email' readonly>



        <div class="mb-3">
         <label for="exampleFormControlTextarea1" class="form-label"> complain</label>
         <textarea style="background:black;" class="form-control text-dark bg-inverse" id="exampleFormControlTextarea1" rows="3" name="complain" readonly><?php echo $result['complain']; ?></textarea>
        </div>

        <div class="mb-3">
         <label for="exampleFormControlTextarea1" class="form-label">Reply messages</label>
         <textarea style="background:black;" class="form-control text-dark bg-inverse" id="exampleFormControlTextarea1" rows="3" name="reaply">Write...</textarea>
        </div>

        <button type="submit" name="submit">Send Reaply</button>
                    <?php
          }

         ?>
    </form>

    </div>

    
    <?php 


    // include 'include/footer.php';
     ?>