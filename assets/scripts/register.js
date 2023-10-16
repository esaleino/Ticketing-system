import { reg_formValidation, reg_fieldValidation } from './validations.js';
const submitButton = document.getElementById('s-button');
const form = document.getElementById('registration-form');
const errorFields = document.getElementsByClassName('error-field');
const inputElements = form.querySelectorAll('input');
const companySelect = document.getElementById('company_name');

companies.forEach((company) => {
  const option = document.createElement('option');
  option.value = company;
  option.text = company;
  companySelect.appendChild(option);
});

form.addEventListener('submit', function (e) {
  document.getElementById('status-message').style.display = 'none';
  e.preventDefault();
  const formData = new FormData(this);
  let valResult = reg_formValidation(formData);
  console.log(valResult);
  /* 
  let valResult = true; */
  if (valResult === true) {
    fetch(registerPost, {
      method: 'POST',
      body: formData,
    })
      .then(async (response) => {
        if (response.ok) {
          response.json().then((data) => {
            console.log(data.message);
            document.getElementById('status-message').innerHTML = data.message;
            document
              .getElementById('status-message')
              .classList.remove('status-error');
            document
              .getElementById('status-message')
              .classList.add('status-success');
            document.getElementById('status-message').style.display = 'block';
            form.reset();
          });
        } else {
          let data = await response.json();
          throw new Error(data.message);
        }
      })
      .catch((error) => {
        document.getElementById('status-message').innerHTML = error;
        document
          .getElementById('status-message')
          .classList.remove('status-success');
        document.getElementById('status-message').classList.add('status-error');
        document.getElementById('status-message').style.display = 'block';
        // Handle any network or request errors here
      });
  } else {
    addErrorLabels(errorFields, valResult);
    return false;
  }
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

document
  .getElementById('test_button')
  .addEventListener('click', function test() {
    const field_fname = document.getElementById('fname');
    const field_lname = document.getElementById('lname');
    const field_email = document.getElementById('email');
    const field_pass = document.getElementById('pass');
    const field_cpass = document.getElementById('cpass');
    const field_phone = document.getElementById('phone');
    const field_company = document.getElementById('company_name');
    const field_code = document.getElementById('company_code');
    const field_user = document.getElementById('uname');
    field_user.value = 'johndoe';
    field_code.value = 'root_toor';
    field_fname.value = 'John';
    field_lname.value = 'Doe';
    field_email.value = 'john@doemail.com';
    field_pass.value = '123456789';
    field_cpass.value = '123456789';
    field_phone.value = '123456789';
    field_company.value = 'CompanyName';
  });
