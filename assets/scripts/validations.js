var registerRules = {
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
    regex: /^[a-zA-Z]+$/,
  },
};

export function reg_formValidation(data) {
  let dataValues = {};
  for (const entry of data) {
    const [key, value] = entry;
    dataValues[key] = value;
  }
  let errors = {};
  for (const key in registerRules) {
    const rule = registerRules[key];
    const value = dataValues[key];
    const name = rule.name;
    console.log(name, '\n', value, '\n', rule, '\n', key);
    if (rule.required && !value) {
      errors[key] = `${name} is required`;
    }
    if (rule.minlength && value.length < rule.minlength) {
      errors[key] = `${name} should be at least ${rule.minlength} characters`;
    }
    if (rule.maxlength && value.length > rule.maxlength) {
      errors[key] = `${name} should be at most ${rule.maxlength} characters`;
    }
    if (rule.regex && !rule.regex.test(value)) {
      errors[key] = `${name} is not valid`;
    }
  }
  if (dataValues.pass !== dataValues.cpass) {
    errors['cpass'] = 'Passwords do not match';
  }
  console.log(Object.keys(errors).length);
  if (Object.keys(errors).length === 0) {
    return true;
  } else {
    return errors;
  }
}
export function reg_fieldValidation(field) {
  const rule = registerRules[field.getAttribute('id')];
  const value = field.value;
  const name = rule.name;
  let msg = '';
  if (rule.required && !value) {
    msg = `${name} is required`;
  }
  if (rule.minlength && value.length < rule.minlength) {
    msg = `${name} should be at least ${rule.minlength} characters`;
  }
  if (rule.maxlength && value.length > rule.maxlength) {
    msg = `${name} should be at most ${rule.maxlength} characters`;
  }
  if (rule.regex && !rule.regex.test(value)) {
    msg = `${name} is not valid`;
  }
  if (field.getAttribute('id') === 'cpass') {
    if (value !== document.getElementById('pass').value) {
      msg = 'Passwords do not match';
    }
  }
  return msg;
}
