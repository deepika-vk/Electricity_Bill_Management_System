<?php include 'include/header.php'; 
include 'Config/Database.php';
include 'Formater/Format.php';
$db=new Database();
$conn=$db->connect();
$fm=new Format();
// $sql="SELECT meters.* FROM users INNER JOIN meters ON users.id = meters.user_id WHERE users.types='consumer';";
// $stmt=$conn->prepare($sql);
// $stmt->execute();
if($_SERVER['REQUEST_METHOD']=='POST'){
	$meterid=$_POST['meterid'];
	$unit=$_POST['unit'];
	$sql="INSERT INTO bill_details( meter_id, total_unit, total_bill) VALUES (:meter_id,:total_unit,:total_bill)";
    // $sql1="SELECT id FROM meters WHERE meter_name=$;"
      $bill=$fm->BillCalculate($unit);

      // echo $meterid;
      // echo $unit;
      // echo $bill;

	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':meter_id',$meterid);
	$stmt->bindParam(':total_unit',$unit);
	$stmt->bindParam(':total_bill',$bill);
	if($stmt->execute()){
 
		 $last_id = $conn->lastInsertId();
	   $sql1="INSERT INTO transactions(bill_id) VALUES (:bill_id)";
	   $stmt=$conn->prepare($sql1);
	   $stmt->bindParam(':bill_id',$last_id);
	   $stmt->execute();
		header("Location:index.php?success=billAddSuccessfully");
	}
	else{
		header("Location:billentry.php?error=error");
	}

}



?>

<div class="signup-form">
	<form action="" method="post" class="form-horizontal">
		<div class="row">
			<div class="col-8 offset-4">
				<h2>Add Consumer Bill</h2>
			</div>	
		</div>			
		<div class="form-group row">
			<label class="col-form-label col-4">MeterID</label>
<!-- 			<div class="col-8">
				<input type="text" class="form-control" name="meterid" required="required">
			</div>  -->
			<div class="col-8">
				<select class="form-select" aria-label="Default select example" name="meterid">
			  <option selected>Select MeterID</option>
				<?php
				$sqll="SELECT * from meters";
				$stmt2=$conn->prepare($sqll);
				if($stmt2->execute()){
							while($res = $stmt2->fetch(PDO::FETCH_ASSOC)){
								// var_dump($result);
								?>
						  <option value="<?php echo $res['id']; ?>"><?php echo $res['meter_name']; ?></option>


								<?php




							}


				}
				

				 ?>



		

			</select>
			</div>

	</div>        	
	<div class="form-group row">
		<label class="col-form-label col-4">Total Unit</label>
		<div class="col-8">
			<input type="text" class="form-control" name="unit" required="required">
		</div>        	
	</div>
	<div class="form-group row">
		<!-- <label class="col-form-label col-4">Total Unit</label> -->
		<div class="col-8">
			<button type="submit" class="btn btn-primary btn-lg">Add Bill</button>
		</div>        	
	</div>		      
</form>
</div>
<?php include 'include/footer.php'; ?>