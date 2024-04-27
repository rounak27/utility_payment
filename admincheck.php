<?php
   session_start();
  if (!isset($_SESSION['adminid'])) {
    $_SESSION['message'] = "You must be logged in to access this page";
    header("Location: adminloginpage.php");
    exit();
  }

  ?>
<?php
$host = "localhost";
$db = "kukl";
$username = "root";
$password = "";

// Establish a database connection
$conn = new mysqli($host, $username, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve customer registration requests
$query = "SELECT * FROM customer_registration";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="try.css">
    <script src="https://kit.fontawesome.com/2705d88985.js" crossorigin="anonymous"></script>

    <style>
          @import url('https://fonts.googleapis.com/css?family=Signika:400,700');       
    body{
        background-color: #f2f2f2;
        font-family: signika; 
        margin: 0px;
    }
    .container{
        width: 80%;
        margin: 0 auto;
    }
    table{
        background-color: white;
        border-radius: 5px;
        width: 100%;
        margin: 0 auto;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0,0,0,0.15);

    }
    </style>

</head>
<header>
  <img src="KUKL.jpg" width="500" height="120" class="center">
</header>
<?php include('adminnav.php');?>

<body>
    <div class="container">
    <h1>Customer Registration Requests</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Citizenship Document</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $customerId = $row['id'];
                        $firstName = $row['first_name'];
                        $lastName = $row['last_name'];
                        $address = $row['street_address'] . ', ' . $row['city'] . ', ' . $row['state'];
                        $phoneNumber = $row['phone_number'];
                        $citizenshipDocument = $row['citizenship_document'];
                        $status = $row['status'];

                        echo '<tr>';
                        echo '<td>' . $firstName . '</td>';
                        echo '<td>' . $lastName . '</td>';
                        echo '<td>' . $address . '</td>';
                        echo '<td>' . $phoneNumber . '</td>';
                        echo '<td><a href="citizenship_docs/' . $citizenshipDocument . '" target="_blank">View Document</a></td>';
                        echo '<td>' . $status . '</td>';
                        echo '<td><a href="approve.php?id=' . $customerId . '">Approve</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="7">No customer registration requests found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
