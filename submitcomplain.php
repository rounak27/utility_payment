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

// Retrieve the form data
$name = $_POST['name'];
$cid = $_POST['cid'];
$phone = $_POST['pnum'];
$address = $_POST['add'];
$issue = $_POST['issue'];

// Insert the form data into the "complain" table
$query = "INSERT INTO complain (name, cid, phone, address, issue) VALUES ('$name', '$cid', '$phone', '$address', '$issue')";

if (mysqli_query($conn, $query)) {
    // Success message or redirect to a success page
    echo "Complaint submitted successfully!";
    // header("Location: success.php");
} else {
    // Error message or redirect to an error page
    echo "Error submitting complaint: " . mysqli_error($conn);
    // header("Location: error.php");
}

// Close the database connection
mysqli_close($conn);
?>
