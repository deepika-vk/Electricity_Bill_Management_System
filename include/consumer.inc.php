  	<?php  
// include 'include/header.php';
include 'Config/Database.php';
include 'Formater/Format.php';
$fm=new Format();
$db=new Database();
$conn=$db->connect();
 $id=$_SESSION['user']['id'];

$sql="SELECT meters.*,bill_details.*,transactions.* FROM meters INNER JOIN bill_details on meters.id=bill_details.meter_id INNER JOIN transactions on bill_details.id=transactions.bill_id WHERE meters.user_id=:id;";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);

// var_dump($result = $stmt->fetch(PDO::FETCH_ASSOC));
// echo "<h4>Your meter_id is =>".$result = $stmt->fetch()['meter_name']."  "."</h4>";
echo "<h4>Your Users_name is =>".$_SESSION['user']['name']."  "."</h4>";
?>
<div class="userlist">
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Meter name</th>
				<th scope="col">Total Unit</th>
				<th scope="col">Total Bill</th>
				<th scope="col">Billing Date</th>
				<th scope="col">Payment Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// echo $id;
			if($stmt->execute()) {
				$id=1;
      // Get Result
				while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
					?>

					<tr>
	        	<td><?php echo $id; ;?></td>
	        	<td><?php echo $result['meter_name']; ?></td>
	        	<td><?php echo $result['total_unit']; ?></td> 
				<td><?php echo $result['total_bill']; ?></td> 
				<td><?php echo $fm->DateFormat($result['Date']);  ?></td>
                   <td>
               <?php
               if($result['payment_status']=='1'){
               	?>
            	<a class="btn-primary" href="Api/payment.api.php?paymentid=<?php echo $result['bill_id'] ?> "onclick="return confirm('Are you sure to pay?');">Payment</a></td>
               	<?php
               }
               else{
               	?>
               <a class="btn-success" disabled>Payment Successful</a></td>
               	<?php 
               }
                ?>
				<?php
				$id++;
					?>

					<?php
					echo "</tr>";
						};
			}
			?>
			</tbody>
		</table>
	</div>