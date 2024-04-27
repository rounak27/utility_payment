<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Supply Project - Homepage</title>
    <link  rel="stylesheet" href="./mainhome.css" >
    <link rel="stylesheet" href="./try.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://kit.fontawesome.com/2705d88985.js" crossorigin="anonymous"></script>
 <style>
    @import url('https://fonts.googleapis.com/css?family=Signika:400,700');
        /* Custom CSS for My Info page */
        body {
    padding: 20px;
    font-family: signika;   
     background-color: #f8f8f8;

}
header{
    background-color: #f8f8f8;
}

h1 {
    margin-bottom: 20px;
}
form{
    margin-left: 50px;
}

.search-box {
  display: inline-flex;
  border: 1px solid #ccc;
  border-radius: 4px;
  overflow: hidden;
}

.search-box input[type="text"] {
  padding: 8px;
  border: none;
  width: 200px;
}

.search-box button[type="submit"] {
  padding: 8px 12px;
  background-color: rgb(35,195,207);
  color: #fff;
  border: none;
  cursor: pointer;
}
.box{
  padding: 10px;
  margin:0 auto;
}

    </style>
 </head>
<body>
<header>
  
  <img src="KUKL.jpg" width="500" height="120" class="center">
</header>

<?php
   session_start();
  if (!isset($_SESSION['adminid'])) {
    $_SESSION['message'] = "You must be logged in to access this page";
    header("Location: adminloginpage.php");
    exit();
  }
  ?>
  <?php
include("adminnav.php")
?>
<div class="d-flex justify-content-center box">
  <form action="adminbillinghistory.php" method="post" >
<div class="search-box">
  <input type="text" placeholder="Search" name="cid">
  <button type="submit">Go</button>
</div>

</form>
</div>


<?php
include("footer.php")
?>
</body>
</html>