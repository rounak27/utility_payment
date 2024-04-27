<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Supply Project - Homepage</title>
    <link  rel="stylesheet" href="./mainhome.css" >
    <link rel="stylesheet" href="./try.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://kit.fontawesome.com/2705d88985.js" crossorigin="anonymous"></script>
 <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
 </head>
<body>
<header class="header">
  <img src="KUKL.jpg" width="500" height="120" class="center">
</header>
<style>
                @import url('https://fonts.googleapis.com/css?family=Signika:400,700');

   .header{
    background-color: #f8f8f8;
   }
                body{
    background-color: #f8f8f8;
    font-family:signika;
}
div.main{
    width: 400px;
    margin: 100px auto 0px auto;
}
h2{
    text-align: center;
    padding: 20px;
    font-family: sans-serif;
}
div.Meter{
    background-color:white;
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid #ccc;
    color: black;
    padding :20px
    }    
   
</style>

    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kukl";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    if (isset($_POST['current_reading'])) {
        // Get current reading from user input
        $current_reading = $_POST['current_reading'];
        $customerId = $_SESSION["Customerid"];

        // Get previous reading from the database
        $sql = "SELECT meter_reading FROM billing WHERE cid = '$customerId' ORDER BY date DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $previous_reading = $row['meter_reading'];
        } else {
            $previous_reading = 0;
        }

        if ($current_reading < $previous_reading) {
            echo "Error: Invalid meter reading. Please enter a valid reading.";
            echo '<a href="index.html">Back to enter reading</a>';
            exit();
        }

     // Calculate units consumed
     $units_consumed = $current_reading - $previous_reading;

     // Calculate bill amount
     if ($units_consumed < 500) {
         $bill_amount = 100;
     } else {
         $extra_units = $units_consumed - 500;
         $bill_amount = 100 + ceil($extra_units / 500) * 125;
     }
        // Display bill amount
        echo '<div class="main"><h2>Your Total Bill</h2>';
        echo '<div class= "Meter"';
        echo "Previous Reading: " . $previous_reading . "<br>";
        echo "Units Consumed: " . $units_consumed . "<br>";
        echo "Your bill amount is: Rs." . $bill_amount;
        echo'<br><img src="khalti.png" width="100" height="50">';
        echo '<br><button id="payment-button">Pay with Khalti</button>
        <div id="success-message" style="display: none;color:green ">Payment Successful! Meter reading inserted successfully.</div>';
        echo '</div></div>';
    }
    ?>
    <?php
include("nav.php")
?>

    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_cb7220b67bdd46d68628346f991c52e8",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
            ],
            "eventHandler": {
                onSuccess(payload) {
                    // Insert billing data into the database after successful payment
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log(this.responseText);
                            document.getElementById("success-message").style.display = "block";
        
                        }
                    }; 
                    xmlhttp.open("GET", "insert_reading.php?customerId=<?php echo $customerId; ?>&currentReading=<?php echo $current_reading; ?>&billAmount=<?php echo ($bill_amount); ?>", true);
                    xmlhttp.send();     
                    console.log(payload);
                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // Minimum transaction amount must be 10, i.e., 1000 in paisa.
            checkout.show({ amount: <?php echo ($bill_amount*10); ?> });
        }
    </script>
    <?php
include("footer.php")
?>
</body>
</html>
