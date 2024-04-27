function validateForm() {
    var firstName = document.getElementById("first-name").value;
    var lastName = document.getElementById("last-name").value;
    var streetAddress = document.getElementById("street-address").value;
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    var zipCode = document.getElementById("zip-code").value;
    var country = document.getElementById("country").value;
    var citizenshipId = document.getElementById("citizenship-id").value;
    var phoneNumber = document.getElementById("phone-number").value;
    var emailAddress = document.getElementById("email-address").value;
  
    if (firstName == "" || lastName == "" || streetAddress == "" || city == "" || state == "" || zipCode == "" || country == "" || citizenshipId == "" || phoneNumber == "" || emailAddress == "") {
      alert("Please fill out all of the required fields.");
      return false;
    }
  
    if (!(/^[a-zA-Z]+$/.test(firstName))) {
      alert("First name must only contain letters.");
      return false;
    }
  
    if (!(/^[a-zA-Z]+$/.test(lastName))) {
      alert("Last name must only contain letters.");
      return false;
    }
  
    if (!(/^[0-9]{5}-[0-9]{4}$/.test(zipCode))) {
      alert("Zip code must be in the format '12345-6789'.");
      return false;
    }
  
    return true;
  }