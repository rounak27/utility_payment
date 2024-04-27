<head>
    <style>
        .sucessmsg{
            color: green;
        }
    </style>
</head>
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

// Retrieve the form data
$firstName = $_POST['first-name'];
$lastName = $_POST['last-name'];
$streetAddress = $_POST['street-address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipCode = $_POST['zip-code'];
$country = $_POST['country'];
$citizenshipId = $_POST['citizenship-id'];
$phoneNumber = $_POST['phone-number'];
$emailAddress = $_POST['email-address'];
$areYouOwner = $_POST['are-you-the-owner'];

$signature = isset($_POST['signature']) ? 1 : 0;
$date = $_POST['date'];
$status = 'Not Approved';

// Check if the file field is present and handle the file upload
if (isset($_FILES['citizenship-document']) && $_FILES['citizenship-document']['error'] === UPLOAD_ERR_OK) {
    $citizenshipDocument = $_FILES['citizenship-document']['name'];
    $targetDir = "citizenship_docs/";
    $targetFilePath = $targetDir . basename($citizenshipDocument);
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['citizenship-document']['tmp_name'], $targetFilePath)) {
        // File upload successful
    } else {
        echo "Error uploading citizenship document.";
        exit();
    }
} else {
    echo "Citizenship document not provided.";
    exit();
}

// Prepare the SQL statement
$trackingID = 'KUKL-' . generateRandomString(4);

// Insert data into the database
$sql = "INSERT INTO customer_registration (first_name, last_name, street_address, city, state, zip_code, country, citizenship_id, phone_number, email_address, are_you_owner, citizenship_document, signature, date, status,tracking_id) VALUES ('$firstName', '$lastName', '$streetAddress', '$city', '$state', '$zipCode', '$country', '$citizenshipId', '$phoneNumber', '$emailAddress', '$areYouOwner',  '$citizenshipDocument', '$signature', '$date', '$status','$trackingID')";


// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "<div clas='sucessmsg'>Customer registration data stored successfully. Tracking id is:<b> " . $trackingID . "</b>(Do not Lost this number).<br><a href='tracking.php'>Click here to track your application</a></div>";
} else {
    echo "Error storing customer registration data: " . $conn->error;
}

// Close the database connection
$conn->close();
// Generate a random string of specified length
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>
