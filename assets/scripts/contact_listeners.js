import { submitForm } from './contact.js';
const individualTab = document.getElementById('individual-tab');
const companyTab = document.getElementById('company-tab');
const individualForm = document.getElementById('individual-form');
const companyForm = document.getElementById('company-form');
const reasonSelect = document.getElementById('reason');
const companyNameInput = document.getElementById('r_company');
const messageTextarea = document.getElementById('message');
const charCountSpan = document.getElementById('char-count');
const companyReason = document.getElementById('company-reason');

individualTab.addEventListener('click', () => {
  individualForm.classList.add('active-form');
  companyForm.classList.remove('active-form');
  individualTab.classList.remove('inactive-tab');
  individualTab.classList.add('active-tab');
  companyTab.classList.remove('active-tab');
  companyTab.classList.add('inactive-tab');
});

companyTab.addEventListener('click', () => {
  companyForm.classList.add('active-form');
  individualForm.classList.remove('active-form');
  companyTab.classList.add('active-tab');
  companyTab.classList.remove('inactive-tab');
  individualTab.classList.add('inactive-tab');
  individualTab.classList.remove('active-tab');
});

reasonSelect.addEventListener('change', function () {
  if (reasonSelect.value === 'ticket') {
    companyNameInput.required = true;
  } else {
    companyNameInput.required = false;
  }
});

companyReason.addEventListener('change', function () {
  let otherContent = document.getElementById('other-content');
  let registrationContent = document.getElementById('registration-content');
  if (companyReason.value === 'registration') {
    registrationContent.style.display = 'block';
    otherContent.style.display = 'none';
  } else {
    registrationContent.style.display = 'none';
    otherContent.style.display = 'block';
  }
});

messageTextarea.addEventListener('input', function () {
  const messageContent = messageTextarea.value;
  const charCount = messageContent.length;
  charCountSpan.textContent = charCount + '/2000 characters';
});

companyForm.addEventListener('submit', function (e) {
  e.preventDefault();
  submitForm(companyForm);
});

const testButton = document.getElementById('test_button');
testButton.addEventListener('click', function () {
  const cname = document.getElementById('company_name');
  const conname = document.getElementById('contact_name');
  const conemail = document.getElementById('contact_email');
  const conphone = document.getElementById('contact_phone');
  const cuser = document.getElementById('m-uname');
  const cpass = document.getElementById('m-pass');
  const ccpass = document.getElementById('m-cpass');
  const cemail = document.getElementById('m-email');
  const cmsg = document.getElementById('c-msg');

  cname.value = 'Test Company';
  conname.value = 'Test Name';
  conemail.value = 'testmail@contact.com';
  conphone.value = '123456789';
  cuser.value = 'testuser';
  cpass.value = '123456789';
  ccpass.value = '123456789';
  cemail.value = 'testmail@company.com';
  cmsg.value = 'Test message';
});
