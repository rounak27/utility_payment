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

// Retrieve the customer ID from the URL parameter
$customerId = $_GET['id'];

// Update the status to "Approved"
$query = "UPDATE customer_registration SET status = 'Approved' WHERE id = $customerId";
$result = $conn->query($query);

if ($result === TRUE) {
    echo "Customer registration request approved successfully.";
} else {
    echo "Error approving customer registration request: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
