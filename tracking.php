<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Tracking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #f2f2f2;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<center><header>
    <img src="KUKL.jpg" width="500" height="120" class="center">
  </header></center>
    <div class="container">
        <h1>Customer Tracking</h1>

        <form action="tracking.php" method="GET">
            <div class="form-group">
                <label for="tracking-id">Enter Tracking ID:</label>
                <input type="text" name="tracking-id" id="tracking-id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
        if (isset($_GET['tracking-id'])) {
            $host = "localhost";
            $db = "kukl";
            $username = "root";
            $password = "";
            $trackingID = $_GET['tracking-id'];

            $conn = new mysqli($host, $username, $password, $db);

            // Query the database to fetch customer details based on tracking ID
            $query = "SELECT * FROM customer_registration WHERE tracking_id = '" . $trackingID . "'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                // Display customer details in a table
                $row = $result->fetch_assoc();
        ?>
                <h2>Customer Details</h2>
                <table class="table">
                    <tr>
                        <th>Tracking ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td><?php echo $row['tracking_id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['street_address'] . ', ' . $row['city'] . ', ' . $row['state']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td><?php echo $row['email_address']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                </table>
        <?php
                $result->free();
            } else {
                echo '<p>No customer found with the provided tracking ID.</p>';
            }

            $conn->close();
        }
        ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
