<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page in Online KUKL</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./loginpage
.css">

</head>
<body>
<div class="box-form">
	<div class="left">
		<div class="overlay">
        <img src="https://kathmanduwater.org/wp-content/uploads/2017/03/kukl_logo.png" alt="" srcset=""/>
		<h1> Welcome to online KUKL </h1>
		<p>This is online portal of the Kathmandu Upatyaka Khanepani Limited</p>
		<p>Login or register to explore the services directly from own hand.</p>
		</div>
	</div>
		<div class="right">
		<h5>Login</h5>
<p> <a href="registration.html">Create Your Online Account</a>||<a href="customer_registration.html">Be the New customer of KUKL?</a> ||<a href="adminloginpage.php">Emolpyee Login</a> </p>
<br>
	<a href="tracking.php">Tracking Information</a> 
		<form method="post"  action="login.php" >
			<div class="inputs">
			<input type="text" placeholder="Customer id*" name="cid" id="customer-id" > 
			<br>
			<input type="password" placeholder="Password*"  name="pass" id="password" >
		</div>
			<br>
			
         <?php
            session_start();
            if (isset($_SESSION['message'])) {
            echo "<div class='error'>" . $_SESSION['message'] . "</div>";
			
            unset($_SESSION['message']);
            }
            ?>
            <br>
			<br>
			<input type="submit" value="Login" />
		</form>
	</div>
</div>  
</body>
</html>
