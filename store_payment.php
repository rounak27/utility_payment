<?php

// Get payment details from POST request
$username = $_POST["username"];
$amount = $_POST["amount"];

// Connect to database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert payment details into database
$sql = "INSERT INTO payments (username, amount) VALUES ('$username', '$amount')";
if ($conn->query($sql) === TRUE) {
  echo "Payment details stored successfully";
} else {
  echo "Error storing payment details: " . $conn->error;
}

// Close database connection
$conn->close();

?>
