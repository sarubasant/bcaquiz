// Get the form element
const form = document.querySelector('#registerModal form');

// Add event listener for form submission
form.addEventListener('submit', function (event) {
  event.preventDefault(); // Prevent form submission
 
  // Reset previous error messages
  const errorMessages = document.querySelectorAll('.error-message');
  errorMessages.forEach(function (errorMessage) {
    errorMessage.remove();
  });

  // Validate each form field
  const fullName = document.getElementById('fullName');
  const email = document.getElementById('emailRegister');
  const password = document.getElementById('password');
  const cpassword = document.getElementById('cpassword');
  // const genderContainer = document.querySelector('.mb-3');
  const gender = document.querySelectorAll('input[name="gender"]');
  const termsAndConditions = document.getElementById('termsAndConditions');

  let isValid = true; // Flag to track form validity

  // Validate full name
  if (fullName.value.trim() === '') {
    displayErrorMessage(fullName, 'Full name is required');
    isValid = false;
  } 
  else if (!validateFullName(fullName.value.trim())) {
    displayErrorMessage(fullName, 'Full name should only contain alphabetic characters');
    isValid = false;
  }

  // Validate email
  
  if (email.value.trim() === '') {
    displayErrorMessage(email, 'Email is required');
    isValid = false;
  } else if (!validateEmail(email.value.trim())) {
    displayErrorMessage(email, 'Invalid email format');
    isValid = false;
  }

  // Validate password & cpassword and check if they match
  if (password.value.trim() === '') {
    displayErrorMessage(password, 'Password is required');
    isValid = false;
  }
  
  else if (cpassword.value.trim() === '') {
    displayErrorMessage(cpassword, 'Password is required');
    isValid = false;
  }

  else if(!(password.value.trim()===cpassword.value.trim())){
    displayErrorMessage(cpassword, 'Password did not match');
    isValid = false;
  }
  

  // Validate gender
  let genderSelected = false;
  gender.forEach(function (genderOption) {
    if (genderOption.checked) {
      genderSelected = true;
    }
  });
  if (!genderSelected) {
    const genderContainer = document.querySelector('#gender');
    displayErrorMessage(genderContainer, 'Please select a gender');
    isValid = false;
  }

  // Validate terms and conditions
  if (!termsAndConditions.checked) {
    const termsContainer = document.querySelector('.mb-3.form-check');
    displayErrorMessage(termsContainer, 'You must agree to the terms and conditions');
    isValid = false;
  }

  // If form is valid, you can proceed with form submission or further actions
  if (isValid) {
    form.submit(); // Uncomment this line to submit the form
  }
});



// Function to validate email format using regular expression
function validateEmail(email) {
 
  // const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; //old regex
  const emailRegex = /^[a-zA-Z][a-zA-Z0-9_]*@[a-zA-Z]+(?:\.[a-zA-Z]+)+$/; //external sir le vaneko wala

  // const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  return emailRegex.test(email);
}

  // Function to validate full name using regular expression
function validateFullName(fullName) {
  
    const fullNameRegex = /^[A-Za-z\s]+$/;
    return fullNameRegex.test(fullName);
}

// Function to display error message below the input field
function displayErrorMessage(element, message) {
  const errorMessage = document.createElement('div');
  errorMessage.classList.add('error-message');
  errorMessage.textContent = message+"*";
  errorMessage.style.color= "red";
  // element.parentNode.appendChild(errorMessage);
  element.insertAdjacentElement('afterend', errorMessage);
}

