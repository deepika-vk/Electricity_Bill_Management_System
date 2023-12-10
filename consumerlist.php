
           	<?php  
include 'include/header.php';
include 'Config/Database.php';
include 'Formater/Format.php';
$fm=new Format();
$db=new Database();
$conn=$db->connect();
$sql="SELECT * FROM users WHERE types='consumer'";
$stmt=$conn->prepare($sql);
$stmt->execute();

?>
<div class="userlist">
	


	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">#</th>

				<th scope="col">Consuer Name</th>

				<th scope="col">E-mail</th>
				<th scope="col">Address</th>
				<th scope="col">phone</th>
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
				<td><?php echo $result['address'] ?></td>
				<td><?php echo $result['phone'] ?></td>


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