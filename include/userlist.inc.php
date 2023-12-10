<?php  
// include 'include/header.php';
include 'Config/Database.php';
include 'Formater/Format.php';
$fm=new Format();
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
				<th scope="col">Email</th>
				<th scope="col">Password</th>
				<th scope="col">UserType</th>
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
	        	<td><?php echo $result['email'] ?></td>
				<td><?php echo $result['password'] ?></td>
				<td><?php echo $result['types'] ?></td>


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