<?php
// Establish a database connection
$host = "localhost";
$db = "kukl";
$username = "root";
$password = "";
$conn = mysqli_connect($host, $username, $password, $db);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Retrieve the complaints from the "complain" table
$query = "SELECT * FROM complain";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Complaints</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="try.css">
    <script src="https://kit.fontawesome.com/2705d88985.js" crossorigin="anonymous"></script>

    <style>
      @import url('https://fonts.googleapis.com/css?family=Signika:400,700');       
    body{
        background-color: #f2f2f2;
        font-family: signika; 
        margin: 0px;
        padding: 20px;
         }
        .container{
            margin-top: 50px;
        }
        
    </style>

</head>
<header>
  <img src="KUKL.jpg" width="500" height="120" class="center">
</header>

<?php include('adminnav.php');?>

<body>
    <div class="container">
    <div class="col-lg-12 text-center">
                    <h2>VIEW COMPLAIN</h2>
                </div>
        
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Customer ID</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Issue</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['cid'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['issue'] . "</td>";
                        echo "<td>" . $row['timestamp'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No complaints found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
