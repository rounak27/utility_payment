<?php
	$uname = $_POST['uname'];
	$pass =$_POST['pass'];
	$host="localhost";
	$db="kukl";
	$username="root";
	$password="";
	// $db="kukl";
	// $host="sql102.hyperphp.com";
	// $username="hp_34232806";
	// $password="9860113658";
	// $db="hp_34232806_kukl";
	$conn = mysqli_connect($host, $username,$password,$db);
	if(!$conn){
		echo("Error while connection");
	}else{
		$query ="SELECT * FROM customer where mobnumber = '".$uname."' and password = '".$pass."';";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0){
			header("Location: alt.html");
		}else{
			echo "<script>alert('Username or password is incorrect. Please try again.'); window.location.href = 'login.html';</script>";
			
		}
		
	}

?>