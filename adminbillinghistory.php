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
     
header{
    background-color: #f8f8f8;
}

h1 {
    margin-bottom: 20px;
}
body{
    background-color: #f8f8f8;
    font-family: signika;
}

.billing-record {
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 10px;
    margin-left:50px;
    margin-top: 20px;
    background-color: white;
}

.billing-date {
    font-weight: bold;
    margin-bottom: 5px;
}

.billing-reading,
.billing-amount {
    margin-bottom: 3px;
}
.nobilling-reading{
    margin-left: 50px;
    margin-top: 20px;
    color: red;
}

.billing-amount {
    color: green;
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


<?php
// Database connection parameters
$host = "localhost";
$db = "kukl";
$username = "root";
$password = "";

// Get customer ID from POST data
$cid = isset($_POST['cid']) ? $_POST['cid'] : null;

// Check if the customer ID is provided
if ($cid === null) {
    echo '<div class="nobilling-reading">Customer ID is missing.</div>';
    exit();
}

// Create a database connection
$conn = new mysqli($host, $username, $password, $db);

// Check if the database connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the customer ID exists
$query = "SELECT * FROM customer WHERE cid = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $cid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch billing history data for the specific customer (cid) in ascending order by date
    $query = "SELECT * FROM billing WHERE cid = ? ORDER BY date ASC LIMIT 12";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any billing records
    if ($result->num_rows > 0) {
        $previousReading = 0; // Variable to store the previous reading

        while ($row = $result->fetch_assoc()) {
            // Extract the data from each row
            $date = $row['date'];
            $reading = $row['meter_reading'];
            $amount = $row['Amount'];

            // Calculate units consumed
            $unitsConsumed = $reading - $previousReading;

            // Update the previous reading for the next iteration
            $previousReading = $reading;

            // Display the data dynamically within the HTML structure
            echo '<div class="col-lg-12">';
            echo '<div class="billing-record">';
            echo '<div class="billing-date">' . $date . '</div>';
            echo '<div class="billing-details">';
            echo '<div class="billing-reading">Current Meter Reading: ' . $reading . ' units</div>';
            echo '<div class="billing-units">Units Consumed: ' . $unitsConsumed . ' units</div>';
            echo '<div class="billing-amount">Amount: Rs. ' . $amount;
            if ($amount == 100) {
                echo '(Minimum Charge)';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<div class="nobilling-reading">No billing history found.</div>';
    }
} else {
    echo '<div class="nobilling-reading">Invalid Customer ID.</div>';
}

// Close the database connection
$stmt->close();
$conn->close();
?>


<?php
include("footer.php")
?>
</body>
</html>