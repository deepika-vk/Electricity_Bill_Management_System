<?php
include '../Config/Database.php';
$db=new Database();
$conn=$db->connect();
if(isset($_GET['paymentid'])){
	$id=$_GET['paymentid'];
    echo $id;
   $sql="UPDATE bill_details , transactions SET bill_details.total_bill='0',transactions.payment_status='0' WHERE bill_details.id=:bilid AND transactions.bill_id=:id;";
   $stmt=$conn->prepare($sql);
   $stmt->bindParam(':bilid',$id);
   $stmt->bindParam(':id',$id);
   // $stmt->execute();
   if($stmt->execute()){
   	 header("Location:../index.php?success=PaymentSuccessfully");

   }

}
else{
header("Location:../index.php?payment=Cantpayment");
}




 ?>