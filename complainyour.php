<?php  
include 'include/header.php';
include 'Config/Database.php';
$db=new Database();
$conn=$db->connect();
$email=$_SESSION['users']['email'];
// echo $email;
$sql="SELECT * FROM complain WHERE email=:email";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':email',$email);
$stmt->execute();

?>
<div class="userlist">
	


	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">#</th>

				<th scope="col">messages</th>
				
				<th scope="col">Reply type</th>
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
	        	<td><?php echo $result['complain'] ?></td>

	        	<?php
	        	if($result['reaply_status']=='1'){

           ?>
			<td style="color:green;">Your complain</td>

           <?php 
	        	}
	        	else{
	        		?>

		<td  style="color:blue;">Reaply</td> 
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

	<?php 

	include 'include/footer.php';

?>