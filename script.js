// Get the form element
const form = document.getElementById('registration-form');

// Add event listener to form submit
form.addEventListener('submit', function(event) {
  // Prevent the form from submitting
  event.preventDefault();
  
  // Get the form input elements
  const nameInput = document.getElementById('name');
  const cityInput = document.getElementById('city');
  const wardInput = document.getElementById('ward');
  const stateInput = document.getElementById('state');
  const districtInput = document.getElementById('district');
  const housenoInput = document.getElementById('houseno');
  const streetInput = document.getElementById('street');
  const telnoInput = document.getElementById('telno');
  const mobilenoInput = document.getElementById('mobileno');
  const citizenshipnoInput = document.getElementById('citizenshipno');
  const customerInput = document.getElementById('customer');
  
  // Get the values of the form inputs
  const name = nameInput.value.trim();
  const city = cityInput.value.trim();
  const ward = wardInput.value.trim();
  const state = stateInput.value.trim();
  const district = districtInput.value.trim();
  const houseno = housenoInput.value.trim();
  const street = streetInput.value.trim();
  const telno = telnoInput.value.trim();
  const mobileno = mobilenoInput.value.trim();
  const citizenshipno = citizenshipnoInput.value.trim();
  const customer = customerInput.checked;
  
  // Validate the form inputs
  let isValid = true;
  
  if (name === '') {
    nameInput.classList.add('is-invalid');
    isValid = false;
  } else {
    nameInput.classList.remove('is-invalid');
  }
  
  if (city === '') {
    cityInput.classList.add('is-invalid');
    isValid = false;
  } else {
    cityInput.classList.remove('is-invalid');
  }
  
  if (ward === '') {
    wardInput.classList.add('is-invalid');
    isValid = false;
  } else {
    wardInput.classList.remove('is-invalid');
  }
  
  if (state === '') {
    stateInput.classList.add('is-invalid');
    isValid = false;
  } else {
    stateInput.classList.remove('is-invalid');
  }
  
  if (district === '') {
    districtInput.classList.add('is-invalid');
    isValid = false;
  } else {
    districtInput.classList.remove('is-invalid');
  }
  
  if (houseno === '') {
    housenoInput.classList.add('is-invalid');
    isValid = false;
  } else {
    housenoInput.classList.remove('is-invalid');
  }
  
  if (street === '') {
    streetInput.classList.add('is-invalid');
    isValid = false;
  } else {
    streetInput.classList.remove('is-invalid');
  }
  
  if (telno === '' && mobileno === '') {
    telnoInput.classList.add('is-invalid');
    mobilenoInput.classList.add('is-invalid');
    isValid = false;
  } else {
    telnoInput.classList.remove('is-invalid');
    mobilenoInput.classList.remove('is-invalid');
  }
  
  if (citizenshipno === '') {
    citizenshipnoInput.classList.add('is-invalid');
    isValid = false;
  } else {
    citizenshipnoInput.classList.remove('is-invalid');
  }
  
  if (customer && customerInput.value.trim() === '') {
    customerInput.classList.add('is-invalid');
    isValid = false;
  } else {
    customerInput.classList.remove('is-invalid');
  }
  
  // If the form is valid, submit the form
  if (isValid) {
    form.submit();
  }
});
