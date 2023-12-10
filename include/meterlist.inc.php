
           	<?php  
// include 'include/header.php';
include 'Config/Database.php';
include 'Formater/Format.php';
$fm=new Format();
$db=new Database();
$conn=$db->connect();
$sql="select users.*,meters.*,bill_details.* from users, meters,bill_details where users.id = meters.user_id and meters.id = bill_details.meter_id and users.types='consumer' ORDER by bill_details.Date DESC ;";
$stmt=$conn->prepare($sql);
$stmt->execute();

?>
<div class="userlist">
	


	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">#</th>

				<th scope="col">Consumer Name</th>
				<th scope="col">E-mail</th>
				<th scope="col">Meter ID</th>
				<th scope="col">Meter Name</th>
				<th scope="col">Total Unit</th>
				<th scope="col">Total Bill</th>
				<th scope="col">Billing Date</th>
			</tr>
		</thead>
		<tbody>
			<?php

			if($stmt->rowCount()>0) {
				$id=1;
      // Get Result
				while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
					// var_dump($result);
					?>

					<tr>
	        	<td><?php echo $id; ?></td>
	        	<td><?php echo $result['name'] ?></td>
	        	<td><?php echo $result['email'] ?></td>
	        	<td><?php echo $result['meter_id'] ?></td>
				<td><?php echo $result['meter_name'] ?></td>
				<td><?php echo $result['total_unit']; ?></td> 
				<td><?php echo $result['total_bill']; ?></td> 

				<td><?php echo $fm->DateFormat($result['Date']);  ?></td> 


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