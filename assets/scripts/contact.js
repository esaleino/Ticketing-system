const individualTab = document.getElementById('individual-tab');
const companyTab = document.getElementById('company-tab');
const individualForm = document.getElementById('individual-form');
const companyForm = document.getElementById('company-form');

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
