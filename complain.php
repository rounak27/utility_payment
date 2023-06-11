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
    <title>Complain</title>
    <link rel="stylesheet" href="./mainhome.css">
    <link rel="stylesheet"href="./try.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://kit.fontawesome.com/2705d88985.js" crossorigin="anonymous"></script>
 <style>
div.main{
    width: 1000px;
    margin: 100px auto 0px auto;
}
h2{
    text-align: center;
    padding: 20px;
    font-family: sans-serif;
}
div.Meter{
    background-color: rgba(211, 215, 245,0.5);
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid black;
    color: black;
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
            <form>
                <label>Full Name:</label><br>
                <input type="text" name="name" id="name" placeholder="Ram" style="width:800px"><br><br>
                <label>Customer id:</label><br>
                <input type="number" name="cid" id="cid" placeholder="9999" style="width:800px"><br><br>
                <label>Phone Number</label><br>
                <input type="number" name="pnum" id="pnum" placeholder="988888888" style="width:800px"><br><br>
                <label>Address</label><br>
                <input type="text" name="add" id="add" placeholder="Kathmandu-5" style="width:800px"><br><br>
                <label for="issue">Issue</label><br>
                <textarea id="issue" name="issue" placeholder="Write something.." style="height:200px ; width:800px"></textarea><br>
                <input type="submit" value="Submit">
                            
            </form>

        </div>
        </div>


<?php
include("footer.php")
?>
</body>
</html>