// Definitions for the forms used in the application
// -----------------------------------------------

// -----------------------------------------------
// Functions
// -----------------------------------------------
export function formBuildHandler(Definitions) {
  let container = document.createElement('div');
  container.classList.add('form-container');
  let form = document.createElement('form');
  form.id = Definitions.id;
  form.classList.add('form-box');
  let title_container = document.createElement('div');
  title_container.classList.add('form-title');
  let title_text = document.createElement('div');
  let title_status = document.createElement('div');
  title_text.classList.add('title-text');
  title_status.classList.add('title-text');
  title_text.innerHTML = Definitions.title;
  title_status.id = 'status-message';
  appendItems(title_container, [title_text, title_status]);
  form.appendChild(title_container);
  form = buildRows(form, Definitions.rows);
  let button_container = document.createElement('div');
  button_container.classList.add('form-submit');
  let submit_button = document.createElement('button');
  submit_button.type = 'submit';
  submit_button.innerHTML = 'Submit';
  submit_button.classList.add('s-button');
  button_container.appendChild(submit_button);
  form.appendChild(button_container);
  container.appendChild(form);
  return container;
}
function buildRows(form, rows) {
  rows.forEach((row_def) => {
    let row = document.createElement('div');
    row.classList.add('form-row');
    if (row_def.length > 1) {
      let input_container;
      row_def.forEach((input_def) => {
        input_container = document.createElement('div');
        input_container.classList.add('input-container');
        let input = buildInput(input_def);
        input_container = appendItems(input_container, input);
        row.appendChild(input_container);
      });
    } else {
      let input = buildInput(row_def[0]);
      row = appendItems(row, input);
    }
    form.appendChild(row);
  });
  return form;
}
function buildInput(input_def) {
  let input_label = document.createElement('label');
  let input = document.createElement(input_def.tag);
  let input_error = document.createElement('label');
  input_label.for = input_def.id;
  input_label.innerHTML = input_def.label;
  input_label.classList.add('l-text');
  input.id = input_def.id;
  if (input_def.tag !== 'select') {
    input.type = input_def.type;
  }
  input.classList.add('input-box');
  input.placeholder = input_def.label;
  input.name = input_def.id;
  input.required = input_def.required;
  input_error.classList.add('error-field');
  input_error.id = input_def.id + '_error';
  input_error.name = input_def.id + '_err';
  return [input_label, input, input_error];
}
function appendItems(parent, items) {
  items.forEach((item) => {
    parent.appendChild(item);
  });
  return parent;
}
