
           	<?php  
include 'include/header.php';
include 'Config/Database.php';
include 'Formater/Format.php';
$fm=new Format();
$db=new Database();
$conn=$db->connect();
$sql="SELECT users.* ,meters.* FROM users INNER JOIN meters on users.id=meters.user_id WHERE users.types='consumer'";
$stmt=$conn->prepare($sql);
$stmt->execute();

?>
<div class="userlist">
	


	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">#</th>

				<th scope="col">Consumer Name</th>
				<th scope="col">Meter Name</th>

				<th scope="col">Action</th>
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
				<td><?php echo $result['meter_name'] ?></td>


				<?php
				$id++;


					?>
				    <td>
					<a href="Api/deletmeter.api.php?delmetid=<?php echo $result['user_id'] ?> "onclick="return confirm('Are you sure to Delete');">Delete</a></td>

					<?php
					echo "</tr>";
						};
			}
			?>


			</tbody>
		</table>
	</div>