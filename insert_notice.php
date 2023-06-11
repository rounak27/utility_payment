<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kukl";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve values from the form
$title = $_POST['title'];
$content = $_POST['content'];

// Insert the notice data into the database
$query = "INSERT INTO notice (title, content, date) VALUES ('$title', '$content', NOW())";

if (mysqli_query($conn, $query)) {
    // Redirect to a success page or display a success message
    header("Location: adminpagenotice.php");
    exit;
} else {
    echo "Error inserting notice: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
