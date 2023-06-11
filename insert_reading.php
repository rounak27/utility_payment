<?php
// Connect to the database
$servername = "localhost";
$username = "root1";
$password = "root";
$dbname = "kukl";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get parameters from the URL
$customerId = $_GET['customerId'];
$currentReading = $_GET['currentReading'];
$billAmount = $_GET['billAmount'];

// Insert billing data into the database
$query = "INSERT INTO billing (cid, meter_reading, date, amount) VALUES ('$customerId', '$currentReading', NOW(), '$billAmount')";

if ($conn->query($query) === TRUE) {
    header("Location: thankyou.html");
}
     else {
    echo "Error inserting meter reading: " . $conn->error;
}

// Close database connection
$conn->close();
?>
