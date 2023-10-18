import { formValidation, addErrorLabels, onChange } from './validations.js';

const form = document.getElementById('login-form');
const inputElements = form.querySelectorAll('input');

form.addEventListener('submit', async (event) => {
  event.preventDefault();
  const formData = new FormData(form);
  let valResult = formValidation(formData);
  if (valResult === true) {
    console.log('success!');
    fetch(loginPost, {
      method: 'POST',
      body: formData,
    })
      .then(async (response) => {
        if (response.ok) {
          response.json().then((data) => {
            window.location.href =
              data.redirect + '?message=' + encodeURIComponent(data.message);
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
      });
  } else {
    const errorFields = document.getElementsByClassName('error-field');
    addErrorLabels(errorFields, valResult);
  }
});

inputElements.forEach((input) => {
  input.addEventListener('change', onChange);
});
