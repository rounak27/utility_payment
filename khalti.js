var payButton = document.getElementById("pay-button");
payButton.addEventListener("click", function() {
  // Get customer meter reading from form
  var meterReading = document.getElementById("meter-reading").value;
  
  // Calculate bill amount based on meter reading
  var billAmount = calculateBillAmount(meterReading);
  
  // Get customer username from session
  var username = '<?php echo $_SESSION["username"]; ?>';
  
  // Initialize KhaltiCheckout object
  var config = {
    // Replace with your own public key
    "publicKey": "test_public_key_cb7220b67bdd46d68628346f991c52e8",
    "productIdentity": "1234567890",
    "productName": "Electricity Bill Payment",
    "productUrl": "http://example.com/electricity-bill-payment",
    "eventHandler": {
      onSuccess(payload) {
        // Payment successful, send payment details to PHP script
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "store_payment.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // Payment details stored successfully, redirect user to thank you page
            window.location.href = "thankyou.php";
          }
        };
        var data = "username=" + username + "&amount=" + billAmount;
        xhr.send(data);
      },
      onError(error) {
        // Payment failed, display error message to user
        alert("Payment failed: " + error);
      },
      onClose() {
        // Payment window closed by user, do nothing
      }
    }
  };
  var checkout = new KhaltiCheckout(config);
  
  // Open Khalti payment window
  checkout.show({amount: billAmount*100});
});
