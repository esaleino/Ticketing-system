import { formBuildHandler } from './form-builder.js';
const formDefinitions = [
  {
    target: 'add-company-content',
    id: 'add_company',
    title: 'Add Company',
    rows: [
      [
        {
          id: 'ticket_select',
          label: 'Open tickets',
          type: 'select',
          tag: 'select',
        },
      ],
      [
        {
          id: 'company_name',
          label: 'Company Name',
          type: 'text',
          required: true,

          tag: 'input',
        },
        {
          id: 'manager_name',
          label: 'Manager Name',
          type: 'text',
          required: true,

          tag: 'input',
        },
      ],
      [
        {
          id: 'manager_email',
          label: 'Company City',
          type: 'text',
          required: true,
          tag: 'input',
        },
        {
          id: 'manager_phone',
          label: 'Manager Phone',
          type: 'text',
          required: true,
          tag: 'input',
        },
      ],
      [
        {
          id: 'manager_username',
          label: 'Manager Username',
          type: 'text',
          required: true,
          tag: 'input',
        },
        {
          id: 'ticket_id',
          label: 'Ticket ID',
          type: 'number',
          required: true,
          tag: 'input',
        },
      ],
    ],
  },
  /* {
    target: 'add-user-content',
    id: 'add_user',
  }, */
];

function getForms() {
  formDefinitions.forEach((defines) => {
    let form = formBuildHandler(defines);
    let content = document.getElementById(defines.target);
    content.appendChild(form);
  });
  loadData();
}

function loadData() {
  const select = document.getElementById('ticket_select');
  let index = 0;
  let option = document.createElement('option');
  option.value = '';
  option.text = 'Select a ticket';
  option.disabled = true;
  option.selected = true;
  select.appendChild(option);
  companyRegTickets.forEach((ticket) => {
    let option = document.createElement('option');
    option.value = index;
    option.text = ticket.company_name;
    select.appendChild(option);
    index++;
  });
  select.addEventListener('change', loadTicket);
}

function loadTicket() {
  const index = this.value;
  const ticket = companyRegTickets[index];
  console.log(ticket);
  document.getElementById('company_name').value = ticket.company_name;
  document.getElementById('manager_name').value = ticket.contact_name;
  document.getElementById('manager_email').value = ticket.contact_email;
  document.getElementById('manager_phone').value = ticket.contact_phone;
  document.getElementById('manager_username').value = ticket.company_username;
  document.getElementById('ticket_id').value = ticket.id;
}

window.addEventListener('load', getForms());
const add_company_form = document.getElementById('add_company');

add_company_form.addEventListener('submit', function (e) {
  e.preventDefault();
  const form = add_company_form;
  const data = new FormData(form);
  fetch(addCompanyPost, {
    method: 'POST',
    body: data,
  }).then((response) => {
    if (response.status === 200) {
      response.json().then((data) => {
        console.log(data);
      });
    } else {
      response.json().then((data) => {
        console.log(data);
      });
    }
  });
});
