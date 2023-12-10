<?php  
include 'include/header.php';
include 'Config/Database.php';
$db=new Database();
$conn=$db->connect();
$sql="SELECT * FROM users";
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
				
				<th scope="col">Password</th>
				<th scope="col">Type</th>
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
				<td><?php echo $result['password'] ?></td>
				<td><?php echo $result['types']; ?></td> 


				<?php
				$id++;
					?>
                   <td>
					<a href="edituser.php?edituserid=<?php echo $result['id']; ?>">Edit</a> ||
					<a href="deletuser.php?deletuserid=<?php echo $result['id'] ?> "onclick="return confirm('Are you sure to Delete');">Delete</a></td>


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