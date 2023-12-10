<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Electricity Bill Management System</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="Assets/css/style.css">
</head>
<body style="background-color:rgb(136, 213, 241);">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Electricity Bill Management System</a>
      </div>
      <ul class="nav navbar-nav">
        <!-- <li class=""><a href="#">Home</a></li> -->
        <?php
           session_start();
           // echo $_SESSION['users']['types'];

           if(!$_SESSION){
            echo "<li><a href='#'>About</a></li> <li><a href='#'>Contact</a></li></ul>";
            echo "<ul class='nav navbar-nav navbar-right'>" ;
            echo "  <li><a href='#'><span ></span>I am Guest</a></li>";
            echo "  <li><a href='loginform.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
           }
           else if($_SESSION['users']['types']=='admin'){

        echo "<li><a href='metterlist.php'>Meter List</a></li> <li><a href='userlist.php'>User List</a></li><li><a href='application.php'>New Application</a></li><li><a href='complain.php'>Complaints</a></li><li><a href='addusers.php' class='bg-primary'>Add Users</a></li></ul>";
            echo "<ul class='nav navbar-nav navbar-right'>" ;
                 echo "  <li><a href='#'><span ></span>I am"." ". $_SESSION['users']['types']."</a></li>";
            echo "  <li><a href='Api/logout.php'><span class='glyphicon glyphicon-log-in'></span>  Logout</a></li>";
           }
           else if($_SESSION['users']['types']=='biller'){
        echo "<li><a href='billentry.php' class='bg-primary'>Entry Bill</a></li></ul>";
            echo "<ul class='nav navbar-nav navbar-right'>" ;
                 echo "  <li><a href='#'><span ></span>I am"." ". $_SESSION['users']['types']."</a></li>";
           echo "  <li><a href='Api/logout.php'><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>";    
           }
           else if($_SESSION['users']['types']=='consumer'){
        echo "<li><a href='complainyour.php'>Your Complaints</a></li><li class='bg-primary'><a href='complainform.php'>Complain</a></li></ul>";
            echo "<ul class='nav navbar-nav navbar-right'>" ;

                 echo "  <li><a href='#'><span ></span>I am"." ". $_SESSION['users']['types']."</a></li>";
              echo "  <li><a href='Api/logout.php'><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>";
              
           }
           else if($_SESSION['users']['types']=='manager'){
        echo "<li><a href='metterlist2.php'>Meter lists</a></li> <li><a href='consumerlist.php'>Consumer Details</a></li></ul>";
            echo "<ul class='nav navbar-nav navbar-right'>" ;
                 echo "  <li><a href='#'><span ></span>I am"." ". $_SESSION['users']['types']."</a></li>";
             echo "  <li><a href='Api/logout.php'><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>";
           };
         ?>
<!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      </ul>
    </div>
  </nav>