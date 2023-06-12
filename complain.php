<?php
   session_start();
  if (!isset($_SESSION['Customerid'])) {
    $_SESSION['message'] = "You must be logged in to access this page";
    header("Location: loginpage.php");
    exit();
  }
    $host = "localhost";
    $db = "kukl";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($host, $username, $password, $db);
    $customerId = $_SESSION['Customerid']; // Assuming you have the customer ID in the session variable

    $query = "SELECT * FROM customer WHERE cid = '$customerId'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $customerData = mysqli_fetch_assoc($result);
    
        // Retrieve the customer information
        $name = $customerData['cname'];
        $phone = $customerData['phone'];
    } else {
        // Handle the case when customer data is not found
        $name = "";
        $phone = "";
    }
    
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complain</title>
    <link rel="stylesheet" href="./mainhome.css">
    <link rel="stylesheet"href="./try.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://kit.fontawesome.com/2705d88985.js" crossorigin="anonymous"></script>
 <style>
  @import url('https://fonts.googleapis.com/css?family=Signika:400,700');       

body{
        background-color: #f2f2f2;
        font-family: signika; 
        margin: 0px;
        padding: 0px;
    }
div.main{
    width: 1000px;
    margin: 100px auto 0px auto;
}
h2{
    text-align: center;
    padding: 20px;
    font-family: signika;
}
div.Meter{
    background-color:white;
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid #ccc;
    color: #333;
    margin:10px
    }    
form{
        margin: 40px;
    }
input#previous{
    width: 300px;
}    
input#current{
    width: 300px;
}    

    </style>

</head>
<body>
<header class="header">
  
  <img src="KUKL.jpg" width="500" height="120" class="center">
</header>
<?php
include("nav.php")
?>
    
        <div class="main">
        <div class="Meter">
            <h2>Report your Complain</h2>
            <form method="post" action="submitcomplain.php">
    <label>Full Name:</label><br>
    <input type="text" name="name" id="name" placeholder="Ram" style="width:800px" value="<?php echo $name; ?>"><br><br>
    <label>Customer ID:</label><br>
    <input type="number" name="cid" id="cid" placeholder="9999" style="width:800px" value="<?php echo $customerId; ?>"><br><br>
    <label>Phone Number:</label><br>
    <input type="number" name="pnum" id="pnum" placeholder="988888888" style="width:800px" value="<?php echo $phone; ?>"><br><br>
    <label>Address:</label><br>
    <input type="text" name="add" id="add" placeholder="Kathmandu-5" style="width:800px"><br><br>
    <label for="issue">Issue:</label><br>
    <textarea id="issue" name="issue" placeholder="Write something.." style="height:200px; width:800px"></textarea><br>
    <input type="submit" value="Submit">
</form>

        </div>
        </div>


<?php
include("footer.php")
?>
</body>
</html>