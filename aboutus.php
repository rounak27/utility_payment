<?php
   session_start();
  if (!isset($_SESSION['Customerid'])) {
    $_SESSION['message'] = "You must be logged in to access this page";
    header("Location: loginpage.php");
    exit();
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Supply Project - Homepage</title>
    <link  href="mainhome.css" rel="stylesheet">
    <link href="try.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://kit.fontawesome.com/2705d88985.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Signika:400,700');
        body {
            padding: 20px;
            font-family: signika;
            background-color: #f8f8f8;
        }
        /* Custom CSS */
        .container {
            margin-top: 50px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

       
        /* footer css */
        footer{
            background-color: rgba(22, 34, 123, 0.5);
        }

        .container {
            margin-top: 50px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .company-image {
            width: 300px;
            height: 100px;
        }

        
    </style>
</head>
<body>
<header>
  
  <img src="KUKL.jpg" width="500" height="120" class="center">
</header>
<?php
include("nav.php")
?>
    
    <!-- About Us Content -->
    <div class="container">
        <h1>About Us</h1>
        
        <p>Kathmandu Upatyaka Khanepani Limited (KUKL) is the government-owned water supply authority responsible for supplying clean and safe drinking water to the residents of Kathmandu Valley. With a mission to ensure a reliable and sustainable water supply system, KUKL strives to meet the growing water demands of the rapidly urbanizing region.</p>
        <p>At KUKL, we are committed to providing high-quality water services to our customers. We continuously work on improving infrastructure, implementing advanced technologies, and promoting water conservation practices. Our dedicated team of professionals ensures efficient water distribution, accurate billing, and timely customer support.</p>
    </div>

    <?php
include("footer.php")
?>
</body>
</html>







