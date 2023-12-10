<?php  include 'include/header.php' ?>

<?php 
// include 'Formater/Format.php';
// $imgformat=new  Format();

// if(isset($_POST['submit'])){
// 	$image=$_FILES['image'];
// 	// var_dump($image);
// 	$img=$imgformat->imgformat($image);
// 	var_dump($img[0]);
// 	echo $img[1];
// }
// session_start();
?>
<div class="container">
	<?php
		if(!$_SESSION){
	?>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Register and join us</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
				<li><a href="Applicationform.php" class="bg-primary"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
			</ul>
		</div>	               
	</nav>
	<h1>Welcome to our Electricty Bill Management System</h1><br>
	<p style="font-size:17px;"><strong>Illuminate Your Savings:</strong><br><br>Welcome to E-bill, where we light the way to effortless electricity bill management. Take control of your energy expenses, track usage patterns, and discover the power of savings with our user-friendly platform. Shine a brighter light on your financial well-being – start managing your electricity bills intelligently today!</p><br>
            <p style="font-size:17px;">Project by<br>
               Avani Acharya - 4NM21CS039<br>
               Deepika V K - 4NM21CS052</p><br>
            <p style="font-size:17px;">Under the guidance of,<br>
               Dr. Pradeep Kanchan<br>
               Asst. Professor<br>
               NMAM Institute of Technology<br>
               Nitte</p><br><br>
	<?php
			}else if($_SESSION['users']['types']=='admin'){
             echo "<h1>Welcome to  Admin page</h1>";
           }
           else if($_SESSION['users']['types']=='biller'){
    ?>
           	<!-- // START MITTER LISTS -->
    <?php  include 'include/meterlist.inc.php'; ?>;
           	<!-- // END MITTER LIST  -->
	<?php               
           }
           else if($_SESSION['users']['types']=='consumer'){
              echo "<h1> Welcome to Consumer page</h1>";              
               ?>
                <!-- Consumer page start  -->
                 <?php    
				 include 'include/consumer.inc.php'; 
				 ?>
	<?php
                 // Consumer page end 
           }
           else if($_SESSION['users']['types']=='manager'){

              echo "<h1> Welcome to Manager page</h1>";
           };
			?>
</div>
<?php 
 //include 'include/footer.php' 
?>


