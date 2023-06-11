<?php
session_start();
	$cusid = $_POST['cid'];
	$passw =$_POST['pass'];
	$host="localhost";
	$db="kukl";
	$username="root";
	$password="";
	// $host="sql102.hyperphp.com";
	// $username="hp_34232806";
	// $password="9860113658";
	// $db="hp_34232806_kukl";
	$conn = mysqli_connect($host, $username,$password,$db);
	if(!$conn){
		echo("Error while connection");
	}else{
		$query ="SELECT * FROM customer where cid = '".$cusid."' and pass= '".$passw."';";
		$result = mysqli_query($conn,$query);
		
		if(mysqli_num_rows($result)>0){
            $_SESSION['Customerid'] = $cusid;
		//	$sql="SELECT cname from customer where cid='".$cusid."';";
		//$res=mysqli_query($conn,$sql);
		foreach($result as $r)
		{
			$_SESSION['Customername']= $r["cname"];
			$_SESSION['Customerphone']= $r["phone"];
		}
           
			header("Location: home.php");
		}else{
            $_SESSION['message'] = "Invalid username or password";
            header("Location: loginpage.php");
          
			// echo "<script>alert('Username or password is incorrect. Please try again.'); window.location.href = 'loginpage.php';</script>";
		
		}
		
	}

?>

