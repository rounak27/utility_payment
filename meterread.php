
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Supply Project - Homepage</title>
    <link  rel="stylesheet" href="./mainhome.css" >
    <link rel="stylesheet" href="./try.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://kit.fontawesome.com/2705d88985.js" crossorigin="anonymous"></script>
 <style >
  @import url('https://fonts.googleapis.com/css?family=Signika:400,700');
        
   .header{
    background-color: #f8f8f8;
   }
    body{
    background-color: #f8f8f8;
    font-family:signika;
}
div.main{
    width: 400px;
    margin: 100px auto 0px auto;
    
}
h2{
    text-align: center;
    padding: 20px;
    font-size: 30px;
    font-weight: bold;
  }
div.Meter{
    background-color: white;
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid #ccc;
    color: black;
    padding :20px
    }    
    #current_reading{
      border-radius: 25px;
    }
   
</style>
 </head>
<body>
<header class="header">
  
  <img src="KUKL.jpg" width="500" height="120" class="center">
</header>

<?php 
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kukl";
// $servername="sql102.hyperphp.com";
// 	$username="hp_34232806";
// 	$password="9860113658";
// 	$db="hp_34232806_kukl";
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
if (!isset($_SESSION['Customerid'])) {
  $_SESSION['message'] = "You must be logged in to access this page";
  header("Location: loginpage.php");
  exit();
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

  
$customerId = $_SESSION["Customerid"];
// Get previous reading from database
$sql = "SELECT meter_reading FROM billing WHERE cid = '$customerId' ORDER BY date DESC LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $previous_reading = $row['meter_reading'];
} 
else
  $previous_reading=0;
echo'<div class="main"><h2>Bill Calculation</h2>';  
echo'<div class="meter">Previous Reading:'.$previous_reading;
echo'<form method="post" action="billcalc.php" id="farm">
<label for="current_reading">Enter Current Reading:</label>
<input type="number" id="current_reading" name="current_reading" required><br><br>
<button type="submit"class="btn btn-primary">Calculate Bill</button>
</form></div></div>'
?>


<?php
include("nav.php")
?>
    
<br><br>
<?php
include("footer.php")
?>




  

