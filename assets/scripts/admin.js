import { formBuildHandler } from './form-builder.js';
const formDefinitions = [
  {
    target: 'add-company-content',
    id: 'add_company',
    title: 'Add Company',
    rows: [
      [
        {
          id: 'company_name',
          label: 'Company Name',
          type: 'text',
          required: true,

          tag: 'input',
        },
        {
          id: 'company_address',
          label: 'Company Address',
          type: 'text',
          required: true,

          tag: 'input',
        },
      ],
      [
        {
          id: 'company_city',
          label: 'Company City',
          type: 'text',
          required: true,

          tag: 'input',
        },
      ],
    ],
  },
];

function getForms() {
  formDefinitions.forEach((defines) => {
    let form = formBuildHandler(defines);
    let content = document.getElementById(defines.target);
    content.appendChild(form);
  });
}
window.addEventListener('loaod', getForms());
