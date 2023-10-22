console.log('hello world');

export function submitForm(form) {
  const formData = new FormData(form);
  fetch(contactPost, {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => console.log(data));
}
