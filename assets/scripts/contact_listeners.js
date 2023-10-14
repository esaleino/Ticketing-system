const individualTab = document.getElementById('individual-tab');
const companyTab = document.getElementById('company-tab');
const individualForm = document.getElementById('individual-form');
const companyForm = document.getElementById('company-form');
const reasonSelect = document.getElementById('reason');
const companyNameInput = document.getElementById('r_company');
const messageTextarea = document.getElementById('message');
const charCountSpan = document.getElementById('char-count');

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

messageTextarea.addEventListener('input', function () {
  const messageContent = messageTextarea.value;
  const charCount = messageContent.length;
  charCountSpan.textContent = charCount + '/2000 characters';
});
