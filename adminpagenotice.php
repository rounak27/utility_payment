<head><link rel="stylesheet" href="try.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    form {
        margin: 0 auto;
        width: 800px;
    }
</style>
</head>


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

<main class="bg-light py-5">
    <section class="notice-board">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Notice Board</h2>
                </div>
             <div class="col-lg-12 text-center">
                             <a href="createnotice.php" class="btn btn-primary">Create</a>
            </div>
        </div>
           

            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-group">
                        <?php
                        // Assuming you have already established a database connection
                        $host = "localhost";
                        $db = "kukl";
                        $username = "root";
                        $password = "";
                        $conn = mysqli_connect($host, $username, $password, $db);
                        
                        // Retrieve the notices from the database
                        $query = "SELECT * FROM notice";
                        $result = mysqli_query($conn, $query);

                        // Check if any notices are found
                        if (mysqli_num_rows($result) > 0) {
                            // Loop through each notice and display it
                            while ($row = mysqli_fetch_assoc($result)) {
                                $noticeId = $row['id'];
                                $noticeTitle = $row['title'];
                                $noticeDate = $row['date'];
                                $noticeDesc = $row['content'];

                                // Output the notice HTML
                                echo '<li class="list-group-item">';
                                echo '<h4 class="card-title text-primary">' . $noticeTitle . '</h4>';
                                echo '<p class="notice-date">' . $noticeDate . '</p>';
                                echo '<p class="notice-desc">' . $noticeDesc . '</p>';
                                echo '<div class="btn-group">';
                                echo '<a href="deletenotice.php?id=' . $noticeId . '" class="btn btn-danger">Delete</a>';
                                echo '</div>';
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
include("adminnav.php")
?>