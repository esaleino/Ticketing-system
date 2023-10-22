import { formValidation, addErrorLabels, onChange } from './validations.js';
import { formBuildHandler } from './form-builder.js';
const formDefinitions = {
  target: 'main-content',
  id: 'registration-form',
  title: 'Registration Form',
  rows: [
    [
      {
        id: 'uname',
        label: 'Username',
        type: 'text',
        required: true,
        tag: 'input',
      },
    ],
    [
      {
        id: 'fname',
        label: 'First Name',
        type: 'text',
        required: true,
        tag: 'input',
      },
      {
        id: 'lname',
        label: 'Last Name',
        type: 'text',
        required: true,
        tag: 'input',
      },
    ],
    [
      {
        id: 'email',
        label: 'Email',
        type: 'email',
        required: true,
        tag: 'input',
      },
      {
        id: 'phone',
        label: 'Phone',
        type: 'tel',
        required: true,
        tag: 'input',
      },
    ],
    [
      {
        id: 'pass',
        label: 'Password',
        type: 'password',
        required: true,
        tag: 'input',
      },
      {
        id: 'cpass',
        label: 'Confirm Password',
        type: 'password',
        required: true,
        tag: 'input',
      },
    ],
    [
      {
        id: 'company_name',
        label: 'Company Name',
        type: 'text',
        required: true,
        tag: 'select',
      },
      {
        id: 'company_code',
        label: 'Company Code',
        type: 'password',
        required: true,
        tag: 'input',
      },
    ],
  ],
};
window.addEventListener('load', getForms());
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
  let valResult = formValidation(formData);
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

function getForms() {
  let form = formBuildHandler(formDefinitions);
  let content = document.getElementById(formDefinitions.target);
  let testButton = document.createElement('button');
  testButton.type = 'button';
  testButton.innerHTML = 'Test';
  testButton.classList.add('s-button');
  testButton.id = 'test_button';
  form.appendChild(testButton);
  content.appendChild(form);
}
