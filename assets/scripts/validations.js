var fieldRules = {
  fname: {
    name: 'First name',
    required: true,
    minlength: 3,
    maxlength: 30,
    regex: /^[a-zA-Z]+$/,
  },
  lname: {
    name: 'Last name',
    required: true,
    minlength: 3,
    maxlength: 30,
    regex: /^[a-zA-Z]+$/,
  },
  email: {
    name: 'Email',
    required: true,
    regex: /^([a-zA-Z0-9\.-]+)@([a-zA-Z0-9-]+).([a-z]{2,20})(.[a-z]{2,20})?$/,
  },
  pass: {
    name: 'Password',
    required: true,
    minlength: 8,
    maxlength: 30,
  },
  cpass: {
    name: 'Confirm password',
    required: true,
    minlength: 8,
    maxlength: 30,
  },
  phone: {
    name: 'Phone number',
    required: true,
    minlength: 3,
    maxlength: 30,
    regex: /^\d+$/,
  },
  company_name: {
    name: "Company's name",
    required: true,
    minlength: 3,
    maxlength: 100,
    regex: /^[a-zA-Z\s-_]+$/,
  },
  company_code: {
    name: "Company's code",
    required: true,
    minlength: 3,
    maxlength: 30,
  },
  uname: {
    name: 'Username',
    required: true,
    minlength: 3,
    maxlength: 30,
    regex: /^[a-zA-Z0-9_-]{3,30}$/,
  },
  l_uname: {
    name: 'Username',
    minlength: 3,
    maxlength: 30,
    required: true,
  },
  l_pass: {
    name: 'Password',
    minlength: 3,
    maxlength: 30,
    required: true,
  },
};

export function formValidation(data) {
  let dataValues = {};
  for (const entry of data) {
    const [key, value] = entry;
    dataValues[key] = value;
  }
  let errors = {};
  for (const key in dataValues) {
    const rule = fieldRules[key];
    const value = dataValues[key];
    const name = rule.name;
    errors[key] = '';
    if (rule.required && !value) {
      errors[key] += `${name} is required</br>`;
    }
    if (rule.minlength && value.length < rule.minlength) {
      errors[
        key
      ] += `${name} should be at least ${rule.minlength} characters</br>`;
    }
    if (rule.maxlength && value.length > rule.maxlength) {
      errors[
        key
      ] += `${name} should be at most ${rule.maxlength} characters</br>`;
    }
    if (rule.regex && !rule.regex.test(value)) {
      errors[key] += `${name} is not valid</br>`;
    }
  }
  if (dataValues.pass !== dataValues.cpass) {
    errors['cpass'] += 'Passwords do not match</br>';
  }
  console.log(errors);
  if (Object.values(errors).some((error) => error.length > 0)) {
    return errors;
  } else {
    return true;
  }
}
function fieldValidation(field) {
  const rule = fieldRules[field.getAttribute('id')];
  const value = field.value;
  const name = rule.name;
  console.log(rule, value, name);
  let msg = '';
  if (rule.required && !value) {
    msg += `${name} is required</br>`;
  }
  if (rule.minlength && value.length < rule.minlength) {
    msg += `${name} should be at least ${rule.minlength} characters</br>`;
  }
  if (rule.maxlength && value.length > rule.maxlength) {
    msg += `${name} should be at most ${rule.maxlength} characters</br>`;
  }
  if (rule.regex && !rule.regex.test(value)) {
    msg += `${name} is not valid</br>`;
  }
  if (
    field.getAttribute('id') === 'cpass' ||
    field.getAttribute('id') === 'pass'
  ) {
    if (
      document.getElementById('pass').value !==
      document.getElementById('cpass').value
    ) {
      msg += 'Passwords do not match</br>';
    }
  }
  return msg;
}
export function addErrorLabels(fields, results) {
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
export function onChange(event) {
  const field = event.target;
  let res = fieldValidation(field);
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
