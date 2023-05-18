<?php
	$uname = $_POST['uname'];
	$pass =$_POST['pass'];
	$host="localhost";
	$username="root";
	$password="";
	$db="kukl";

	$conn = mysqli_connect($host, $username,$password,$db);
	if(!$conn){
		echo("Error while connection");
	}else{
		$query ="SELECT * FROM customer where mobnumber = '".$uname."' and password = '".$pass."';";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0){
			header("Location: alt.html");
		}else{
			header("Location: llandingpage.html");
		}
		
	}

?>