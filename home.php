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
body{
 background-color: #f8f8f8;
 font-family:signika;
}
.header{
  
 background-color: #f8f8f8;
}

 </style>
 </head>
<body>
<header class="header">
  <img src="KUKL.jpg" width="200" height="120" class="center">
</header>

<?php
   session_start();
  if (!isset($_SESSION['Customerid'])) {
    $_SESSION['message'] = "You must be logged in to access this page";
    header("Location: loginpage.php");
    exit();
  }
  ?>
  <?php
include("nav.php")
?>

    <!-- card-title text-primary -->
    <main class="bg-light py-5">
    <section class="notice-board">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Notice Board</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-group">
                        <?php
                        // Assuming you have already established a database connection
                        $host="localhost";
                          $db="kukl";
                          $username="root";
                          $password="";
                          // $host="sql102.hyperphp.com";
                          // $username="hp_34232806";
                          // $password="9860113658";
                          // $db="hp_34232806_kukl";
	                      $conn = mysqli_connect($host, $username,$password,$db);
                        // Retrieve the notices from the database
                        $query = "SELECT * FROM notice";
                        $result = mysqli_query($conn, $query);

                        // Check if any notices are found
                        if (mysqli_num_rows($result) > 0) {
                            // Loop through each notice and display it
                            while ($row = mysqli_fetch_assoc($result)) {
                                $noticeTitle = $row['title'];
                                $noticeDate = $row['date'];
                                $noticeDesc = $row['content'];

                                // Output the notice HTML
                                echo '<li class="list-group-item">';
                                echo '<h4 class="card-title text-primary">' . $noticeTitle . '</h4>';
                                echo '<p class="notice-date">' . $noticeDate . '</p>';
                                echo '<p class="notice-desc">' . $noticeDesc . '</p>';
                                echo '</li>';
                            }
                        } else {
                            // No notices found
                            echo '<li class="list-group-item">No notices found.</li>';
                        }

                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

    <?php
include("footer.php")
?>
</body>
</html>
