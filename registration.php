
<?php


	$host="localhost";
	$db="kukl";
	$username="root";
	$password="";
	$db="kukl";
	// $host="sql102.hyperphp.com";
	// $username="hp_34232806";
	// $password="9860113658";
	// $db="hp_34232806_kukl";
  $customerId = $_POST["custid"];
$customerName = $_POST["custname"];
$phoneNumber = $_POST["mobnum"];
$pass = $_POST["passw"];
$confirmPassword = $_POST["cpassw"];
	$conn = mysqli_connect($host, $username,$password,$db);
	if(!$conn){
		echo("Error while connection");
	}
  else
  {
		$query = "INSERT INTO customer (cid, cname, pass, phone) VALUES ( '$customerId', '$customerName', '$pass', '$phoneNumber')";
		if(mysqli_query($conn,$query))
    {
      echo'Customer registered Sucessfully!<a href="loginpage.php">Back to Login</a>';
    }
    else{
      echo' Customer not registerd';
    }
		
		
		
	}


?>


