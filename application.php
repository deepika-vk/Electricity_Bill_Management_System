<?php  
include 'include/header.php';
include 'Config/Database.php';
$db=new Database();
$conn=$db->connect();
$sql="SELECT * FROM application";
$stmt=$conn->prepare($sql);
$stmt->execute();

?>
<div class="userlist">
	<h4>Unseen application</h4>


	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Phone</th>				
				<th scope="col">E-mail</th>				
				<th scope="col">Password</th>				
				<th scope="col">Address</th>
				<th scope="col">Messages</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql="SELECT * FROM application WHERE  msg_status='1'";
			$stmt=$conn->prepare($sql);
			$stmt->execute();

			if($stmt->rowCount()>0) {
				$id=1;
      // Get Result
				while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
					// var_dump($result);
					?>

					<tr>
						<td><?php echo $id; ?></td>
						<td><?php echo $result['name'] ?></td>
						<td><?php echo $result['phone'] ?></td>
						<td><?php echo $result['email'] ?></td>
						<td><?php echo $result['password'] ?></td>
						<td><?php echo $result['address'] ?></td>
						<td><?php echo $result['message']; ?></td> 


						<?php
						$id++;
						?>
						<td>
							<a href="Api/upapplication.api.php?readid=<?php echo $result['id']; ?>">Read</a> ||
							<a href="Api/addapplicant.api.php?appid=<?php echo $result['id']; ?>">Add Consumer</a> ||
							<a href="Api/delapplication.api.php?deletid=<?php echo $result['id'] ?> "onclick="return confirm('Are you sure to Delete');">Delete</a></td>


							<?php
							echo "</tr>";
						};
					}
					?>


				</tbody>
			</table>



			<!-- ///////////////////////////////////////////////////////// -->
			<h4>Seen applicaiton</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Phone</th>
						<th scope="col">Address</th>
						<th scope="col">Messages</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql="SELECT * FROM application  WHERE  msg_status='0'";
					$stmt=$conn->prepare($sql);
					$stmt->execute();

					if($stmt->rowCount()>0) {
						$id=1;
      // Get Result
						while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
					// var_dump($result);
							?>

							<tr>
								<td><?php echo $id; ?></td>
								<td><?php echo $result['name'] ?></td>
								<td><?php echo $result['phone'] ?></td>
								<td><?php echo $result['address'] ?></td>
								<td><?php echo $result['message']; ?></td> 


								<?php
								$id++;
								?>
								<td>
									<a href="Api/delapplication.api.php?deletid=<?php echo $result['id'] ?> "onclick="return confirm('Are you sure you want to delete');">Delete</a></td>


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