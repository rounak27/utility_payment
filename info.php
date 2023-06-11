<?php 
session_start();
  if (!isset($_SESSION['Customerid'])) {
    $_SESSION['message'] = "You must be logged in to access this page";
    header("Location: loginpage.php");
    exit();
  }
?>


<html>
<head>
<title>My Info</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"href="./try.css">
    <link  rel="stylesheet" href="./mainhome.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://kit.fontawesome.com/2705d88985.js" crossorigin="anonymous"></script>
    <style>
            @import url('https://fonts.googleapis.com/css?family=Signika:400,700');

        body{
    background-color: #f8f8f8;
    font-family: signika;
        }
        .myinfo-container {
            padding: 40px;
            
        }
        .profile{
            margin-left: 40px;
            font-size: 24;
            font-weight: bold;
        }
        .details{
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: white;
            padding: 5px;
            margin-left: 40px;
            width: 50%;
            
            
        }
       
        .myinfo-title {
            font-size: 30px;
            font-weight: bold;
            margin-left: 40px;
        }

        .myinfo-details {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .myinfo-label {
            font-weight: bold;
           
            display: inline-block;
        }
        .center{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
    </style>
</head>
<body>
<div class="logo">
  <img src="KUKL.jpg" width="500" height="120" class="center">
</div>
<?php
include("nav.php")
?>
    <div class="container myinfo-container">
        <h1 class="myinfo-title"><u>My Info</u></h1><br><br>
        <h2 class="profile">Profile<h2>
        <div class="details">
            <div class="col-md-6">
                <div class="myinfo-details">
                    <span class="myinfo-label">Name:</span>
                    <span id="name"><?php echo $_SESSION['Customername'];?>   </span>
                </div>
                <div class="myinfo-details">
                    <span class="myinfo-label">Customerid:</span>
                    <span id="address"><?php echo $_SESSION['Customerid'];?> </span>
                </div>
                <div class="myinfo-details">
                    <span class="myinfo-label">Phone Number:</span>
                    <span id="phoneNumber"><?php echo $_SESSION['Customerphone'];?></span>
                </div>
            </div>
        </div> 
        <br><br>
        <h2 class="profile">Details</h2>
        <div class="details">   
            <div class="col-md-6">
                <div class="myinfo-details">
                    <span class="myinfo-label">Connection Type:</span>
                    <span id="connectionType">Residential</span>
                </div>
               
            </div>
    </div>
        <!-- Add more details as needed -->
        <?php
include("footer.php")
?></body>
</html>

       

  