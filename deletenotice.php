<?php
// Assuming you have already established a database connection
$host = "localhost";
$db = "kukl";
$username = "root";
$password = "";
$conn = mysqli_connect($host, $username, $password, $db);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Get the notice ID from the request
    $noticeId = $_GET["id"];

    // Delete the notice from the database
    $query = "DELETE FROM notice WHERE id = '$noticeId'";
    if (mysqli_query($conn, $query)) {
        // Notice deleted successfully
        echo "Notice deleted successfully!";
    } else {
        // Failed to delete the notice
        echo "Error deleting notice: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
