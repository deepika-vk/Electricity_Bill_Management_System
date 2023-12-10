<?php  
include 'include/header.php';
include 'Config/Database.php';
$db=new Database();
$conn=$db->connect();
$sql="SELECT * FROM complain WHERE reaply_status='1'";
$stmt=$conn->prepare($sql);
$stmt->execute();

?>
<div class="userlist">
	


	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">#</th>

				<th scope="col">Name</th>
				
				<th scope="col">E-mail</th>
				
				<th scope="col">Phone</th>
				<th scope="col">Address</th>
				<th scope="col">Complain</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php

			if($stmt->rowCount()>0) {
				$id=1;
      // Get Result
				while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
					?>

					<tr>
	        	<td><?php echo $id; ?></td>
	        	<td><?php echo $result['name'] ?></td>
	        	<td><?php echo $result['email'] ?></td>
				<td><?php echo $result['phone'] ?></td>
				<td><?php echo $result['address'] ?></td>
				<td><?php echo $result['complain'] ?></td>


				<?php
				$id++;
					?>
                   <td>
					<a href="reaply.php?reaplyid=<?php echo $result['id']; ?>"; >Reply</a> 
					</td>


					<?php
					echo "</tr>";
						};
			}
			?>


			</tbody>
		</table>
	</div>

	<?php 

	// include 'include/footer.php';

?>