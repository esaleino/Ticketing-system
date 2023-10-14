import { reg_formValidation, reg_fieldValidation } from './validations.js';
const submitButton = document.getElementById('s-button');
const form = document.getElementById('registration-form');
const errorFields = document.getElementsByClassName('error-field');
const inputElements = form.querySelectorAll('input');

form.addEventListener('submit', function (e) {
  e.preventDefault();
  const formData = new FormData(this);
  let valResult = reg_formValidation(formData);
  if (valResult === true) {
    // Perform AJAX request
    fetch(registerPost, {
      method: 'POST',
      body: formData,
    })
      .then((response) => {})
      .catch((error) => {
        console.error(error);
        // Handle any network or request errors here
      });
  } else {
    addErrorLabels(errorFields, valResult);
    return false;
  }

  // Perform AJAX request
  /* fetch(registration_handler, {
      method: 'POST',
      body: formData,
    })
      .then((response) => {
        console.log(response);
        // Handle the response from the server as needed
        // For example, display a success message or handle errors
      })
      .catch((error) => {
        console.error(error);
        // Handle any network or request errors here
      }); */
});

function addErrorLabels(fields, results) {
  for (const field of fields) {
    const key = field.getAttribute('name').split('_err')[0];
    if (results[key]) {
      document.getElementById(key).classList.add('invalid');
      field.innerHTML = results[key];
      field.style.display = 'block';
    } else {
      document.getElementById(key).classList.remove('invalid');
      field.innerHTML = '';
      field.style.display = 'none';
    }
  }
}

function onChange(event) {
  const field = event.target;
  let res = reg_fieldValidation(field);
  if (res.length > 0) {
    document.getElementById(field.getAttribute('id') + '_error').innerHTML =
      res;
    document.getElementById(field.getAttribute('id') + '_error').style.display =
      'block';
    field.classList.add('invalid');
  } else {
    document.getElementById(field.getAttribute('id') + '_error').innerHTML = '';
    document.getElementById(field.getAttribute('id') + '_error').style.display =
      'none';
    field.classList.remove('invalid');
  }
}

inputElements.forEach((input) => {
  input.addEventListener('change', onChange);
});
